<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;
use App\Models\FormDetailLocation;
use App\Models\FormDetail;
use App\Models\FormAttachment;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Reply;

class UserAccountController extends Controller
{
    //
    public function userAccountFormsIndex()
    {
        $user = User::with('userDetail')->find(Auth::id());

        return view('users_account.users_account', compact('user'));
    }

    public function userRecordForm()
    {
        $forms = Form::with(['user', 'replies'])
            ->where('user_id', Auth::id())
            ->get();

        // ส่งข้อมูลไปยัง view
        return view('users_account_record.users_account_record', compact('forms'));
    }

    public function userShowFormEdit($id)
    {
        $form = Form::with(['formDetailLocation', 'attachments', 'formDetail'])->findOrFail($id);

        return view('users_account_edit_form.users_account_edit_form', compact('form'));
    }

    public function updateUserForm(Request $request, $id)
    {
        // Validate form data
        $validatedData = $request->validate([
            'guest_location' => 'required|string|max:255',
            'request_date' => 'required|date',
            'guest_salutation' => 'required|string|max:50',
            'guest_name' => 'required|string|max:255',
            'guest_age' => 'required|integer',
            'guest_nationality' => 'required|string|max:100',
            'guest_ethnicity' => 'required|string|max:100',
            'guest_house_number' => 'required|string|max:100',
            'guest_village' => 'required|string|max:100',
            'guest_alley' => 'nullable|string|max:100',
            'guest_road' => 'nullable|string|max:100',
            'guest_subdistrict' => 'required|string|max:100',
            'guest_district' => 'required|string|max:100',
            'guest_province' => 'required|string|max:100',
            'guest_zipcode' => 'required|string|max:10',

            'detail_location_name_tag' => 'nullable|string|max:255',
            'detail_location_house_number' => 'nullable|string|max:255',
            'detail_location_village' => 'nullable|string|max:255',
            'detail_location_alley' => 'nullable|string|max:255',
            'detail_location_road' => 'nullable|string|max:255',
            'detail_location_subdistrict' => 'nullable|string|max:255',
            'detail_location_district' => 'nullable|string|max:255',
            'detail_location_province' => 'nullable|string|max:255',
            'detail_location_phone_number' => 'required|string|max:10',

            'detail_form_lastday' => 'nullable|string|max:255',
            'detail_tax_size' => 'nullable|string|max:255',
            'detail_tax_update' => 'nullable|string|max:255',
            'detail_cause' => 'nullable|string|max:255',
            'detail_since_the_date' => 'nullable|date',

            'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Find the form by ID
        $form = Form::findOrFail($id);

        // Update form data
        $form->update([
            'guest_location' => $validatedData['guest_location'],
            'request_date' => $validatedData['request_date'],
            'status' => 1,
            'guest_salutation' => $validatedData['guest_salutation'],
            'guest_name' => $validatedData['guest_name'],
            'guest_age' => $validatedData['guest_age'],
            'guest_nationality' => $validatedData['guest_nationality'],
            'guest_ethnicity' => $validatedData['guest_ethnicity'],
            'guest_house_number' => $validatedData['guest_house_number'],
            'guest_village' => $validatedData['guest_village'],
            'guest_alley' => $validatedData['guest_alley'],
            'guest_road' => $validatedData['guest_road'],
            'guest_subdistrict' => $validatedData['guest_subdistrict'],
            'guest_district' => $validatedData['guest_district'],
            'guest_province' => $validatedData['guest_province'],
            'guest_zipcode' => $validatedData['guest_zipcode'],
        ]);

        // Update FormDetailLocation if it exists
        $formDetailLocation = FormDetailLocation::firstOrCreate(['form_id' => $form->id]);
        $formDetailLocation->update([
            'detail_location_name_tag' => $validatedData['detail_location_name_tag'] ?? null,
            'detail_location_house_number' => $validatedData['detail_location_house_number'] ?? null,
            'detail_location_village' => $validatedData['detail_location_village'] ?? null,
            'detail_location_alley' => $validatedData['detail_location_alley'] ?? null,
            'detail_location_road' => $validatedData['detail_location_road'] ?? null,
            'detail_location_subdistrict' => $validatedData['detail_location_subdistrict'] ?? null,
            'detail_location_district' => $validatedData['detail_location_district'] ?? null,
            'detail_location_province' => $validatedData['detail_location_province'] ?? null,
            'detail_location_phone_number' => $validatedData['detail_location_phone_number'] ?? null,
        ]);

        // Update FormDetail if it exists
        $formDetail = FormDetail::firstOrCreate(['form_id' => $form->id]);
        $formDetail->update([
            'detail_form_lastday' => $validatedData['detail_form_lastday'] ?? null,
            'detail_tax_size' => $validatedData['detail_tax_size'] ?? null,
            'detail_tax_update' => $validatedData['detail_tax_update'] ?? null,
            'detail_cause' => $validatedData['detail_cause'] ?? null,
            'detail_since_the_date' => $validatedData['detail_since_the_date'] ?? null,
        ]);

        // อัปเดตไฟล์ที่แนบมา
        if ($request->hasFile('attachments')) {
            // ลบไฟล์เก่าออกจากที่เก็บ
            $oldAttachments = FormAttachment::where('form_id', $form->id)->get();
            foreach ($oldAttachments as $attachment) {
                // ลบไฟล์จาก storage
                Storage::disk('public')->delete($attachment->file_path);
                // ลบข้อมูลจากฐานข้อมูล
                $attachment->delete();
            }

            foreach ($request->file('attachments') as $file) {
                // สร้างชื่อไฟล์ที่ไม่ซ้ำกัน
                $filename = time() . '_' . $file->getClientOriginalName();

                // เก็บไฟล์ใน public/storage/attachments
                $path = $file->storeAs('attachments', $filename, 'public'); // ใช้ disk ที่ระบุเป็น 'public'

                // สร้างบันทึกข้อมูลใน FormAttachment
                FormAttachment::create([
                    'form_id' => $form->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มแก้ไขสำเร็จแล้ว!');
    }

    public function exportUserPDF($id)
    {
        $form = Form::with('formDetailLocation','formDetail')->find($id);  // ดึงข้อมูลฟอร์มพร้อมกับรายการที่ยืม

        // สร้าง instance ของ DomPDF ผ่าน facade Pdf
        $pdf = Pdf::loadView('admin_export_pdf.admin_export_pdf', compact('form'))
                ->setPaper('A4', 'portrait');

        // ส่งไฟล์ PDF ไปยังเบราว์เซอร์
        return $pdf->stream('แบบคำขอร้องทั่วไป' . $form->id . '.pdf');
    }

    public function userReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // dd($request);
        // dd(auth()->id());

        Reply::create([
            'form_id' => $formId,
            'user_id' => auth()->id(),
            'reply_text' => $request->message,
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }

}

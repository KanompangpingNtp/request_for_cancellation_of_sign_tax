<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormDetailLocation;
use App\Models\FormDetail;
use App\Models\FormAttachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    //

    public function FormIndex()
    {
        return view('users_form.users_form');
    }

    public function FormCreate(Request $request)
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
            'detail_location_phone_number'=> 'required|string|max:10',

            'detail_form_lastday' => 'nullable|string|max:255',
            'detail_tax_size' => 'nullable|string|max:255',
            'detail_tax_update' => 'nullable|string|max:255',
            'detail_cause' => 'nullable|string|max:255',
            'detail_since_the_date' => 'nullable|date',

            'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Store form data
        $form = Form::create([
            'user_id' => Auth::id(),
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

        FormDetailLocation::create([
            'form_id' => $form->id,
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

        FormDetail::create([
            'form_id' => $form->id,
            'detail_form_lastday' => $validatedData['detail_form_lastday'] ?? null,
            'detail_tax_size' => $validatedData['detail_tax_size'] ?? null,
            'detail_tax_update' => $validatedData['detail_tax_update'] ?? null,
            'detail_cause' => $validatedData['detail_cause'] ?? null,
            'detail_since_the_date' => $validatedData['detail_since_the_date'] ?? null,
        ]);


        if ($request->hasFile('attachments')) {
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

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว!');
    }
}

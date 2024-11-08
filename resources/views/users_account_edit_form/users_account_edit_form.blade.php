@extends('layout.users_account_layout')
@section('account_layout')

@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success'
        , title: '{{ $message }}'
    , })

</script>
@endif

<div class="container">
    <div class="container">
        <a href="{{route('userRecordForm')}}">กลับหน้าเดิม</a><br><br>
        <h3 class="text-center">แก้ไขข้อมูล</h3>
        <form action="{{ route('updateUserForm', $form->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="form-group col-md-3 mb-3">
                    <label for="guest_location">เขียนที่</label>
                    <input type="text" id="guest_location" name="guest_location" class="form-control" value="{{ old('guest_nationality', $form->guest_location) }}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3 mb-3">
                    <label for="request_date">วันที่กรอกแบบฟอร์ม</label>
                    <input type="date" id="request_date" name="request_date" class="form-control" value="{{ old('guest_nationality', $form->request_date) }}">
                </div>
            </div>

            <h4>Guest Details</h4>

            <div class="row">
                <div class="form-group col-md-2 mb-3">
                    <label for="guest_salutation">คำนำหน้า<span class="text-danger">*</span></label>
                    <select class="form-select" id="guest_salutation" name="guest_salutation">
                        <option value="" disabled>เลือกคำนำหน้า</option>
                        <option value="นาย" {{ old('guest_salutation', $form->guest_salutation) == 'นาย' ? 'selected' : '' }}>นาย</option>
                        <option value="นาง" {{ old('guest_salutation', $form->guest_salutation) == 'นาง' ? 'selected' : '' }}>นาง</option>
                        <option value="นางสาว" {{ old('guest_salutation', $form->guest_salutation) == 'นางสาว' ? 'selected' : '' }}>นางสาว</option>
                    </select>
                </div>

                <div class="form-group col-md-5 mb-3">
                    <label for="guest_name">ชื่อ-นามสกุล</label>
                    <input type="text" id="guest_name" name="guest_name" class="form-control" value="{{ old('guest_nationality', $form->guest_name) }}">
                </div>

                <div class="form-group col-md-2 mb-3">
                    <label for="guest_age">อายุ</label>
                    <input type="number" id="guest_age" name="guest_age" class="form-control" value="{{ old('guest_nationality', $form->guest_age) }}">
                </div>

                <div class="form-group col-md-2 mb-3">
                    <label for="guest_nationality">สัญชาติ</label>
                    <input type="text" id="guest_nationality" name="guest_nationality" class="form-control" value="{{ old('guest_nationality', $form->guest_nationality) }}">
                </div>

                <div class="form-group col-md-2 mb-3">
                    <label for="guest_ethnicity">เชื้อชาติ</label>
                    <input type="text" id="guest_ethnicity" name="guest_ethnicity" class="form-control" value="{{ old('guest_nationality', $form->guest_ethnicity) }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="guest_house_number">อยู่บ้านเลขที่</label>
                    <input type="text" id="guest_house_number" name="guest_house_number" class="form-control" value="{{ old('guest_nationality', $form->guest_house_number) }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="guest_village">หมู่ที่</label>
                    <input type="text" id="guest_village" name="guest_village" class="form-control" value="{{ old('guest_nationality', $form->guest_village) }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="guest_road">ถนน</label>
                    <input type="text" id="guest_road" name="guest_road" class="form-control" value="{{ old('guest_nationality', $form->guest_road) }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="guest_alley">ตรอก/ซอย</label>
                    <input type="text" id="guest_alley" name="guest_alley" class="form-control" value="{{ old('guest_nationality', $form->guest_alley) }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="guest_subdistrict">ตำบล</label>
                    <input type="text" id="guest_subdistrict" name="guest_subdistrict" class="form-control" value="{{ old('guest_nationality', $form->guest_subdistrict) }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="guest_district">อำเภอ</label>
                    <input type="text" id="guest_district" name="guest_district" class="form-control" value="{{ old('guest_nationality', $form->guest_district) }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="guest_province">จังหวัด</label>
                    <input type="text" id="guest_province" name="guest_province" class="form-control" value="{{ old('guest_nationality', $form->guest_province) }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="guest_zipcode">รหัสไปรษณีย์</label>
                    <input type="text" id="guest_zipcode" name="guest_zipcode" class="form-control" value="{{ old('guest_nationality', $form->guest_zipcode) }}">
                </div>
            </div>

            <!-- Form Detail Location Section -->
            <h4>Location Details</h4>

            <div class="row">
                <div class="form-group col-md-3 mb-3">
                    <label for="detail_location_name_tag">ได้ติดตั้งป้ายชื่อ</label>
                    <input type="text" id="detail_location_name_tag" name="detail_location_name_tag" class="form-control" value="{{ old('detail_location_name_tag', $form->formDetailLocation->first()->detail_location_name_tag ?? '') }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="detail_location_house_number">ตั้งอยู่เลขที่</label>
                    <input type="text" id="detail_location_house_number" name="detail_location_house_number" class="form-control" value="{{ old('detail_location_house_number', $form->formDetailLocation->first()->detail_location_house_number ?? '') }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="detail_location_village">หมู่ที่</label>
                    <input type="text" id="detail_location_village" name="detail_location_village" class="form-control" value="{{ old('detail_location_village', $form->formDetailLocation->first()->detail_location_village ?? '') }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="detail_location_road">ถนน</label>
                    <input type="text" id="detail_location_road" name="detail_location_road" class="form-control" value="{{ old('detail_location_road', $form->formDetailLocation->first()->detail_location_road ?? '') }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="detail_location_alley">ตรอก/ซอย</label>
                    <input type="text" id="detail_location_alley" name="detail_location_alley" class="form-control" value="{{ old('detail_location_alley', $form->formDetailLocation->first()->detail_location_alley ?? '') }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="detail_location_subdistrict">ตำบล</label>
                    <input type="text" id="detail_location_subdistrict" name="detail_location_subdistrict" class="form-control" value="{{ old('detail_location_subdistrict', $form->formDetailLocation->first()->detail_location_subdistrict ?? '') }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="detail_location_district">อำเภอ</label>
                    <input type="text" id="detail_location_district" name="detail_location_district" class="form-control" value="{{ old('detail_location_district', $form->formDetailLocation->first()->detail_location_district ?? '') }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="detail_location_province">จังหวัด</label>
                    <input type="text" id="detail_location_province" name="detail_location_province" class="form-control" value="{{ old('detail_location_province', $form->formDetailLocation->first()->detail_location_province ?? '') }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="detail_location_phone_number">เบอร์ติดต่อ</label>
                    <input type="text" class="form-control" id="detail_location_phone_number" name="detail_location_phone_number" value="{{ old('detail_location_phone_number', $form->formDetailLocation->first()->detail_location_phone_number ?? '') }}" required>
                </div>
            </div>


            <h4>Form Details</h4>

            <div class="row">
                <div class="form-group col-md-5 mb-3">
                    <label for="detail_form_lastday">ได้ยื่นแบบแสดงรายการและเสียภาษีครั้งสุดท้ายประจำปี</label>
                    <input type="text" id="detail_form_lastday" name="detail_form_lastday" class="form-control" value="{{ old('detail_form_lastday', $form->formDetail->first()->detail_form_lastday ?? '') }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="detail_tax_size">ไว้ด้วยขนาดป้าย</label>
                    <input type="text" id="detail_tax_size" name="detail_tax_size" class="form-control" value="{{ old('detail_tax_size', $form->formDetail->first()->detail_tax_size ?? '') }}">
                </div>

                <div class="form-group col-md-4 mb-3">
                    <label for="detail_tax_update">บัดนี้ป้ายดังกล่าว (ปลดออก/เปลี่ยนแปลง)</label>
                    <input type="text" id="detail_tax_update" name="detail_tax_update" class="form-control" value="{{ old('detail_tax_update', $form->formDetail->first()->detail_tax_update ?? '') }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="detail_cause">ด้วยสาเหตุ</label>
                    <input type="text" id="detail_cause" name="detail_cause" class="form-control" value="{{ old('detail_cause', $form->formDetail->first()->detail_cause ?? '') }}">
                </div>

                <div class="form-group col-md-3 mb-3">
                    <label for="detail_since_the_date">ตั้งแต่วันที่</label>
                    <input type="date" id="detail_since_the_date" name="detail_since_the_date" class="form-control" value="{{ old('detail_since_the_date', $form->formDetail->first()->detail_since_the_date ?? '') }}">
                </div>
            </div>


           <div class="row">
            <div class="form-group col-md-4 mb-3">
                <label for="attachments">ไฟล์แนบ</label>
                <input type="file" name="attachments[]" class="form-control" multiple>
            </div>

            <label>ไฟล์ที่แนบไว้แล้ว:</label>
                @foreach ($form->attachments as $attachment)
                <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank">{{ basename($attachment->file_path) }}</a>
                @endforeach
           </div>

            <br>

            <button type="submit" class="btn btn-primary">ส่งแบบฟอร์ม</button>
        </form>
    </div>

</div>


@endsection

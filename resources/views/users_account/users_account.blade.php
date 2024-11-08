@extends('layout.users_account_layout')
@section('account_layout')

<!-- Success Message -->
@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ $message }}',
    })
</script>
@endif

<!-- Form for filling out -->
<div class="container">
    <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-3 mb-3">
            <label for="guest_location">เขียนที่</label>
            <input type="text" id="guest_location" name="guest_location" class="form-control" value="{{ old('guest_location') }}" required>
        </div>

        <div class="form-group col-md-3 mb-3">
            <label for="request_date">วันที่กรอกแบบฟอร์ม</label>
            <input type="date" id="request_date" name="request_date" class="form-control" value="{{ old('request_date') }}" required>
        </div>

        <h4>Guest Details</h4>

        <div class="row">
            <div class="form-group col-md-2 mb-3">
                <label for="guest_salutation" class="form-label">คำนำหน้า</label>
                <select class="form-select" id="guest_salutation" name="guest_salutation" required>
                    <option value="" disabled {{ $user->userDetail->salutation ? '' : 'selected' }}>เลือกคำนำหน้า</option>
                    <option value="นาย" {{ $user->userDetail->salutation == 'นาย' ? 'selected' : '' }}>นาย</option>
                    <option value="นาง" {{ $user->userDetail->salutation == 'นาง' ? 'selected' : '' }}>นาง</option>
                    <option value="นางสาว" {{ $user->userDetail->salutation == 'นางสาว' ? 'selected' : '' }}>นางสาว</option>
                </select>
            </div>

            <div class="form-group col-md-5 mb-3">
                <label for="guest_name">ชื่อ-นามสกุล</label>
                <input type="text" id="guest_name" name="guest_name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="form-group col-md-2 mb-3">
                <label for="guest_age">อายุ</label>
                <input type="number" id="guest_age" name="guest_age" class="form-control" value="{{ $user->userDetail->age }}" required>
            </div>

            <div class="form-group col-md-2 mb-3">
                <label for="guest_nationality">สัญชาติ</label>
                <input type="text" id="guest_nationality" name="guest_nationality" class="form-control" value="{{ $user->userDetail->nationality }}" required>
            </div>

            <div class="form-group col-md-2 mb-3">
                <label for="guest_ethnicity">เชื้อชาติ</label>
                <input type="text" id="guest_ethnicity" name="guest_ethnicity" class="form-control" value="{{ $user->userDetail->ethnicity }}" required>
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="guest_house_number">อยู่บ้านเลขที่</label>
                <input type="text" id="guest_house_number" name="guest_house_number" class="form-control" value="{{ $user->userDetail->house_number }}" required>
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="guest_village">หมู่ที่</label>
                <input type="text" id="guest_village" name="guest_village" class="form-control" value="{{ $user->userDetail->village }}" required>
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="guest_road">ถนน</label>
                <input type="text" id="guest_road" name="guest_road" class="form-control" value="{{ $user->userDetail->road }}" required>
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="guest_alley">ตรอก/ซอย</label>
                <input type="text" id="guest_alley" name="guest_alley" class="form-control" value="{{ $user->userDetail->alley }}" required>
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="guest_subdistrict">ตำบล</label>
                <input type="text" id="guest_subdistrict" name="guest_subdistrict" class="form-control" value="{{ $user->userDetail->subdistrict }}" required>
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="guest_district">อำเภอ</label>
                <input type="text" id="guest_district" name="guest_district" class="form-control" value="{{ $user->userDetail->district }}" required>
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="guest_province">จังหวัด</label>
                <input type="text" id="guest_province" name="guest_province" class="form-control" value="{{ $user->userDetail->province }}" required>
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="guest_zipcode">รหัสไปรษณีย์</label>
                <input type="text" id="guest_zipcode" name="guest_zipcode" class="form-control" value="{{ $user->userDetail->zipcode }}" required>
            </div>
        </div>

        <!-- Form Detail Location Section -->
        <h4>Location Details</h4>

       <div class="row">
        <div class="form-group col-md-3 mb-3">
            <label for="detail_location_name_tag">ได้ติดตั้งป้ายชื่อ</label>
            <input type="text" id="detail_location_name_tag" name="detail_location_name_tag" class="form-control" value="{{ old('detail_location_name_tag') }}">
        </div>

        <div class="form-group  col-md-3 mb-3">
            <label for="detail_location_house_number">ตั้งอยู่เลขที่</label>
            <input type="text" id="detail_location_house_number" name="detail_location_house_number" class="form-control" value="{{ old('detail_location_house_number') }}">
        </div>

        <div class="form-group  col-md-3 mb-3">
            <label for="detail_location_village">หมู่ที่</label>
            <input type="text" id="detail_location_village" name="detail_location_village" class="form-control" value="{{ old('detail_location_village') }}">
        </div>

        <div class="form-group  col-md-3 mb-3">
            <label for="detail_location_road">ถนน</label>
            <input type="text" id="detail_location_road" name="detail_location_road" class="form-control" value="{{ old('detail_location_road') }}">
        </div>

        <div class="form-group  col-md-3 mb-3">
            <label for="detail_location_alley">ตรอก/ซอย</label>
            <input type="text" id="detail_location_alley" name="detail_location_alley" class="form-control" value="{{ old('detail_location_alley') }}">
        </div>

        <div class="form-group  col-md-3 mb-3">
            <label for="detail_location_subdistrict">ตำบล</label>
            <input type="text" id="detail_location_subdistrict" name="detail_location_subdistrict" class="form-control" value="{{ old('detail_location_subdistrict') }}">
        </div>

        <div class="form-group  col-md-3 mb-3">
            <label for="detail_location_district">อำเภอ</label>
            <input type="text" id="detail_location_district" name="detail_location_district" class="form-control" value="{{ old('detail_location_district') }}">
        </div>

        <div class="form-group col-md-3 mb-3">
            <label for="detail_location_province">จังหวัด</label>
            <input type="text" id="detail_location_province" name="detail_location_province" class="form-control" value="{{ old('detail_location_province') }}">
        </div>

        <div class="form-group col-md-3">
            <label for="detail_location_phone_number">เบอร์ติดต่อ</label>
            <input type="text" class="form-control" id="detail_location_phone_number" name="detail_location_phone_number" required>
        </div>
       </div>

        <h4>Form Details</h4>

        <div class="row">
            <div class="form-group col-md-4 mb-3">
                <label for="detail_form_lastday">ได้ยื่นแบบแสดงรายการและเสียภาษีครั้งสุดท้ายประจำปี</label>
                <input type="text" id="detail_form_lastday" name="detail_form_lastday" class="form-control" value="{{ old('detail_form_lastday') }}">
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="detail_tax_size">ไว้ด้วยขนาดป้าย</label>
                <input type="text" id="detail_tax_size" name="detail_tax_size" class="form-control" value="{{ old('detail_tax_size') }}">
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="detail_tax_update">บัดนี้ป้ายดังกล่าว (ปลดออก/เปลี่ยนแปลง)</label>
                <input type="text" id="detail_tax_update" name="detail_tax_update" class="form-control" value="{{ old('detail_tax_update') }}">
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="detail_cause">ด้วยสาเหตุ</label>
                <input type="text" id="detail_cause" name="detail_cause" class="form-control" value="{{ old('detail_cause') }}">
            </div>

            <div class="form-group col-md-3 mb-3">
                <label for="detail_since_the_date">ตั้งแต่วันที่</label>
                <input type="date" id="detail_since_the_date" name="detail_since_the_date" class="form-control" value="{{ old('detail_since_the_date') }}">
            </div>
        </div>

        <div class="form-group col-md-3 mb-3">
            <label for="attachments">ไฟล์แนบ</label>
            <input type="file" name="attachments[]" class="form-control" multiple>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">ส่งแบบฟอร์ม</button>
    </form>
</div>


@endsection

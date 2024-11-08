<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: 'sarabun', sans-serif;
            font-size: 18px;
            margin-left: 80px;
            margin-right: 20px;
            line-height: 14px;
        }

        h3 {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .underline {
            text-decoration: underline;
            display: inline-block;
            width: auto;
        }

        .content-section {
            margin-bottom: 20px;
        }

        .content-section p {
            line-height: 2;
            margin: 0;
        }

        .signature-section {
            margin-top: 30px;
        }

        .signature-line {
            display: inline-block;
            width: 300px;
            border-bottom: 1px solid #000;
            margin-top: 20px;
        }

        .note {
            margin-top: 50px;
        }

        .note p {
            margin: 5px 0;
        }

        .officer-note {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .officer-note-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .dotted-line {
            border-bottom: 1px dotted #000;
            width: 100%;
            height: 20px;
            margin-bottom: 5px;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 20px;
        }

        .column {
            width: 48%;
        }

        .column p {
            margin: 10px 0;
        }

        span.fullname {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 200px;
            color: blue;
        }

        span.fullname_2 {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 300px;
            color: blue;
        }

        span.age {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 50px;
            color: blue;
        }

        span.occupation {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.house_no {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 60px;
            color: blue;
        }

        span.village_no {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 50px;
            color: blue;
        }

        span.alley {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 40px;
            color: blue;
        }

        span.road {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 80px;
            color: blue;
        }

        span.sub_district {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 50px;
            color: blue;
        }

        span.district {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.province {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.phone {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 50px;
            color: blue;
        }

        span.submission {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
            overflow-wrap: break-word;
        }

        span.document_count {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        span.location {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 20px;
            color: blue;
        }

        span.day {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 5px;
            color: blue;
        }

        span.month {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 5px;
            color: blue;
        }

        span.year {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 5px;
            color: blue;
        }

        span.submission_name {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 5px;
            color: blue;
        }

        span.item {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.nationality {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 80px;
            color: blue;
        }

        span.detail_form_lastday {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.fullname_3{
            border-bottom: 1px dashed;
            padding-left: 40px;
            padding-right: 40px;
            color: blue;
        }

        span.detail_tax_size {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 90px;
            color: blue;
            word-wrap: break-word;
            white-space: normal;
            max-width: 100%;
        }

    </style>
    <title>PDF Report</title>
</head>
<body>

    @php
    use Carbon\Carbon;

    $thaiMonths = [
    'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
    'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
    ];
    $date = Carbon::parse($form->created_at);
    $day = $date->format('d');
    $month = $thaiMonths[$date->month - 1];
    $year = $date->year + 543; // เพิ่ม 543 เพื่อให้เป็นปี พ.ศ.
    @endphp

    <div class="container">
        <br>
        <br>
        <h3>คำร้องขอแจ้งเปลี่ยนแปลง/ยกเลิก ป้าย</h3>
        <p class="right">เขียนที่ <span class="location">{{ $form->guest_nationality }}</span> </p>
        <p class="right">วันที่<span class="day">{{ $day }}</span>เดือน<span class="month">{{ $month }}</span>พ.ศ.<span class="year"> {{ $year }}</span></p>

        <p style="margin-left: 55px;">ข้าพเจ้า<span class="fullname">{{ $form->guest_salutation }}&nbsp;{{ $form->guest_name }}</span> อายุ <span class="age">{{ $form->guest_age }}</span>ปี</p>
        <p>สัญชาติ<span class="nationality">{{ $form->guest_nationality }}</span>เชื้อชาติ<span class="nationality">{{ $form->guest_ethnicity }}</span>อยู่บ้านเลขที่<span class="house_no">{{ $form->guest_house_number }}</span>หมู่ที่<span class="village_no">{{ $form->guest_village }}</span></p>
        <p>ถนน<span class="road">{{ $form->guest_road }}</span>ตรอก/ซอย<span class="sub_district">{{ $form->guest_alley }}</span>แขวง/ตำบล<span class="sub_district">{{ $form->guest_subdistrict }}</span></p>
        <p>อำเภอ<span class="district">{{ $form->guest_district }}</span>จังหวัด<span class="province">{{ $form->guest_province }}</span>รหัสไปรษณีย์<span class="phone">{{ $form->guest_zipcode }}</span></p>
        <p>ขอยื่นคำร้องต่อพนักงานเจ้าหน้าที่</p>

        <p style="margin-left: 55px;">ตามที่ข้าพเจ้าได้ติดตั้งป้ายชื่อ<span class="fullname_2">{{ $form->formDetailLocation->detail_location_name_tag }}</span></p>
        <p>ซึ่งอยู่ตำแหน่งที่<span class="house_no">{{ $form->formDetailLocation->detail_location_house_number }}</span>หมู่ที่<span class="village_no">{{ $form->formDetailLocation->detail_location_village }}</span>ถนน<span class="road">{{ $form->formDetailLocation->detail_location_road }}</span></p>
        <p>ตรอก/ซอย<span class="sub_district">{{ $form->formDetailLocation->detail_location_alley }}</span>แขวง/ตำบล<span class="sub_district">{{ $form->formDetailLocation->detail_location_subdistrict }}</span>อำเภอ<span class="district">{{ $form->formDetailLocation->detail_location_district }}</span></p>
        <p>จังหวัด<span class="province">{{ $form->formDetailLocation->detail_location_province }}</span>รหัสไปรษณีย์<span class="phone">{{ $form->formDetailLocation->detail_location_phone_number }}</span></p>
        <p>ได้เคยยื่นแบบแสดงรายการและเสียภาษีป้ายครั้งสุดท้ายประจำปี<span class="detail_form_lastday">{{ $form->formDetail->detail_form_lastday }}</span></p>
        <p>ไว้ด้วยขนาดป้าย<span class="detail_tax_size">{{ $form->formDetail->detail_tax_size }}</span></p>
        <p>ด้วยสาเหตุ<span class="detail_tax_size">{{ $form->formDetail->detail_cause }}</span></p>
        <p>ตั้งแต่วันที่<span class="detail_tax_size">{{ $form->formDetail->detail_since_the_date }}</span></p>

        <p style="margin-left: 55px;">จึงเรียนมาเพื่อพิจารณาดำเนินการต่อไป</p>

        <div style="text-align: center;">
            <p>ขอแสดงความนับถือ</p><br>
            <p>(ลงชื่อ) <span class="fullname_3">{{ $form->guest_name }}</span>ผู้ยื่น</p>
            <p>(<span class="fullname_3">{{ $form->guest_salutation }}&nbsp;{{ $form->guest_name }}</span>)</p>
        </div>

    </div>
</body>


</html>

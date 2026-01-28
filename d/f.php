<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>ผลการสมัครงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">

<?php
if (isset($_POST['Submit'])) {

    $position   = $_POST['position'];
    $prefix     = $_POST['prefix'];
    $fullname   = $_POST['fullname'];
    $birthday   = $_POST['birthday'];
    $education  = $_POST['education'];
    $skills     = $_POST['skills'];
    $experience = $_POST['experience'];

    echo "
    <div class='card shadow-lg'>
        
        <div class='card-header bg-success text-white text-center py-3'>
            <h3 class='mb-0'>✅ ข้อมูลการสมัครงานของท่าน</h3>

            <!-- เพิ่มชื่อของคุณ -->
            <p class='mt-1 mb-0' style='font-size:14px; opacity:0.9;'>
                จัดทำโดย: พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)
            </p>
        </div>

        <div class='card-body'>
            <p><strong>ตำแหน่งที่สมัคร:</strong> ".htmlspecialchars($position)."</p>
            <p><strong>ชื่อ-สกุล:</strong> ".htmlspecialchars($prefix)." ".htmlspecialchars($fullname)."</p>
            <p><strong>วันเดือนปีเกิด:</strong> ".htmlspecialchars($birthday)."</p>
            <p><strong>ระดับการศึกษาสูงสุด:</strong> ".htmlspecialchars($education)."</p>
            <p><strong>ความสามารถพิเศษ:</strong><br>".nl2br(htmlspecialchars($skills))."</p>
            <p><strong>ประสบการณ์ทำงาน:</strong><br>".nl2br(htmlspecialchars($experience))."</p>

            <a href='e.php' class='btn btn-primary mt-3'>ย้อนกลับไปหน้าใบสมัคร</a>
        </div>
    </div>
    ";
} 
else {
    echo "<div class='alert alert-danger'>ไม่พบข้อมูลที่ส่งมา</div>";
}
?>

</div>

</body>
</html>

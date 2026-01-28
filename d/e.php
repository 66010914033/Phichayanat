<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แบบฟอร์มรับสมัครงาน - บริษัท ท็อปนอทช์ เทค จำกัด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <div class="card shadow-lg border-0">
        
        <div class="card-header bg-primary text-white text-center py-3">
            <h1 class="h3 mb-0">ใบสมัครงาน | บริษัท ท็อปนอทช์ เทค จำกัด</h1>
            <p class="mb-0">กรุณากรอกข้อมูลส่วนตัวและประสบการณ์ทำงานของท่านให้ครบถ้วน</p>

            <!-- เพิ่มชื่อของคุณ -->
            <p class="mt-2 mb-0" style="font-size:14px; opacity:0.9;">
                จัดทำโดย: พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)
            </p>
        </div>

        <div class="card-body p-4 p-md-5">
            <form method="post" action="f.php">

                <h4 class="mb-3 text-primary">✨ 1. ตำแหน่งที่ต้องการสมัคร</h4>
                <hr>
                <div class="mb-4">
                    <label class="form-label fw-bold">เลือกตำแหน่งงาน</label>
                    <select class="form-select" name="position" required>
                        <option value="" disabled selected>--- กรุณาเลือกตำแหน่ง ---</option>
                        <option value="Software Developer">Software Developer</option>
                        <option value="Data Analyst">Data Analyst</option>
                        <option value="Digital Marketing Specialist">Digital Marketing Specialist</option>
                        <option value="Human Resources Officer">Human Resources Officer</option>
                        <option value="Graphic Designer">Graphic Designer</option>
                    </select>
                </div>

                <h4 class="mb-3 mt-4 text-primary">👤 2. ข้อมูลส่วนตัว</h4>
                <hr>
                
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">คำนำหน้าชื่อ</label>
                        <select class="form-select" name="prefix" required>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว" selected>นางสาว</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>
                    </div>

                    <div class="col-md-9">
                        <label class="form-label">ชื่อ-สกุล</label>
                        <input type="text" class="form-control" name="fullname" required>
                    </div>
                </div>

                <div class="mb-4 mt-3">
                    <label class="form-label">วันเดือนปีเกิด</label>
                    <input type="date" class="form-control" name="birthday" required>
                </div>

                <h4 class="mb-3 mt-4 text-primary">🎓 3. ประวัติการศึกษา</h4>
                <hr>
                <div class="mb-4">
                    <label class="form-label fw-bold">ระดับการศึกษาสูงสุด</label>
                    <select class="form-select" name="education" required>
                        <option disabled selected>--- กรุณาเลือกระดับการศึกษา ---</option>
                        <option value="มัธยมศึกษา">มัธยมศึกษา/ปวช.</option>
                        <option value="อนุปริญญา/ปวส.">อนุปริญญา/ปวส.</option>
                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                        <option value="ปริญญาโท">ปริญญาโท</option>
                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                    </select>
                </div>

                <h4 class="mb-3 mt-4 text-primary">⭐ 4. ความสามารถและประสบการณ์</h4>
                <hr>

                <div class="mb-4">
                    <label class="form-label">ความสามารถพิเศษ</label>
                    <textarea class="form-control" name="skills" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">ประสบการณ์ทำงาน</label>
                    <textarea class="form-control" name="experience" rows="5"></textarea>
                </div>

                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-5">
                    <button type="submit" name="Submit" class="btn btn-primary btn-lg">ส่งใบสมัคร</button>
                    <button type="reset" class="btn btn-outline-secondary btn-lg">ล้างข้อมูล</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>

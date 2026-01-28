<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์) </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* เพิ่มสไตล์เพิ่มเติมหากต้องการ */
        .card-header {
            background-color: #0d6efd; /* สีฟ้า Bootstrap Primary */
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .color-box {
            width: 100%;
            height: 38px; /* เท่ากับความสูงของ form-control */
            border: 1px solid #ced4da; /* สีขอบเหมือน form-control */
            border-radius: 0.375rem; /* รัศมีมุมเหมือน form-control */
            display: flex;
            align-items: center;
            padding: 0 0.75rem;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="card shadow-lg">
            <div class="card-header text-center">
                📝 ฟอร์มรับข้อมูล - พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์) Gemini
            </div>
            <div class="card-body p-4">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">ชื่อ-สกุล</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">เบอร์โทร</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="height" class="form-label">ส่วนสูง (ซม.)*</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="height" name="height" min="100" max="200" required>
                            <span class="input-group-text">ซม.*</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <textarea class="form-control" id="address" name="address" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="birthday" class="form-label">วันเดือนปีเกิด</label>
                        <input type="date" class="form-control" id="birthday" name="birthday">
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">สีที่ชอบ</label>
                        <input type="color" class="form-control form-control-color" id="color" name="color" value="#0d6efd" title="เลือกสี">
                    </div>

                    <div class="mb-4">
                        <label for="major" class="form-label">สาขาวิชา</label>
                        <select class="form-select" id="major" name="major">
                            <option value="การบัญชี">การบัญชี</option>
                            <option value="การตลาด">การตลาด</option>
                            <option value="การจัดการ">การจัดการ</option>
                            <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2 d-md-block text-center mb-3">
                        <button type="submit" name="Submit" class="btn btn-primary me-2">✅ สมัครสมาชิก</button>
                        <button type="reset" class="btn btn-secondary me-2">🔄 ยกเลิก</button>
                        <button type="button" onClick="window.location='https://www.msu.ac.th/';" class="btn btn-info me-2">🏫 Go to MSU</button>
                        <button type="button" onMouseOver="alert('อ่านทำไมจ๊ะ');" class="btn btn-warning me-2">👋 Hello</button>
                        <button type="button" onClick="window.print();" class="btn btn-success">🖨️ พิมพ์</button>
                    </div>
                </form>
            </div>
        </div>

        <hr class="my-5">

        <?php
        if(isset($_POST['Submit'])){
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $height = $_POST['height'];
            $address = $_POST['address'];
            $birthday= $_POST['birthday'];
            $color = $_POST['color'];
            $major = $_POST['major'];
            
            //include_once("connectdb.php");
            $host = "localhost";
            $user = "root"; 
            $pwd = "";
            $db = "4033db";
            $conn = mysqli_connect($host,$user,$pwd,$db)or die ("เชื่อมต่อฐานข้อมูลไม่ได้");
            mysqli_query($conn,"SET NAMES utf8");

            $sql = "INSERT INTO register (r_id, r_name, r_phone,r_height,r_address,r_birthday,r_color,r_major) VALUES (NULL, '{$fullname}', '{$phone}', '{$height}', '{$address}', '{$birthday}', '{$color}', '{$major}')";
            mysqli_query($conn, $sql) or die ("Insert ไม่ได้");

            echo "<script>";
            echo "alert('บันทึกข้อมูลสำเร็จ');";
            echo "</script>";
        }
        ?>

    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
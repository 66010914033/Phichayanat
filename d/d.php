<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>ฟอร์มสมัคร - พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body{
      background:#0b1220;
      color:white;
      font-family:Arial, sans-serif;
      padding:2rem;
    }
    .hero-card{
      max-width:900px;
      margin:auto;
      background:rgba(255,255,255,0.05);
      padding:2rem;
      border-radius:18px;
      box-shadow:0 10px 40px rgba(0,0,0,0.4);
    }
    .color-preview-box{
      width:40px;
      height:40px;
      border-radius:8px;
      border:1px solid rgba(255,255,255,0.2);
    }
    .result-card{
      margin-top:20px;
      background:rgba(255,255,255,0.08);
      padding:1rem;
      border-radius:12px;
    }
  </style>
</head>

<body>

  <div class="hero-card">
    <h2 class="mb-4 text-center">📝 ฟอร์มรับข้อมูล - พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</h2>

    <form method="post" action="" id="regForm" novalidate>

      <div class="mb-3">
        <label class="form-label">ชื่อ - สกุล</label>
        <input type="text" class="form-control" id="fullname" name="fullname" required>
      </div>

      <div class="mb-3">
        <label class="form-label">เบอร์โทร</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
      </div>

      <div class="mb-3">
        <label class="form-label">ส่วนสูง (ซม.)</label>
        <div class="input-group">
          <input type="number" class="form-control" id="height" name="height" min="100" max="200" required>
          <span class="input-group-text">ซม.</span>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">ที่อยู่</label>
        <textarea class="form-control" name="address" id="address" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">วันเดือนปีเกิด</label>
        <input type="date" class="form-control" id="birthday" name="birthday">
      </div>

      <div class="mb-3">
        <label class="form-label">สีที่ชอบ</label>
        <div class="d-flex align-items-center gap-3">
          <input type="color" class="form-control form-control-color" id="color" name="color" value="#0d6efd">
          <div>
            <div id="colorHex">#0D6EFD</div>
            <div id="colorPreview" class="color-preview-box" style="background:#0d6efd"></div>
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">สาขาวิชา</label>
        <select class="form-select" id="major" name="major">
          <option value="การบัญชี">การบัญชี</option>
          <option value="การตลาด">การตลาด</option>
          <option value="การจัดการ">การจัดการ</option>
          <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
        </select>
      </div>

      <div class="text-center mt-4">
        <button type="submit" name="Submit" class="btn btn-primary">สมัครสมาชิก</button>
        <button type="reset" class="btn btn-secondary">ยกเลิก</button>
        <button type="button" onclick="window.location='https://www.msu.ac.th/'" class="btn btn-info">ไป MSU</button>
        <button type="button" onclick="window.print()" class="btn btn-success">พิมพ์</button>
      </div>
    </form>

    <!-- PHP RESULT -->
    <?php
    if(isset($_POST['Submit'])){
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $height = $_POST['height'];
        $address = $_POST['address'];
        $birthday= $_POST['birthday'];
        $color = $_POST['color'];
        $major = $_POST['major'];
    ?>
    <div class="result-card mt-4">
      <h4>📊 ข้อมูลที่ได้รับ</h4>
      <p><strong>ชื่อ:</strong> <?= htmlspecialchars($fullname); ?></p>
      <p><strong>โทร:</strong> <?= htmlspecialchars($phone); ?></p>
      <p><strong>ส่วนสูง:</strong> <?= htmlspecialchars($height); ?> ซม.</p>
      <p><strong>ที่อยู่:</strong><br><?= nl2br(htmlspecialchars($address)); ?></p>
      <p><strong>วันเกิด:</strong> <?= htmlspecialchars($birthday); ?></p>
      <p><strong>สีที่ชอบ:</strong> <?= htmlspecialchars($color); ?></p>
      <div style="width:40px;height:40px;background:<?= htmlspecialchars($color) ?>;border-radius:6px;"></div>
      <p><strong>สาขา:</strong> <?= htmlspecialchars($major); ?></p>
    </div>
    <?php } ?>

  </div>

</script>

</body>
</html>

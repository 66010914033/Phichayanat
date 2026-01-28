<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์) - Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f8f9fa; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .table-header { background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; }
        .product-img { border-radius: 8px; object-fit: cover; border: 1px solid #ddd; }
    </style>
</head>

<body>
<div class="container py-5">
    <div class="card">
        <div class="card-header table-header p-4">
            <h2 class="mb-0 text-center">🛒 ระบบจัดการข้อมูลสินค้า (Inter)</h2>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="myDataTable" class="table table-hover table-striped w-100">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>ชื่อสินค้า</th>
                            <th>ประเภท</th>
                            <th>วันที่</th>
                            <th>ประเทศ</th>
                            <th class="text-end">จำนวนเงิน</th>
                            <th class="text-center">รูปภาพ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once("connectdb.php");
                    $sql = "SELECT * FROM `popsupermarket`";
                    $rs = mysqli_query($conn, $sql);
                    while($data = mysqli_fetch_array($rs)){
                    ?>
                    <tr>
                        <td><span class="badge bg-secondary">#<?php echo $data['p_order_id'];?></span></td>
                        <td class="fw-bold text-primary"><?php echo $data['p_product_name'];?></td>
                        <td><span class="badge rounded-pill bg-info text-dark"><?php echo $data['p_category'];?></span></td>
                        <td><?php echo date('d/m/Y', strtotime($data['p_date']));?></td>
                        <td>🌍 <?php echo $data['p_country'];?></td>
                        <td align="right" class="fw-bold text-success">
                            <?php echo number_format($data['p_amount'], 2);?> ฿
                        </td>
                        <td align="center">
                            <img src="imges/<?php echo $data['p_product_name'];?>.jpg" 
                                 width="50" height="50" class="product-img"  
                        </td>
                    </tr>
                    <?php 
                    } 
                    mysqli_close($conn);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myDataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json" // เมนูภาษาไทย
            },
            "pageLength": 10,
            "order": [[ 0, "desc" ]] // เรียงจาก Order ID ล่าสุด
        });
    });
</script>
</body>
</html>
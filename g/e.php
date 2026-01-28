<?php
    include_once("connectdb.php");

    // 1. ดึงข้อมูลจากฐานข้อมูล
    $sql = "SELECT `p_country`, SUM(`p_amount`) AS total_sales
            FROM `popsupermarket`
            GROUP BY `p_country` ";
    $rs = mysqli_query($conn, $sql);

    $countries = [];
    $sales = [];
    $table_data = [];

    while ($data = mysqli_fetch_array($rs)) {
        $countries[] = $data['p_country'];
        $sales[] = (float)$data['total_sales'];
        $table_data[] = $data; // เก็บไว้ใช้แสดงตาราง
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - พิชญาณัฏฐ์ รินทร์วงค์</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f7f6; padding: 20px; text-align: center; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #ff4757; text-shadow: 1px 1px 2px #ccc; }
        .chart-box { display: flex; flex-wrap: wrap; justify-content: space-around; margin-bottom: 30px; }
        canvas { max-width: 400px; max-height: 300px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; border-radius: 10px; overflow: hidden; }
        th { background-color: #1e90ff; color: white; padding: 12px; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>

<body>

<div class="container">
    <h1>📊 รายงานยอดขายแยกตามประเทศ</h1>
    <p>จัดทำโดย: <strong>พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</strong></p>

    <div class="chart-box">
        <canvas id="barChart"></canvas>
        <canvas id="pieChart"></canvas>
    </div>

    <table>
        <tr>
            <th>ประเทศ</th>
            <th>ยอดขาย (บาท)</th>
        </tr>
        <?php foreach ($table_data as $row) { ?>
        <tr>
            <td><?php echo $row['p_country']; ?></td>
            <td align="right"><?php echo number_format($row['total_sales'], 0); ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<script>
    // ข้อมูลจาก PHP ส่งมายัง JavaScript
    const labels = <?php echo json_encode($countries); ?>;
    const dataSales = <?php echo json_encode($sales); ?>;
    
    // กำหนดสีสดใส
    const brightColors = ['#ff6b81', '#1e90ff', '#2ed573', '#ffa502', '#3742fa', '#eccc68'];

    // 2. สร้าง Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดขายสะสม',
                data: dataSales,
                backgroundColor: brightColors
            }]
        },
        options: { plugins: { title: { display: true, text: 'กราฟแท่งแสดงยอดขาย' } } }
    });

    // 3. สร้าง Pie Chart
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: dataSales,
                backgroundColor: brightColors
            }]
        },
        options: { plugins: { title: { display: true, text: 'สัดส่วนยอดขาย (%)' } } }
    });
</script>

</body>
</html>
<?php mysqli_close($conn); ?>
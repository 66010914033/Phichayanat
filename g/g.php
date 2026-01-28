<?php
include_once("connectdb.php");

// ตั้งค่าดึงชื่อเดือนเป็นภาษาอังกฤษ
mysqli_query($conn, "SET lc_time_names = 'en_US'");

$sql = "SELECT
            MONTH(p_date) AS Month_Num,
            MONTHNAME(p_date) AS Month_Name,
            SUM(p_amount) AS Total_Sales
        FROM popsupermarket
        GROUP BY MONTH(p_date)
        ORDER BY Month_Num";

$rs = mysqli_query($conn, $sql);

$labels = [];
$values = [];
$table_rows = "";

if ($rs && mysqli_num_rows($rs) > 0) {
    while ($data = mysqli_fetch_assoc($rs)) {
        // เตรียมข้อมูลสำหรับกราฟ (JavaScript)
        $labels[] = $data['Month_Name'];
        $values[] = (float)$data['Total_Sales'];
        
        // เตรียมข้อมูลสำหรับตาราง (HTML)
        $table_rows .= "<tr>
                            <td>{$data['Month_Name']}</td>
                            <td align='right'>" . number_format($data['Total_Sales'], 2) . "</td>
                        </tr>";
    }
}
mysqli_close($conn);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - พิชญาณัฏฐ์ รินทร์วงค์</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; color: #333; padding: 20px; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 8px 30px rgba(0,0,0,0.1); }
        
        /* หัวข้อสวยๆ */
        .header { text-align: center; margin-bottom: 40px; }
        .header h1 { color: #2d3436; font-size: 2.2em; margin-bottom: 5px; }
        .header p { color: #636e72; font-size: 1.1em; border-bottom: 2px solid #fdcb6e; display: inline-block; padding-bottom: 5px; }
        
        /* การจัดวางกราฟ */
        .chart-section { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin-bottom: 40px; }
        .chart-box { flex: 1; min-width: 300px; max-width: 450px; background: #fff; border: 1px solid #eee; padding: 15px; border-radius: 15px; }
        
        /* ตาราง */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; border-radius: 10px; overflow: hidden; }
        th { background-color: #6c5ce7; color: white; padding: 15px; text-transform: uppercase; letter-spacing: 1px; }
        td { padding: 12px; border-bottom: 1px solid #eee; text-align: center; }
        tr:nth-child(even) { background-color: #f1f2f6; }
        tr:hover { background-color: #dfe6e9; }
    </style>
</head>

<body>

<div class="container">
    <div class="header">
        <h1>📊 รายงานสรุปยอดขายรายเดือน</h1>
        <p>จัดทำโดย: <strong>พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</strong></p>
    </div>

    <div class="chart-section">
        <div class="chart-box">
            <canvas id="barChart"></canvas>
        </div>
        <div class="chart-box">
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    <table border="0">
        <thead>
            <tr>
                <th>เดือน (Month)</th>
                <th>ยอดขายสะสม (Total Sales)</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $table_rows ?: "<tr><td colspan='2'>ไม่พบข้อมูล</td></tr>"; ?>
        </tbody>
    </table>
</div>

<script>
    // ส่งค่าจาก PHP ไปยัง JavaScript
    const ctxLabels = <?php echo json_encode($labels); ?>;
    const ctxData = <?php echo json_encode($values); ?>;
    
    // ชุดสีสดใส
    const brightColors = [
        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', 
        '#FF9F40', '#FFCD56', '#C9CBCF', '#70a1ff', '#2ed573'
    ];

    // สร้าง Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ctxLabels,
            datasets: [{
                label: 'ยอดขาย (บาท)',
                data: ctxData,
                backgroundColor: brightColors,
                borderRadius: 5
            }]
        },
        options: {
            plugins: {
                title: { display: true, text: 'กราฟแสดงยอดขายแต่ละเดือน', font: { size: 16 } },
                legend: { display: false }
            }
        }
    });

    // สร้าง Pie Chart
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: ctxLabels,
            datasets: [{
                data: ctxData,
                backgroundColor: brightColors,
                hoverOffset: 15
            }]
        },
        options: {
            plugins: {
                title: { display: true, text: 'สัดส่วนเปอร์เซ็นต์การขาย', font: { size: 16 } }
            }
        }
    });
</script>

</body>
</html>
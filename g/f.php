<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</title>
</head>

<body>

<h1>รายงานยอดขายรายเดือน</h1>

<table border="1" width="400">
    <tr>
        <th>Month</th>
        <th>Total Sales (Baht)</th>
    </tr>

<?php
include_once("connectdb.php");

/* บังคับชื่อเดือนเป็นภาษาอังกฤษ */
mysqli_query($conn, "SET lc_time_names = 'en_US'");

$sql = "SELECT
            MONTH(p_date) AS Month_Num,
            MONTHNAME(p_date) AS Month_Name,
            SUM(p_amount) AS Total_Sales
        FROM popsupermarket
        GROUP BY MONTH(p_date)
        ORDER BY Month_Num";

$rs = mysqli_query($conn, $sql);

if ($rs && mysqli_num_rows($rs) > 0) {
    while ($data = mysqli_fetch_assoc($rs)) {
?>
        <tr>
            <td><?php echo $data['Month_Name']; ?></td>
            <td align="right"><?php echo number_format($data['Total_Sales'], 2); ?></td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='2' align='center'>No data found</td></tr>";
}

mysqli_close($conn);
?>

</table>

</body>
</html>

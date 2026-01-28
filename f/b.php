<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</title>
</head>

<body>
<h1>พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</h1>
<form method="post" action="">
	กรอกตัวเลข<input type="number" name="a" autofocus required>
    <button type="submit" name="Submit">OK</button>
</form>
<hr>

<?php
if(isset($_POST['Submit'])){
	$sex = $_POST['a'];
	if($sex == 1){
		echo "เพศชาย";
	} else if ($sex == 2) {
		echo "เพศหญิง";
	} else if ($sex == 3) {
		echo "เพศทางเลือก";
	} else {
		echo "อื่นๆ" ;
	}
}
?>
</body>
</html>
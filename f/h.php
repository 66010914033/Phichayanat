<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</title>
</head>

<body>
<h1>พิชญาณัฏฐ์ รินทร์วงค์ (อินเตอร์)</h1>
<form method="post" action="">
	รหัสนิสิต <input type="number" name="a" autofocus required>
    <button type="submit" name="Submit">OK</button>
</form>
<hr>
<?php
if(isset($_POST{'Submit'})){
	$id = $_POST['a'];
	$y = substr($id,0,2);
	echo "<img src ='http://202.28.32.211/picture/student/{$y}/{$id}.jpg'width='600'>";
} 
?>


</body>
</html>
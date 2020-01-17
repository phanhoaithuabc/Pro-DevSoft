<?php
	$host = 'rapchieuphim.cjgnhgcoa3hk.us-east-1.rds.amazonaws.com';
	$user = 'admin';
	$pass = '12345678';
	$db = 'rapchieuphim';
	//error_reporting(0);//Chan thong bao loi

	$link = mysqli_connect($host,$user,$pass,$db) or die('Lỗi kết nối');
	//Dong bo charset (collation)
	mysqli_query($link,'set names utf8');
?>

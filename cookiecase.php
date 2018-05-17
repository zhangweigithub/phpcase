<?php 
if (isset($_GET['action'])&&$_GET['action']==='close-ad') {
	setcookie('key','value',time()+24*60*60);
	$_COOKIE['key']='value';
	
}
// session_start();
var_dump($_COOKIE['key']);
// var_dump($_SESSION['key']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
	.box {
		width: 1020px;
		height: 200px;
		background-color: lightblue;
		position: relative;
	}
	.close {
		display: block;
		width: 50px;
		height: 50px;
		background-color: darkorange;
		text-align: center;
		line-height: 50px;
		position: absolute;
		top: 0;
		right: 0;
	}
	
	</style>
</head>
<body>
	<div class="box">

		<?php// if (empty($_SESSION['key'])||$_SESSION['key']!=='value'): ?>
		<?php if (empty($_COOKIE['key'])||$_COOKIE['key']!=='value'): ?>
			
			<!-- <a class="close" href="close.php">关闭</a> -->

			<a class="close" href="cookiecase.php?action=close-ad">关闭</a>
		<?php else: ?>
			
		<?php endif ?>
		
		
	</div>
</body>
</html>
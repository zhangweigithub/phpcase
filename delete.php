<?php 
if (empty($_GET['id'])) {
	exit('请传入参数');
}
$id=$_GET['id'];
$connect=mysqli_connect('localhost','root','zw','test');
if (!$connect) {
	exit('连接失败');
}
$query=mysqli_query($connect,'delete from users where id in ('.$id.') limit 1;'); 
if (!$query) {
	exit('查询失败');
}
$rows=mysqli_affected_rows($connect);
if ($rows<0) {
	exit('删除失败');
}
mysqli_free_result($query);
mysqli_close($connect);
header('Location:shujukucaozuo.php');
?>
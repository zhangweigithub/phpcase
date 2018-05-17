<?php 
$fileStr=file_get_contents('names.txt');
// var_dump($fileStr);
$arr=explode("\n",$fileStr);
array_pop($arr);
// var_dump($arr);
foreach ($arr as $item) {
	$every=explode('|',$item);
	// var_dump($every);
	$data[]=$every;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>全部人员信息表</h1>
	<table>
		<thead>
			<tr>
				<th>编号</th>
				<th>姓名</th>
				<th>年龄</th>
				<th>邮箱</th>
				<th>网址</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $item): ?>
				<tr>
				<?php foreach ($item as $ele): ?>
					<?php $ele=trim($ele) ?>
					<?php if (strpos($ele,"http://")===0): ?>
						<?php $ele=str_replace("http://","",$ele); 
							$ele=strtolower($ele);
						?>
						<td><a href="#"><?php echo $ele; ?></a></td>
					<?php else: ?>
						<td><?php echo $ele; ?></td>
					<?php endif ?>
				<?php endforeach ?>
				</tr>
			<?php endforeach ?>
		</tbody>
	
	</table>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
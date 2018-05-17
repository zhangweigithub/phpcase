<?php 
 function upload(){
 	
 	// var_dump($_FILES);
 	
 	if ($_FILES['avatar']['name']=='') {
 		global $message;
 		$message='没有上传';
 		return;
 	}
 	if ($_FILES['avatar']['error']!==UPLOAD_ERR_OK) {
 		$message='上传失败';
 		return;
 	}
 	
 		$target="./uploads/".iconv("UTF-8","gbk",$_FILES['avatar']['name']);
 		$move=move_uploaded_file($_FILES['avatar']['tmp_name'],$target);
 	
 	
 	
 		$message='上传成功';
 	
 	
 	
 	
 }
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 	upload();
 
 }
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	<input type="file" name="avatar">
	<button type="submit">提交</button>
	<?php if (isset($message)): ?>


		<?php if (isset($move)): ?>
			<p style="color: hotpink"><?php echo '上传成功'; ?></p>
		<?php else: ?>
			<p style="color: hotpink"><?php echo $message; ?></p>
		<?php endif ?>
		
			
	<?php else: ?>
		<?php if (isset($move)): ?>
			<p style="color: hotpink"><?php echo '上传成功'; ?></p>
		<?php else: ?>
			<p style="color: hotpink"><?php echo ''; ?></p>
		<?php endif ?>
		
	<?php endif ?>
	
	
 	</form>
 </body>
 </html>
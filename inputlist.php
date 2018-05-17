<?php 

	function register(){
		global $message;
		if (empty($_POST['account'])) {
			$message='请输入账号';
			return;
		}
		if (empty($_POST['password1'])) {
			$message='请输入密码';
			return;
		}
		if (empty($_POST['password2'])) {
			$message='请输入确认密码';
			return;
		}
		if ($_POST['password1']!==$_POST['password2']) {
			$message='确认密码输入错误';
			return;
		}
		if (!(isset($_POST['check'])&&$_POST['check']=='on')) {
			$message='请同意协议';
			return;
		}
		 $username=$_POST['account'];
		 $password1=$_POST['password1'];
		 
		file_put_contents('name1.txt',$username.'|'.$password1."\n",FILE_APPEND);
		$message='注册成功';
	}
if ($_SERVER['REQUEST_METHOD']==='POST') {
	register();
	
}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="">
	<label for="username">账号：</label><input type="text" name="account" id="username" value="<?php echo isset($_POST['account'])?$_POST['account']:""; ?>"><br><br>
	<label for="psd1">密码：</label><input type="password"
	 name="password1" id="psd1"><br><br>
	<label for="psd2">确认密码：</label><input type="password" name="password2" id="psd2"><br><br>
	<input type="checkbox" name="check" value="on">同意以上   &nbsp<label><?php echo isset($message)?$message:''; ?></label><br><br>
	<button>注册</button>
	</form>
</body>
</html>
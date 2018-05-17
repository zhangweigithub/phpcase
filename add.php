<?php 
  function adddata(){
    global $message;
    if (empty($_POST['name'])) {
      $message='请设置姓名';
      return;
    }
    if (!(isset($_POST['gender'])&&$_POST['gender']!=='-1')) {
      $message='请设置性别';
      return;
    }
     

    if (empty($_POST['birthday'])) {
      $message='请设置年龄';
      return; 
    }
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];

    if (empty($_FILES['avatar'])) {
      $message='请上传头像';
      return;
    }
    $avatar=$_FILES['avatar'];
    if ($avatar['error']!==UPLOAD_ERR_OK) {
      $message='上=传出现错误';
      return;
    }
    $target='uploads/'.uniqid().'.'.pathinfo($avatar['name'],PATHINFO_EXTENSION);
    // var_dump($target);
    
    if(!(move_uploaded_file($avatar['tmp_name'], $target))){
      
      $message='上传失败';
      return;
    }
    $target='/'.$target;

  $connect=mysqli_connect('localhost','root','zw','test');
  if (!$connect) {
    $message='连接失败';
    return;
  }
  $query=mysqli_query($connect,"insert into users values (null,'{$name}',{$gender},'{$birthday}','{$target}');");
  if (!query) {
    $message='查询失败';
    return;
  }
  $rows=mysqli_affected_rows($connect);

  mysqli_free_result($query);

  mysqli_close($connect);
  header('Location:shujukucaozuo.php');
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
  adddata();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">XXX管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">用户管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">商品管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="heading">添加用户</h1>
    <?php if (isset($message)): ?>
    <div class="alert alert-warning">
      <?php echo $message; ?>
    </div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <option value="1">男</option>
          <option value="0">女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday" name="birthday">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>

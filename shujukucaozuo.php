<?php
$connect=mysqli_connect('localhost','root','zw','test');
if(empty($connect)){
  exit('连接失败');
}
$query=mysqli_query($connect,'select * from users;');
if (!$query) {
  exit('查询失败');
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
  <?php include"nav.html"; ?>
  <main class="container">
    <h1 class="heading">用户管理 <a class="btn btn-link btn-sm" href="add.php">添加</a></h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>头像</th>
          <th>姓名</th>
          <th>性别</th>
          <th>年龄</th>
          <th class="text-center" width="140">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php while($item=mysqli_fetch_assoc($query)) : ?>
          <tr>
            <th scope="row"><?php echo $item['id']; ?></th>
            <td><img src="<?php echo $item['avatar']; ?>" class="rounded" alt="<?php echo $item['name']; ?>"></td> 
            <td><?php echo $item['name']; ?></td> 
            <td><?php if ($item['gender']==0): ?>
              <?php echo '♀'; ?>
            <?php else: ?>
              <?php echo '♂'; ?>
            <?php endif ?></td>
            <td><?php echo (int)((time()-strtotime($item['birthday']))/12/30/24/60/60) ?></td>
            <td class="text-center">
              <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $item['id'] ?>">编辑</a>
            <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $item['id'] ?>">删除</a>
            </td>
          </tr>
        <?php endwhile ?>
      </tbody>
      <?php 
        mysqli_free_result($query);
        mysqli_close($connect);
      ?>
    </table>
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
    </ul>
  </main>
</body>
</html>

<?php
  session_start();
  require '../Controllers/action.php';
  $show = new Select;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>メモ帳</title>
</head>
<body>
  <main>
  <h1>メモ帳</h1>
  <button type=“button” onclick="location.href='./index.php?execution=reset'">リセット</button>
  <h2>メモする</h2>
    <?php
    //再編集モードだったら
    if(!empty($_GET['execution'])){
      if($_GET['execution']=='update'){
        $update = new Update();
        $update->memoUpdate($_GET['id']);
      }
    }else{
      //通常表示
    ?>
    <form action="" method="post">
      <input type="test" name="sendText">
      <button name="mode" value="insert" type="submit">保存</button>
    </form>
  <?php  }?>
  <h2>履歴</h2>
    <?= $show -> memoDisp(); ?>
  </main>
</body>
</html>
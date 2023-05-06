<?php
require('../Controllers/crudController.php');

//!インサート処理
if(!empty($_GET['execution'])){
  //!セッションリセット
  if($_GET['execution']=='reset'){
    $reset = new Delete();
    $reset->index();
  }elseif($_GET['execution']=='update'){
    //!メモを編集
    // $update = new Update();
    // $update->memoUpdate($_GET['id']);
  }elseif($_GET['execution']=='edit'){
    //!編集を保存
    $edit = new Update();
    $edit->index($_GET['id'],$_POST['sendText']);
    header('Location:../View/');
  }elseif($_GET['execution']=='delete'){
    //!メモを削除
    $delete = new Delete();
    $delete->memoDelete($_GET['id']);
    header('Location:../View/');
  }
}elseif(!empty($_POST['mode'])){
  //!新規メモを保存
  $insert = new Insert();
  $insert->memoInsert($_POST['sendText']);
}

class Select{
  //メモ一覧を表示
  function memoDisp(){
    if(!empty($_SESSION['memoKeep'])){
    echo '<ul>';
    foreach($_SESSION['memoKeep'] as $index=> $memoKeeps){
      echo '<li><div>';
      echo $index;
      echo '<p><span class="date">',$memoKeeps[1],'</span><br>',$memoKeeps[0],'</p>';
      echo '<button onclick="location.href=\'./index.php?execution=delete&id=',$index,'\'">削除</button>','<button onclick="location.href=\'./index.php?execution=update&id=',$index,'\'">編集</button>';
      echo '</div></li>';
    }
    echo '</ul>';
  }else{
    echo '<p>まだメモはありません</p>';
  }
  }
}


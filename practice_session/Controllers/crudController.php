<?php
  date_default_timezone_set('Japan');
  $getTime='';
  $getTime=date('Y-m-d H:i:s');
  // $setDate($getTime);


  //
  //新規挿入
  //
  class Insert{
    //時間取得
    private $getTime;
    public $memoKeepCnt=0;

    function __construct(){
      //メモを作成した時間
      date_default_timezone_set('Japan');
      $this->getTime=date('Y-m-d H:i:s');
      //最後尾の数字を取得
      if(!empty($_SESSION['memoKeep'])){
        $this->memoKeepCnt=(int)count($_SESSION['memoKeep']);
      }
    }

    function memoInsert($getMemo){
      //メモを新規保存
      $_SESSION['memoKeep'][$this->memoKeepCnt]=[
        $getMemo,$this->getTime
      ];
    }

  }

  //
  //削除
  //
  class Delete{
    function index(){
      //メモオールリセット
      unset($_SESSION['memoKeep']);
      header('Location:../View/');
    }
    function memoDelete($id){
      //指定のメモ削除
      $idNum=(int)$id;
      unset($_SESSION['memoKeep'][$idNum]);
    }
  }

  //
  //メモを編集して保存
  //
  class Update{
    //保存してあった文字列を取り出し
    function memoUpdate($id){
      $idNum=(int)$id;
      $getText=$_SESSION['memoKeep'][$idNum][0];
      echo '<form action="./index.php?execution=edit&id=',$idNum,'" method="post">';
      echo '<input type="test" name="sendText" value="',$getText,'">';
      echo '<button name="mode" value="insert" type="submit">保存</button>';
      echo '</form>';
    }
    //再編集したメモを保存
    function index($id,$editText){
      $idNum=(int)$id;
      $_SESSION['memoKeep'][$idNum][0]=$editText;
    }
  }
  ?>
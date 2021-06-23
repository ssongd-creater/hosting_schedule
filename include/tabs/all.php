<?php
  $tabIdx = $_GET['key'];
  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php"; //db 접속정보 로드
  //$sql = "SELECT * FROM sp_table ORDER BY SP_idx DESC";

  if($tabIdx == "all"){
    $sql = "SELECT * FROM sp_table ORDER BY SP_idx DESC";
  } else {
    $sql = "SELECT * FROM sp_table WHERE SP_cate = '{$tabIdx}' ORDER BY SP_idx DESC";
  };
  
  $board_result = mysqli_query($dbConn, $sql);

  while($db_row = mysqli_fetch_array($board_result)){
    $board_row_idx = $db_row['SP_idx'];
    $board_row_cate = $db_row['SP_cate'];
    $board_row_tit = $db_row['SP_tit'];
    $board_row_reg = $db_row['SP_reg'];

    if($board_row_cate == "thermometer-half"){
      $board_row_cate = "API";
    } else if($board_row_cate == "clone"){
       $board_row_cate = "Renewal";
    } else if($board_row_cate == "bar-chart-o"){
      $board_row_cate = "Planning";
    } else if($board_row_cate == "database"){
      $board_row_cate = "Database";
    }
?>

<li class="board-contents">
  <span><?=$board_row_idx?></span>
  <span><?=$board_row_cate?></span>
  <span><a href="/schedule/pages/sp_detail_view.php?pageNum=<?=$board_row_idx?>"><?=$board_row_tit?></a></span>
  <span><?=$board_row_reg?></span>
  <span>
    <a href="/schedule/php/sp_delete.php?del_idx=<?=$board_row_idx?>" class="del-btn txt">삭제</a>
    <a href="/schedule/php/sp_delete.php?del_idx=<?=$board_row_idx?>" class="del-btn icon"><i
        class="fa fa-times"></i></a>
  </span>
</li>

<?php
  }
?>
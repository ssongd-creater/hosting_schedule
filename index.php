<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio Process</title>
  <!-- Favicon Link -->
  <link rel="shortcut icon" href="/schedule/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/schedule/images/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/schedule/images/favicon.png">

  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Google Font Link -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&family=Roboto:wght@300;400;500;700&display=swap"
    rel="stylesheet">

  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/schedule/css/reset.css">

  <!-- Plugin CSS Link -->
  <link rel="stylesheet" href="/schedule/lib/css/lightslider.css">
  <link rel="stylesheet" href="/schedule/lib/css/piechart.css">

  <!-- Main CSS Link -->
  <link rel="stylesheet" href="/schedule/css/style.css">
  <!-- Animation CSS Link -->
  <link rel="stylesheet" href="/schedule/css/animation.css">
  <!-- <Media Css Link -->
  <link rel="stylesheet" href="/schedule/css/media.css">


</head>

<body>
  <div class="wrapper">
    <div class="dashboard">
      <!-- Main Dashboard Frame -->

      <?php
      include $_SERVER['DOCUMENT_ROOT']."/schedule/include/header.php";
      include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
      ?>

      <section class="graph-ui">
        <div class="intro">
          <?php
            $sl_arr = array('database','thermometer-half','clone','bar-chart-o');
            $sl_str="";
            //var_dump($sl_arr);
            //echo count($sl_arr); //4개의 array가 있다고 나옴 즉, 반복문 사용가능
            for($i = 0; $i < count($sl_arr); $i++){
              //echo $sl_arr[$i]; 
            
            $sql1 = "SELECT * FROM sp_table WHERE SP_cate='$sl_arr[$i]' ORDER BY SP_idx DESC LIMIT 1";
            $sl_result = mysqli_query($dbConn, $sql1);
            $sl_rewult_row = mysqli_fetch_array($sl_result);
            $sl_idx = $sl_rewult_row['SP_idx'];
            $sl_con = $sl_rewult_row['SP_con'];
            $sl_cate = $sl_rewult_row['SP_cate'];
            
            //echo $sl_idx.'<br>';
            //echo $sl_con.'<br>';
            //echo $sl_cate.'<br>';

            if($sl_cate == 'database'){
              $sl_str = 'database';
            }else if($sl_cate == 'thermometer-half'){
              $sl_str = 'API';
            }else if($sl_cate == 'clone'){
              $sl_str = 'Renewal';
            }else if($sl_cate == 'bar-chart-o'){
              $sl_str = 'Planning';
            };
          ?>

          <div class="slide-box">
            <h2><?=$sl_str?> Project Process</h2>
            <p><?=$sl_con?></p>
            <a href="/schedule/pages/sp_detail_view.php?pageNum=<?=$sl_idx?>">More Details</a>
            <i class="fa fa-<?=$sl_cate?>"></i>
          </div>
          <?php
            }
          ?>

        </div>
        <div class="each-pofol">
          <div>
            <div class="each-title">
              <h3>Each Portfolio Process Rate</h3>
            </div>
            <div class="each-graph">

            </div>
          </div>
        </div>
        <?php
        include $_SERVER['DOCUMENT_ROOT']."/schedule/include/total_pofol.php";
        ?>

      </section>
      <?php
        include $_SERVER['DOCUMENT_ROOT']."/schedule/include/table_ui.php";
      ?>
    </div>
    <!-- End of Main Dashboard Frame -->
  </div>

  <?php
    include $_SERVER['DOCUMENT_ROOT']."/schedule/include/modal.php";
  ?>

  </div>
  <!-- Jquery Framework Load -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Plugins Load -->
  <script src="/schedule/lib/js/lightslider.js"></script>
  <script src="/schedule/lib/js/jquery.easypiechart.min.js"></script>
  <!-- Vanilla JS Code Load -->
  <script src="/schedule/js/index.js"></script>
  <!-- Jquery Code Load -->

  <script src=/schedule/js/modalAjax.js></script>
  <script src=/schedule/js/total_avg.js></script>
  <script src="/schedule/js/jquery.index.js"></script>


</body>

</html>
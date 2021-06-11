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

  <script defer>
  const hostname = window.location.href;
  console.log(hostname);
  if (hostname == 'http://ssongd.dothome.co.kr/schedule/') {
    window.location.replace('http://ssongd.dothome.co.kr/schedule/index.php?key=database');
  }
  </script>
</head>

<body>
  <div class="wrapper">
    <div class="dashboard">
      <!-- Main Dashboard Frame -->

      <?php
      include $_SERVER['DOCUMENT_ROOT']."/schedule/include/header.php";
      ?>

      <section class="graph-ui">
        <div class="intro">
          <div class="slide-box">
            <h2>Database Project Process</h2>
            <p>데이터베이스 테이블 설계 완료<br>테이블 UI 디자인 완료</p>
            <a href="#">More Details</a>
            <i class="fa fa-database"></i>
          </div>
          <div class="slide-box">
            <h2>Database Project Process</h2>
            <p>API 테이블 설계 완료<br>테이블 UI 디자인 완료</p>
            <a href="#">More Details</a>
            <i class="fa fa-database"></i>
          </div>
          <div class="slide-box">
            <h2>Database Project Process</h2>
            <p>리뉴얼 테이블 설계 완료<br>테이블 UI 디자인 완료</p>
            <a href="#">More Details</a>
            <i class="fa fa-database"></i>
          </div>
          <div class="slide-box">
            <h2>Database Project Process</h2>
            <p>기획 테이블 테이블 설계 완료<br>테이블 UI 디자인 완료</p>
            <a href="#">More Details</a>
            <i class="fa fa-database"></i>
          </div>

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

  <!-- 2.모달 박스 UI 제작 => style.css 581번줄-->
  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <!-- <span class="close" id="times">&times;</span>
      <p>Some text in the Modal..</p> -->
      <form action="/schedule/php/sp_rate_insert.php" class="rate-form" name="rate_form">


      </form>
      <div class="updateBtnBox">
        <button type="button" id="updateBtn">Update Rate</button>
      </div>
      <script>
      const updateBtn = document.querySelector('#updateBtn');
      //const modal = document.querySelector('#myModal');
      updateBtn.onclick = function() {
        document.rate_form.submit();
        modal.style.display = "none";
      }
      </script>
    </div>

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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Schedule Insert</title>

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
  <!-- <Media Css Link -->
  <link rel="stylesheet" href="/schedule/css/media.css">
  <!-- Animation CSS Link -->
  <link rel="stylesheet" href="/schedule/css/animation.css">
</head>

<body>
  <div class="wrapper">
    <!-- Main Dashboard Frame -->
    <div class="dashboard">
      <?php
      include $_SERVER['DOCUMENT_ROOT']."/schedule/include/header.php";
      ?>

      <section class="graph-ui">
        <?php
        include $_SERVER['DOCUMENT_ROOT']."/schedule/include/total_pofol.php";
        ?>
        <div class="input-box">
          <div class="title-box">
            <h3>Today's Schedule</h3>
          </div>
          <form action="/schedule/php/sp_insert.php" method="post" name="spInputForm">
            <div class="input-tit">
              <input type="text" placeholder="일정 요약을 입력해 주세요." name="spInputTit">
              <select name="spInputCate">
                <option value="database">DB Project</option>
                <option value="thermometer-half">API Project</option>
                <option value="clone">Renewal Project</option>
                <option value="bar-chart-o">Planning Project</option>
              </select>
            </div>
            <div class="input-con">
              <textarea placeholder="상세 일정을 작성해 주세요." name="spInputCon"></textarea>
            </div>
          </form>

          <div class="btns">
            <button type="button" onclick="spInsert()">진행 상황 작성</button>
          </div>
          <script>
          function spInsert() {
            if (!document.spInputForm.spInputTit.value) {
              alert('일정 요약을 작성해 주세요');
              document.spInputForm.spInputTit.focus();
              return;
            }

            if (!document.spInputForm.spInputCon.value) {
              alert('상세 일정을 작성해 주세요');
              document.spInputForm.spInputCon.focus();
              return;
            }

            document.spInputForm.submit();
          };
          </script>

        </div>
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
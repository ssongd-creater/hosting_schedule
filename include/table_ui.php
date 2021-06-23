<!-- Table Contents on Right side -->
<section class="table-ui">
  <div class="new-update">
    <div class="tit-box">
      <p>Recent Update</p>
      <a href="/schedule/pages/sp_detail_form.php?key=all">More</a>
    </div>

    <ul class="con-details">
      <?php
      include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php"; //db 접속정보 로드
      $sql = "SELECT * FROM sp_table ORDER BY SP_idx DESC LIMIT 5";
      $ta_result = mysqli_query($dbConn, $sql);
      $ta_num_result = mysqli_num_rows($ta_result);

      if(!$ta_num_result){
    ?>
      <li>
        <p>입력된 일정이 없습니다.</p>
      </li>
      <?php
      } else {
        while($ta_row = mysqli_fetch_array($ta_result)){
          $ta_row_idx = $ta_row['SP_idx'];
          $ta_row_cate = $ta_row['SP_cate'];
          $ta_row_tit = $ta_row['SP_tit'];
          $ta_row_reg = $ta_row['SP_reg'];
    ?>
      <li><i class="fa fa-<?=$ta_row_cate?>"></i>
        <div class="con-txt">
          <p><a href="/schedule/pages/sp_detail_view.php?pageNum=<?=$ta_row_idx?>"><?=$ta_row_tit?></a></p>
          <em><?=$ta_row_reg?></em>
        </div>
      </li>
      <?php
        };
      };
    ?>
    </ul>
  </div>

  <div class="each-contents">
    <div class="each-btns">
      <!-- <a href="?key=database" class="active">Database</a>
      <a href="?key=api">API</a>
      <a href="?key=renewal">Renewal</a>
      <a href="?key=planning">Planning</a> -->
      <!-- 다영 -->
      <button value='database' class="active">Database</button>
      <button value='thermometer-half'>API</button>
      <button value='clone'>Renewal</button>
      <button value='bar-chart-o'>Planning</button>


    </div>
    <ul class="con-details" id="con-details">

    </ul>
  </div>
</section>
<!-- 다영 -->
<!-- <script>
function reqListener() {
  const jsonObj = JSON.parse(this.responseText);
  //console.log(jsonObj);
  function test() {
    //console.log(jsonObj);
    // for (let i = 0; i < jsonObj.length; i++) {
    //   console.log(jsonObj[i]);
    // };

    const resulttest = jsonObj.filter(value => {
      value.sp_cate == 'database';
    });
  };
  test();
};

var oReq = new XMLHttpRequest();
oReq.addEventListener("load", reqListener);
//로드를 했을 때 reqListener 를 작동하게 해준다.
//2. 비동기 통신 json data 파일 경로 변경
oReq.open("GET", "/schedule/php/read_table_json.php");
oReq.send();
</script> -->

<!-- 쌤이랑 -->
<script>
function reqListener() {
  //3. 읽어온 php 문자열을 json으로 변경(파싱한다고 한다.)
  const jsonObj = JSON.parse(this.responseText);
  //json에서 받아온 값을 파싱 시킨다. responseText 의 값을
  //14. 데이터 삽입할 태그 변수에 저장
  const jsonDom = document.querySelector('#con-details');
  //console.log(jsonObj);
  //console.log(jsonDom);

  //4.abc 함수 정의(내용 정의한 건 아니고 함수만 딱 쓴거)
  function callTabs(n) {
    //6. abc 함수 테스트 코드 작성
    //console.log("abc"); 함수 테스트 하고 되는 것 확인하고 주석처리함
    //7. abc 함수에서 jsonObj 데이터 읽을 수 있는지 테스트
    //console.log(jsonObj);
    //8.jsonObj 데이터를 각각 하나씩 일기 위해 반복문 작성(filter 함수 사용) => 63번줄
    //  for(let i = 0; i < jsonObj.length; i++){
    //    console.log(jsonObj[i]);
    //  }
    //jsonObj.forEach(elements => {});
    // jsonObj.forEach(function(elements){
    //   console.log(elements);
    // });

    const result = jsonObj.filter(value => {
      //10. value의 데이터 중 sp_cate가 database와 같은 값 필터링
      //value.sp_cate == "database";
      //11. 테스트 후 return 추가. 이유는 10번에 console.log에서 true,false값만 나왔기 때문에
      return value.sp_cate == n;
      //9. value가 database 인 값만 필터링
      //value == "database";
      //개수가 아니라 객체 자체(문자열)를 빼내야 하기때문에 return값을 주었다.
    });
    //12. 필터링 된 결과값 확인 = 11번 줄 html에서 div를 만들어줌
    //console.log(result);

    //15. 필터링 결과 값 반복문으로 읽은 후 jsonDom 변수에 태그 추가 => 14번줄
    for (let i = 0; i < result.length; i++) {
      //console.log(result[i].sp_idx);
      jsonDom.innerHTML += `
      <li><i class="fa fa-${result[i].sp_cate}"></i>
        <div class="con-txt">
          <p><a href="/schedule/pages/sp_detail_view.php?pageNum=${result[i].sp_idx}">${result[i].sp_tit}</a></p>
          <em>${result[i].sp_reg}</em>
        </div>
      </li>
      `;
      //backtic 안에 넣는 것을 탬플릿 문자열이라고 한다. - 변수 처리는 ${} 안에 한다.

    }
  };
  //17. 버튼 태그 btns 변수에 저장
  const btns = document.querySelectorAll('.each-btns button');
  console.log(btns);

  //18. btns 반복문으로 읽음
  btns.forEach(value => {
    console.log(value);
    //19. 각각의 버튼 클릭 함수 작성
    value.addEventListener('click', function() {
      //console.log(btns);
      btns.forEach(btnItem => {
        btnItem.className = "";
      })
      //20. 클릭한 버튼 this로 확인
      //console.log(this);
      //21. html button 태그에 value 속성 추가 후 추가 된 value의 값 확인
      //console.log(this.getAttribute('value'));
      //24. 버튼을 클릭 했을 때 jsonDom 태그 내부를 비움
      jsonDom.innerHTML = "";
      //22.value 값 itemVal 변수에 저장
      const itemVal = this.getAttribute('value');
      this.className = "active";
      //23. abc 함수 클릭 함수 안으로 이동 후 파라미터를 itemVal 변수로 변경
      //abc("database");
      callTabs(itemVal);
    });
  });

  callTabs("database");
  //5.abc(); 함수 호출
}


//1. xmlhttpRequest 함수 문법 작성
var oReq = new XMLHttpRequest();
oReq.addEventListener("load", reqListener);
//로드를 했을 때 reqListener 를 작동하게 해준다.
//2. 비동기 통신 json data 파일 경로 변경
oReq.open("GET", "/schedule/php/read_table_json.php");
oReq.send();
</script>
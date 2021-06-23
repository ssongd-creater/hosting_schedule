<?php

  $url = $_SERVER["DOCUMENT_ROOT"]."/schedule/data/sp_table.json";
  //echo $url;

  $json_string = file_get_contents($url);
  echo $json_string;

  // echo확인하는 법 http://localhost/schedule/php/read_json.php 를 url변수를 저장했고 그 값을 json_string변수가 읽은 것을 보여줌
?>
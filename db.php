<?php
//autoset 설치필요
//설치 후 이 프로젝트 파일을 c://AutoSet10/public_html 로 옮기기
//localhost/phpmyadmin 로 간다음 사용자 계정에서 root의 비밀번호를 변경(안하면 accsess denied뜸)
//phpMyAdmin에 들어가서 custom이라는 database를 만들고 그 안에 info테이블을 만든 뒤 코드를 참고하면서 칼럼들을 만들어놓을것(4개)
//나머지 테이블들도 코드보면서 만들어놓을것
session_start();//세션아이디가 이미 존재하는지를 확인하고 존재하지않으면 새로운 아이디를 만듭니다.
 $db = new mysqli("127.0.0.1","root","jowoosung123","custom");
 $db->set_charset("utf8");

 function mq($sql){//mq함수는 외부에서 선언된 $sql를 함수내에서 쓸수있게해주는함수이다
   global $db;
   return $db->query($sql);
 }
 ?>

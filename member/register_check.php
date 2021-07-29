<?php
  include "../db.php";
  //include "../../password.php";

  $userid = $_POST['userid'];
  $userpw = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
  $username = $_POST['username'];
  $age = $_POST['userage'];
  $check_id_sql = mq("select * from info where custom_id='".$userid."'");
  $check_id = $check_id_sql->fetch_array();
  if($check_id==0){
    $sql = mq("insert into info (custom_id,custom_password,custom_name,custom_age) values('".$userid."','".$userpw."','".$username."','".$age."')");
    //echo "<meta charset="utf-8" />";
    echo"<script>alert('회원가입이 완료되었습니다.');location.replace('../page/login.html')</script>";
  }else{
    echo "<script>alert('이미 존재하는아이디입니다.'); history.back();</script>";
  }



?>

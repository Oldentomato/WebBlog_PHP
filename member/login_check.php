<meta charset="utf-8" />
<?php
  include "../db.php";
  //include "./password.php";

  //POST로 받아온 아이디와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아간다.
  if($_POST["userid"]=="" || $_POST["userpw"]==""){
    echo '<script> alert("아이디나 패스워드를 입력하시오");history.back();</script>';
  }else{
    //password변수에 POST로 받아온 값을 저장하고 sql문으로 POST로 받아온 아이디값을 찾습니다
    $password = $_POST["userpw"];
    $sql = mq("select * from info where custom_id='".$_POST['userid']."'");
    $member = $sql->fetch_array(); //쉽게말해서 클래스내 객체를 참조할때 쓰는 . 과 같다
    $hash_pw = $member['custom_password'];//$hash_pw에 POST로 받아온 아이디열의 비밀번호를  저장합니다

    if(password_verify($password,$hash_pw)){//만약 password변수와 hash_pw변수가 같다면 세션값을 저장하고 알림창을 띄운후 main.php파일로 넘어갑니다.
      $_SESSION['username']=$member["custom_name"];
      $_SESSION['userpw']=$member["custom_password"];
      $_SESSION['userid']=$member["custom_id"];
      echo "<script>alert('로그인되었습니다.');location.href='../page/index.html';</script>";
    }else{
      //echo 'Current PHP version: ' .phpversion(); //php버전확인용
      echo"<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
    }



  }
?>

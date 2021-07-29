<?php
  include "../db.php";

  //각 변수에 write.php에서 input name값들을 저장한다
  $username = $_SESSION['username'];
  $userpw= password_hash($_POST['pw'],PASSWORD_DEFAULT);
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = date('Y-m=d');
  $uploadOk = 1;
  //파일업로드 변수
  $target_dir = "../uploads/";// \\을 해워야 주소문자열이 끝났다는의미다 된다 안그러면 밑에 주석처럼된다
  //basename=확장자를 제외한 파일이름을 가져오기 확장자 //제외하면 저장할때 파일로 인식을 못해서 저장이 안됨
  $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
  //strtolower=문자열에서 대문자를 소문자로 변환한다
  //pathinfo=파일 경로에 대한 정보를 반환하는 함수이다 옵션에 따라 연관 배열또는 문자열로 반환한다.
  //PATHINFO_EXTENSION 아마 파일 확장자인것같다
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  //getimagesize=이미지의 사이즈에따라서 반환해줌
  //1=GIF 2=JPG 3=SWF 4=PSD 5=BMP 15까지있는데 거기는 모르는 확장자가 많아서 패스
  //tmp_name 임시디렉토리에 있는 파일의 이름
  $checkfile = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  //echo "<script>alert('".$checkfile."');";
  if($checkfile !== false){
    //echo "File is an image - ".$checkfile["mime"].".";  
    $uploadOk = 1;
  }
  else{
    $uploadOk = 0;
    
  }
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "<script>alert('Sorry, your file is too large.');"; 
    $uploadOk = 0;
  }
  if($username&&$userpw&&$title&&$content&&$uploadOk){
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
      $sql = mq("insert into notice_board(name,pw,title,content,date,file) values('".$username."','".$userpw."','".$title."','".$content."','".$date."','".$target_file."')");
      echo "<script>
      alert('글쓰기 완료되었습니다.');
      location.href='../page/writepost.html';</script>";
    }
    else{
      echo "<script>alert('보안의 위협이 되는 업로드입니다');history.back();</script>";
    }
  }else{
    if(!$uploadOk){
      echo "<script> alert('이미지 업로드에 실패했습니다');history.back();</script>";
    }
    else{
      echo"<script>
      alert('글쓰기에 실패했습니다.');
      history.back();</script>";
    }

  }

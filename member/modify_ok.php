<?php
  include "../db.php";

  $bno = $_GET['idx'];
  $title = $_POST['title'];
  $name = $_POST['name'];
  $content = $_POST['content'];
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $sql = mq("update notice_board set name='".$name."',pw='".$password."',title='".$title."',content='".$content."' where idx='".$bno."'");

?>

<script type="text/javascript">alert("수정되었습니다")</script>
<meta http-equiv="refresh" content="0 url=../page/read_post.html?idx=<?php echo $bno; ?>">

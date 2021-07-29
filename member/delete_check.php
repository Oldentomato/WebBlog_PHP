<?php
  include "../db.php";
  $bno = $_GET['idx'];
  $sql = "select file from notice_board where idx=";
  $member = mq($sql.$bno);
  $path = $member->fetch_array();
  unlink($path['file']);
  $sql = "delete from notice_board where idx=";
  mq($sql.$bno);
  $bno--;
  $sql = "alter table notice_board auto_increment=";
  mq($sql.$bno);
?>


<script type="text/javascript">alert("삭제되었습니다")</script>
<meta http-equiv="refresh" content="0 url=../page/index.html">
<?php
include('header.php');
include('connect.php');

if(isset($_POST['meeting_code']))
{
  echo "success";
}
else {
  echo "fail";
}
include('footer.php');
?>

<?php
  include('conf/config.php');
  $id=$_GET['id'];
  $query="delete from personnel where id=$id";
  mysqli_query($conn,$query);
  echo 'Die Person wurde gel&ouml;scht!';
?>


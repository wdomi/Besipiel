<?php
  include("conf/config.php");
  $query = "select * from personnel";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($result)) {
    $lastname  = $row['lastname'];
    $firstname = $row['firstname'];
    $nick      = $row['nick'];
    $email     = $row['email'];
    $salary    = $row['salary'];
    echo "$lastname<br>
          $firstname<br>
          $nick<br>
          $email<br>
          $salary<br><br>";
  }	
?>

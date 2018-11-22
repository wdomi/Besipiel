<?php
  include("conf/config.php");
  $query = "select ** from personnel"; //Falscher Tabellenname!
  $result = mysqli_query($conn,$query) 
            or die ('L'.__LINE__.' '.mysqli_error($conn));
?>


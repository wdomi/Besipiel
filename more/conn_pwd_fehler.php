<?php
  include('conf/config.php');
  $connection=mysqli_connect($dbserver, 
                             'user',
                             'passwort',
                             $datenbank)
  or 
  die('L'.__LINE__.' '.mysqli_connect_error());
   
?>

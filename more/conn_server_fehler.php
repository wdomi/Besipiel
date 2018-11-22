<?php
  include('conf/config.php');
  $connection=mysqli_connect('server', $benutzername, //Falscher Servername
                $passwortwww,$datenbank) 
  or die ('L'.__LINE__.': '.mysqli_connect_error()); 
?>

<?php
  $dbserver    = 'localhost';
  $benutzer    = 'root';
  $passwort    = '';
  $datenbank   = 'mykurs';
  $conn  = mysqli_connect($dbserver,
                          $benutzer, 
                          $passwort,
                          $datenbank);
?>

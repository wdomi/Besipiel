<?php
  $dbserver    = 'localhost';
  $benutzer    = 'root';
  $passwort    = '';
  $datenbank   = 'mykurserw';
  $conn  = mysqli_connect($dbserver,
                          $benutzer, 
                          $passwort,
                          $datenbank);
?>

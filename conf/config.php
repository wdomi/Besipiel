/*
<?php
$dbserver = 'localhost';
$benutzer = 'root';
$passwort = '';
$datenbank = 'mykurs';
$conn = mysqli_connect(
  $dbserver,
  $benutzer,
  $passwort,
  $datenbank
);
?>
*/

$conn = new PDO( "mysql:host=localhost;
dbname=mykursXY",
"root",
"" );
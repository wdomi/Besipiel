<html>
<h1>Ein Department &auml;ndern</h1>
<?php
 //Datei mit den Variablen $benutzerwww, $passwortwww, $datenbank, $dbserver
 include('conf/config.php');
 $update   = $_GET['update'];
 $dname    = $_GET['dname'];
 $street   = $_GET['street'];
 $id       = $_GET['id'];
 $php_self = $_SERVER['PHP_SELF'];
 // Dies ist auch so in der Tabelle department
 if($update and $dname and $street){
   $query = "update department
                set dname   ='$dname',
                    street  ='$street'
              where id=$id";
   mysqli_query($conn,$query) or die ("Konnte query $query nicht ausfuehren.");

   echo "Thank you! This Information was entered:<br>
         dname:  $dname<br>
         street: $street<br>";
 }
 else{
   echo "<form action='$php_self' method='get'>
           Id:     $id<br>
                   <input type='hidden' name='id' value='$id'>
           dname:  <input name='dname' value='$dname'><br>
           street: <input name='street'  value='$street'> <br>
                   <input type='submit' name='update' value='Update'>
         </form>";
 }
?>
</html>




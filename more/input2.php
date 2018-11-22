<html>

<h1>Eine neue Person aufnehmen</h1>

<?php
 //Datei mit den Variablen $benutzerwww, $passwortwww, $datenbank, $dbserver
 include('conf/config.php');

 // Alle Felder ausser Salary muessen zwingend gefuellt sein
 // Dies ist auch so in der Tabelle personnel
 $firstname     = mysqli_real_escape_string($connection,$_GET['firstname']);
 $lastname      = mysqli_real_escape_string($connection,$_GET['lastname']);
 $nick          = mysqli_real_escape_string($connection,$_GET['nick']);
 $email         = mysqli_real_escape_string($connection,$_GET['email']);
 $salary        = mysqli_real_escape_string($connection,$_GET['salary']);
 $department_id = mysqli_real_escape_string($connection,$_GET['department_id']);
 $php_self      = $_SERVER['PHP_SELF'];

 if( $firstname and $lastname and $nick and $email ){
   $query = "insert into personnel 
             (firstname, lastname, nick, email, salary, department_id) 
             values
             ('$firstname','$lastname','$nick','$email','$salary','$department_id')";
   mysqli_query($connection,$query);

   echo "Thank you! This Information was entered:<br>
         Firstname:     $firstname<br>
         Lastname:      $lastname<br>
         Nickname:      $nick<br>
         E-Mail:        $email<br>
         Salary:        $salary<br>
         Department-ID: $department_id<br>";

 } 
 else{
   echo "<form action='$php_self' method='get'>
           Firstname: <input name='firstname' value='$firstname'><br>
           Lastname:  <input name='lastname'  value='$lastname' ><br>
           Nickname:  <input name='nick'      value='$nick'     ><br>
           E-Mail:    <input name='email'     value='$email'    ><br>
           Salary:    <input name='salary'    value='$salary'   ><br>";

   echo "  Department-ID: <select name='department_id'>\n
                            <option value=''></option>\n";

   $dquery = 'select * from department';
   $dresult = mysqli_query($conn,$dquery);
   while ($row = mysqli_fetch_array($dresult)){
     $dname = $row['dname'];
     $did   = $row['id'];

     echo                  "<option value='$did'>
                             $dname
                            </option>";
   }
   echo "                 </select><br>";
   echo "                 <input type='submit' value='Save'>
         </form>";
 } 
?>

</html>

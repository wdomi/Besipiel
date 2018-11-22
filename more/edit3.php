<html>
<head>
<title> Person</title>
</head>
<body>

<h1>Eine Person &auml;ndern</h1>
<?php
 //Datei mit den Variablen $benutzerwww, $passwortwww, $datenbank, $dbserver
 include('conf/config.php');

 $id            = mysqli_real_escape_string($connection,$_GET['id']);
 $firstname     = mysqli_real_escape_string($connection,$_GET['firstname']);
 $lastname      = mysqli_real_escape_string($connection,$_GET['lastname']);
 $nick          = mysqli_real_escape_string($connection,$_GET['nick']);
 $email         = mysqli_real_escape_string($connection,$_GET['email']);
 $salary        = mysqli_real_escape_string($connection,$_GET['salary']);
 $department_id = mysqli_real_escape_string($connection,$_GET['department_id']);
 $update        = mysqli_real_escape_string($connection,$_GET['update']);
 $php_self      = $_SERVER['PHP_SELF'];

 // Alle Felder ausser Salary und Department muessen zwingend gefuellt sein
 // Dies ist auch so in der Tabelle personnel
 if( $update and $firstname and $lastname and $nick and $email ){
   $query = "update personnel 
                set firstname     = '$firstname',
                    lastname      = '$lastname',
                    nick          = '$nick',
                    email         = '$email',
                    salary        = '$salary',
                    department_id = '$department_id'
              where id=$id";
   mysqli_query($connection,$query) or die ("Konnte query $query nicht ausfuehren.");

   echo "Thank you! This Information was entered:<br>
         Lastname:     $lastname<br>
         Firstname:    $firstname<br>
         Nickname:     $nick<br>
         E-Mail:       $email<br>
         Salary:       $salary<br>
         Department:   $dname<br>";
 }
 else{
   echo "<form action='$php_self' method='get'>
          Id: $id<br>  
            <input type='hidden' name='id'         value='$id'>  
          Firstname:      <input name='firstname'  value='$firstname'><br>
          Lastname:       <input name='lastname'   value='$lastname'> <br>
          Nickname:       <input name='nick'       value='$nick'>     <br>
          E-Mail:         <input name='email'      value='$email'>    <br>
          Salary:         <input name='salary'     value='$salary'>   <br>";

          echo "  Department-ID: <select name='department_id'>\n
                            <option value=''></option>\n";

   $dquery='select * from department';
   $dresult = mysqli_query($conn,$dquery) or die ("Konnte query $dquery nicht ausfuehren.");
   while ($row = mysqli_fetch_array($dresult)){
     $dname = $row['dname'];
     $did   = $row['id'];
     if ($did == $department_id){
       echo "<option value='$did' selected>
              $dname
             </option>";
     }
     else{
       echo "<option value='$did'>
              $dname
             </option>";
     }
   }
   echo "                 </select><br>";
   echo "                 <input type='submit' name='update' value='Update'>
         </form>"; 	 
 }
?>
</body>
</html>

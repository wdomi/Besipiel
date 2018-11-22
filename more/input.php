<h1>Eine neue Person aufnehmen</h1>
<?php
 include('conf/config.php');
 $firstname     = $_GET['firstname'];
 $lastname      = $_GET['lastname'];
 $nick          = $_GET['nick'];
 $email         = $_GET['email'];
 $salary        = $_GET['salary'];
 $php_self      = $_SERVER['PHP_SELF'];
 if($firstname!='' && $lastname!='' && $nick!='' and $email!=''){
   $query = "insert into personnel 
             (firstname, lastname, nick, email, salary) 
             values
             ('$firstname','$lastname','$nick','$email','$salary')";
   mysqli_query($conn,$query);

   echo "Thank you! This Information was entered:<br>
         Firstname:     $firstname<br>
         Lastname:      $lastname<br>
         Nickname:      $nick<br>
         E-Mail:        $email<br>
         Salary:        $salary<br>";
 } 
 else{
   echo "<form action='$php_self' method='get'>
           Firstname: <input name='firstname' value='$firstname'><br>
           Lastname:  <input name='lastname'  value='$lastname' ><br>
           Nickname:  <input name='nick'      value='$nick'     ><br>
           E-Mail:    <input name='email'     value='$email'    ><br>
           Salary:    <input name='salary'    value='$salary'   ><br>
                      <input type='submit'    value='Save'>
         </form>";
 } 
?>

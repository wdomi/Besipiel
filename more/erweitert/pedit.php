<html>
<h1>Eine Person &auml;ndern</h1>
<?php
 include('conf/config.php');

 $id            = $_GET['id'];
 $firstname     = $_GET['firstname'];
 $lastname      = $_GET['lastname'];
 $nick          = $_GET['nick'];
 $email         = $_GET['email'];
 $salary        = $_GET['salary'];
 $department_id = $_GET['department_id'];
 $update        = $_GET['update'];
 $php_self      = $_SERVER['PHP_SELF'];

 if( $update and $firstname and $lastname and $nick and $email ){
   $query = "update personnel 
                set firstname     = '$firstname',
                    lastname      = '$lastname',
                    nick          = '$nick',
                    email         = '$email',
                    salary        = '$salary',
                    department_id = '$department_id'
              where id=$id";
   mysqli_query($conn,$query) or die ("Konnte query $query nicht ausfuehren.");

   echo "Thank you! This Information was entered:<br>
         Lastname:     $lastname<br>
         Firstname:    $firstname<br>
         Nickname:     $nick<br>
         E-Mail:       $email<br>
         Salary:       $salary<br>
         Department:   $dname<br>";
 }
 else{
   // Werteliste-Options
   $dquery='select * from department';
   $dresult = mysqli_query($conn,$dquery);
   $options = "<option value=''></option>";
   while ($row = mysqli_fetch_array($dresult)){
     $dname = $row['dname'];
     $did   = $row['id'];
     if ($did == $department_id){
       $options="<option value='$did' selected>$dname</option>";
     }
     else{
       $options="<option value='$did'>$dname</option>";
     }
   }
   echo "<form action='$php_self' method='get'>
           Id: $id<br>  
             <input type='hidden' name='id'         value='$id'>  
           Firstname:      <input name='firstname'  value='$firstname'><br>
           Lastname:       <input name='lastname'   value='$lastname'> <br>
           Nickname:       <input name='nick'       value='$nick'>     <br>
           E-Mail:         <input name='email'      value='$email'>    <br>
           Salary:         <input name='salary'     value='$salary'>   <br>
           Department-ID:  <select name='department_id'>\n
                            $options
                           </select><br>
                           <input type='submit' name='update' value='Update'>
         </form>"; 	 
 }
?>
</html>

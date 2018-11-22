<h1>Eine neue Person aufnehmen</h1>
<?php
  include('conf/config.php');
  $firstname     = $_GET['firstname'];
  $lastname      = $_GET['lastname'];
  $nick          = $_GET['nick'];
  $email         = $_GET['email'];
  if ($_GET['salary']){
    $salary  = $_GET['salary'];
    $salaryf = $_GET['salary'];
  }
  else{
    $salary  = 'NULL';
    $salaryf = '';
  }
  if ($_GET['department_id']){
    $department_id  = $_GET['department_id'];
  }
  else{
    $department_id  = 'NULL';
  }
  $php_self      = $_SERVER['PHP_SELF'];

  if( $firstname!='' && $lastname!='' && $nick!='' && $email!='' ){
    $query = "insert into personnel 
              (firstname, lastname, nick, email, salary, department_id) 
              values
              ('$firstname','$lastname','$nick','$email',$salary,$department_id)";
    mysqli_query($conn,$query);

    echo "Thank you! This Information was entered:<br>
          Firstname:  $firstname<br>
          Lastname:   $lastname<br>
          Nickname:   $nick<br>
          E-Mail:     $email<br>
          Salary:     $salary<br>
          Department: $department_id<br>";
  } 
  else{
    $dquery  = 'select * from department';
    $dresult = mysqli_query($conn,$dquery);
    $options ="<option value=''></option>";
    while ($row = mysqli_fetch_array($dresult)){
      $dname = $row['dname'];
      $did   = $row['id'];
      $options = "$options
                  <option value='$did'>$dname</option>";
    }
    echo "<form action='$php_self' method='get'>
            Firstname:  <input name='firstname' value='$firstname'><br>
            Lastname:   <input name='lastname'  value='$lastname' ><br>
            Nickname:   <input name='nick'      value='$nick'     ><br>
            E-Mail:     <input name='email'     value='$email'    ><br>
            Salary:     <input name='salary'    value='$salaryf'   ><br>
            Department: <select name='department_id'>
                          $options
                        </select><br>
                        <input type='submit' value='Save'>
          </form>";
  }   
?>

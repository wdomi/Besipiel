<h1>Eine neue Person aufnehmen</h1>
<?php

//* 1) Execute CONNECTION to database server (create connection object)
include('conf/config.php');

if ($_GET) {
  $firstname = $_GET['firstname'];
  $lastname = $_GET['lastname'];
  $nick = $_GET['nick'];
  $email = $_GET['email'];
  $salary = $_GET['salary'];
} else {
  $firstname = '';
  $lastname = '';
  $nick = '';
  $email = '';
  $salary = '';
}
$php_self = $_SERVER['PHP_SELF'];
if ($firstname != '' && $lastname != '' && $nick != '' && $email != '') {
  $sql = "insert into personnel 
           (firstname, lastname, nick, email, salary) 
           values
           (:firstname,:lastname,:nick,:email,:salary)";

  //* 2) PREPARE QUERY (create query object)         
  $query = $conn->prepare($sql);

  $parameter = [
    'firstname' => "$firstname",
    'lastname' => "$lastname",
    'nick' => "$nick",
    'email' => "$email",
    'salary' => "$salary"
  ];

//* 3a) EXECUTE QUERY (also object)
  $query->execute($parameter);

  echo "Thank you! This Information was entered:<br>
         Firstname:     $firstname<br>
         Lastname:      $lastname<br>
         Nickname:      $nick<br>
         E-Mail:        $email<br>
         Salary:        $salary<br>";
} else {
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
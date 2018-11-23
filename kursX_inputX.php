<?php
  if ($_GET){
    $firstname = $_GET['firstname'];
    $lastname  = $_GET['lastname'];
    $nick      = $_GET['nick'];
    $email     = $_GET['email'];
    $salary    = $_GET['salary'];
  }
  else{
	$firstname = '';
    $lastname  = '';
    $nick      = '';
    $email     = '';
    $salary    = '';    
  }
  if (!empty($firstname)&&
      !empty($lastname) &&
	  !empty($nick)     &&
	  !empty($email)){
    $firstname = $_GET['firstname'];
    $lastname  = $_GET['lastname'];  
 	$nick      = $_GET['nick']; 
 	$email     = $_GET['email'];
  	$salary    = $_GET['salary'];  
    include('conf/config.php');
	$sql
	=
	"insert into personnel
	 (firstname,lastname,nick,email,salary)
	 values
	 (:firstname,:lastname,:nick,:email,:salary)";

    $query=$conn->prepare($sql);
    $parameter
    =
    ['firstname' => "$firstname",
     'lastname'  => "$lastname",
     'nick'      => "$nick",
     'email'     => "$email",
     'salary'    => "$salary"];	 
	 
	$query->execute($parameter);
	
    echo "Sie haben $firstname $lastname eingefügt";
  }
  else{
	echo "<form action='input.php' method='get'>
           Firstname: <input name='firstname' value='$firstname'><br>
           Lastname:  <input name='lastname'  value='$lastname'><br>
		   Nickname:  <input name='nick'      value='$nick'><br>
		   Email:     <input name='email'     value='$email'><br>
		   Salary:    <input name='salary'    value='$salary'><br>
             <input type='submit'>
          </form>";	  
  }	  
?>		   





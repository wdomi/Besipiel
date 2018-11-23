<?php

    $id 	   = $_GET['id'];
    $firstname = $_GET['firstname'];
    $lastname  = $_GET['lastname'];
    $nick      = $_GET['nick'];
    $email     = $_GET['email'];
    $salary    = $_GET['salary'];
	
	$update	   = $_GET['update'];

  if (!empty($firstname)&&
      !empty($lastname) &&
	  !empty($nick)     &&
	  !empty($email)	&&
	  !empty($update))	{
    include('conf/config.php');
	$sql
	=
	"update personnel
		set firstname=:firstname,
			lastname=:lastname,
			nick	=:nick,
			email	=:email,
			salary	=:salary
		where id=:id";

    $query=$conn->prepare($sql);
    $parameter
    =
	['id' 		 => "$id",
     'firstname' => "$firstname",
     'lastname'  => "$lastname",
     'nick'      => "$nick",
     'email'     => "$email",
     'salary'    => "$salary"];	 
	 
	$query->execute($parameter);
	
    echo "Sie haben $firstname $lastname geändert";
  }
  else{
	echo "<form action='editX.php' method='get'>
		   ID:		  $id<br>
           Firstname: <input name='firstname' value='$firstname'><br>
           Lastname:  <input name='lastname'  value='$lastname'><br>
		   Nickname:  <input name='nick'      value='$nick'><br>
		   Email:     <input name='email'     value='$email'><br>
		   Salary:    <input name='salary'    value='$salary'><br>
             <input type='submit'	name='update'	value='Update'>
			 <input type='hidden'	name='id'		value='$id'>
          </form>";	  
  }	  
?>		   









<?php

// Heading of table
echo "<table border='1'>	
      <tr>
	<th>Firstname</th>
	<th>Lastname</th>
        <th>Nickname</th>
	<th>Email</th>
	<th>Salary</th>
	<th>Options</th>
      </tr>";

// Fetch data from DB for all table rows
	//connection to DB, get all records, execute query
include('conf/config.php');
$query=$conn->prepare('select * from personnel');	
$query->execute();

if ( $query->errorCode() > 0 ){
  $fehler=$query->errorInfo();
  echo "$fehler[2]";
  exit;
}

while($row=$query->fetch()){
  $id		 = $row['id'];
  $firstname = $row['firstname'];
  $lastname  = $row['lastname'];
  $nick      = $row['nick'];
  $email     = $row['email'];
  $salary    = $row['salary'];
  echo "<tr>
         <td>$firstname</td>
         <td>$lastname</td>
		 <td>$nick</td>
		 <td>$email</td>
		 <td>$salary</td>
		 <td>
			 <a href='delete.php?id=$id'>
				delete
			 </a>
			 <a href='editX.php?id=$id".
					"&lastname=$lastname".
					"&firstname=$firstname".
					"&nick=$nick".
					"&email=$email".
					"&salary=$salary'>".
					"edit
			 </a> 
		 </td>
		</tr>";
		//die punkte dienen dazu, dass das URL keine Lücken enthält
}	
echo "</table>";	
?>


             <a href='edit1.php?id=$id".
              "&lastname=$lastname".
              "&firstname=$firstname".
              "&nick=$nick".
              "&email=$email".
              "&salary=$salary'>".
             "edit
             </a>
            </td>
          </tr>";

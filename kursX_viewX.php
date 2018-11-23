<?php
echo "<table border='1'>	
      <tr>
	<th>Firstname</th>
	<th>Lastname</th>
        <th>Nickname</th>
	<th>Email</th>
	<th>Salary</th>
      </tr>";

include('conf/config.php');
$query=$conn->prepare('select * from personnel');	
$query->execute();

if ( $query->errorCode() > 0 ){
  $fehler=$query->errorInfo();
  echo "$fehler[2]";
  exit;
}

while($row=$query->fetch()){
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
		</tr>";
}	
echo "</table>";	
?>

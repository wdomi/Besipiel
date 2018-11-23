

<?php
    include('conf/config.php');
/*    $php_self      = $_SERVER['PHP_SELF'];

    if ($_GET['id']){
      $did=$_GET['id'];
      $select_person = "select * from personnel where id=$did";
      $result_person = mysqli_query($conn,$select_person);
      $person = mysqli_fetch_array($result_person);
      $firstname = $person['firstname'];
      $lastname  = $person['lastname'];

      $delete_person="delete from personnel where id=$did";
      mysqli_query($conn,$delete_person);

      echo "$firstname $lastname wurde geloescht!<br><br>";
    }
*/

// defines query: assigns $variable to values of column "id" & says SQL instruction ($id becomes :id)

	if ($_GET['id']) {
		
		// $id=$_GET['id'];
		$did=$_GET['id'];
		$select_person = "select * from personnel where id=$did";
		$firstname = $person['firstname'];
		$lastname = $person['lastname'];
		
		//$sql="delete from personnel here id=:id";
		$delete_person="delete from personnel where id=$did";
		
		// output on webpage
		echo "Die Person $firstname $lastname wurde geloescht";
	}


		
// prepare and execute query
$query=$conn->prepare($sql);
$query->execute(['id' => $id]);

// output on webpage
echo "Die Person wurde geloescht";

?>



<?php
// Heading of table
echo "<table border='1'>	
      <tr>
	<th>Firstname</th>
	<th>Lastname</th>
        <th>Nickname</th>
	<th>Email</th>
	<th>Salary</th>
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
		 <td><a href='zadelete.php?id=$id'> delete </td>
		</tr>";
}	
echo "</table>";	
?>

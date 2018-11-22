<h1>Personen anzeigen</h1>
<table border=1>
  <tr>
    <th>Lastname</th>
    <th>Firstname</th>
    <th>Nickname</th>
    <th>E-Mail</th>
    <th>Salary</th>
    <th>Options</th>
  </tr>
<?php 
  include("conf/config.php");
  $query = "select * from personnel";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($result)) {
    $id        = $row['id'];
    $lastname  = $row['lastname'];
    $firstname = $row['firstname'];
    $email     = $row['email'];
    $nick      = $row['nick'];
    $salary    = $row['salary'];
    echo "<tr>
            <td>$lastname</td>
            <td>$firstname</td>
            <td>$nick</td>
            <td>$email</td>
            <td>$salary</td>
            <td>
              <a href='delete.php?id=$id'>delete</a>
            </td>
          </tr>";
  }
?>
</table>

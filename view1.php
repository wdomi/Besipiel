<h1>Personen anzeigen</h1>
<table border=1>
  <tr>
    <th>Lastname</th>
    <th>Firstname</th>
    <th>Nickname</th>
    <th>E-Mail</th>
    <th>Salary</th>
  </tr>
<?php
  include("conf/config.php");
  $query=$conn->prepare('select * from personnel');
  $query->execute();

  while ($row = $query->fetch()) {
    $lastname  = $row['lastname'];
    $firstname = $row['firstname'];
    $nick      = $row['nick'];
    $email     = $row['email'];
    $salary    = $row['salary'];
    echo "<tr>
            <td>$lastname</td>
            <td>$firstname</td>
            <td>$nick</td>
            <td>$email</td>
            <td>$salary</td>
          </tr>";
  }
?>
</table>

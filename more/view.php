<h1>Personen anzeigen</h1>
<form action='view.php' method='get'>
 Person suchen: <input name='searchstring'>
                <input type='submit' name='suchen' value='Suchen'>
</form>
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
  include('conf/config.php');
  $searchstring=$_GET['searchstring'];
  $query = "select * from personnel
             where lastname  like '%$searchstring%'
                or firstname like '%$searchstring%'
                or nick      like '%$searchstring%'
                or email     like '%$searchstring%'
                or salary    like '%$searchstring%'";

  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($result)){
    $id        = $row['id'];  
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
            <td>
              <a href='delete.php?id=$id'>delete</a>
              <a href='edit.php?".
                  "id=$id".
                  "&lastname=$lastname".
                  "&firstname=$firstname".
                  "&nick=$nick".
                  "&email=$email".
                  "&salary=$salary'>".
                  "edit</a>
            </td>
          </tr>";
  }
?>
</table>

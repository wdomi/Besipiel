<html>
  <h1>Alle Personen anzeigen</h1>
 
  <?php
    include('conf/config.php');
    $php_self      = $_SERVER['PHP_SELF'];

    if ($_GET['id']){
      $did=$_GET['id'];
      $select_person = "select * from personnel where id=$did";
      $result_person = mysqli_query($conn,$select_person);
      $person = mysqli_fetch_array($result_person);
      $firstname = $person['firstname'];
      $lastname  = $person['lastname'];

      $delete_person="delete from personnel where id=$did";
      mysqli_query($conn,$delete_person);

      echo "$firstname $lastname wurde gel&ouml;scht!<br><br>";
    }
    $query='select * from personnel';
    $result = mysqli_query($conn,$query);
  ?>

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
    while ($row = mysqli_fetch_array($result)){
      $id            = $row['id'];
      $lastname      = $row['lastname'];
      $firstname     = $row['firstname'];
      $email         = $row['email'];
      $nick          = $row['nick'];
      $salary        = $row['salary'];
      echo "<tr>
              <td>$lastname</td>
              <td>$firstname</td>
              <td>$nick</td>
              <td>$email</td>
              <td>$salary</td>
              <td>
                <a href='$php_self?id=$id&firstname=$firstname'>delete</a>
              </td>
            </tr>";
    }
  ?>

  </table>
</html>

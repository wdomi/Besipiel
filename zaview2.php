<html>
  <h1>Alle Personen anzeigen</h1>

  <?php
    include('conf/config.php');
    $php_self      = $_SERVER['PHP_SELF'];

    if ($_GET['id']){
      $did=$_GET['id'];
      $sql_person = "select * from personnel where id=:id";
      $select_person = $conn->prepare($sql_person);
      $select_person->execute(['id' => $did]);
      $person = $select_person->fetch();
      $firstname = $person['firstname'];
      $lastname  = $person['lastname'];

      $delete = "delete from personnel where id=:id";
      $delete_person = $conn->prepare($delete);
      $delete_person->execute(['id' => $did]);
      echo "$firstname $lastname wurde gel&ouml;scht!<br><br>";
    }

    $sql = 'select * from personnel';
    $query = $conn->prepare($sql);
    $query->execute();
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
    while ($row = $query->fetch()){
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
                <a href='$php_self?id=$id'>delete</a>
              </td>
            </tr>";
    }
  ?>

  </table>
</html>



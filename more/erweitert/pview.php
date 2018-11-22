<html>
<h1>Personen anzeigen</h1>
  <table border=1>
    <tr>
      <th>Lastname</th>
      <th>Firstname</th>
      <th>Nickname</th>
      <th>E-Mail</th>
      <th>Salary</th>
      <th>Department</th>
      <th>Options</th>
    </tr>
 
  <?php
    include('conf/config.php');
    $query = "select p.id,
                     d.dname,
                     p.firstname,
                     p.lastname,
                     p.nick,
                     p.email,
                     p.salary,
                     p.department_id
                from personnel p
           left join department d
                  on p.department_id = d.id";

    $result = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_array($result)){
      $id            = $row['id'];  
      $lastname      = $row['lastname'];
      $firstname     = $row['firstname'];
      $nick          = $row['nick'];
      $email         = $row['email'];
      $salary        = $row['salary'];
      $department_id = $row['department_id'];
      $dname         = $row['dname'];
      echo "<tr>
              <td>$lastname</td>
              <td>$firstname</td>
              <td>$nick</td>
              <td>$email</td>
              <td>$salary</td>
              <td>$dname</td>
              <td>
               <a href='delete.php?id=$id'>delete</a>
               <a href='pedit.php?".
                  "id=$id".
                  "&lastname=$lastname".
                  "&firstname=$firstname".
                  "&nick=$nick".
                  "&email=$email".
                  "&salary=$salary".
                  "&department_id=$department_id'>".
                  "edit</a>
              </td>
            </tr>";
    }
  ?>
  </table>
</html>

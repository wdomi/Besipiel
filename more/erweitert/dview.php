<h1>Departments anzeigen</h1>
<table border=1>
  <tr>
    <th>Department-Name</th>
    <th>Street</th>
    <th>Options</th>
  </tr>

<?php
  include('conf/config.php');
  $query = "select * from department";
  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($result)){
    $id     = $row['id'];
    $dname  = $row['dname'];
    $street = $row['street'];
    echo "<tr>
           <td>$dname</td>
           <td>$street</td>
           <td>
             <a href='ddelete.php?id=$id'>delete</a>
             <a href='dedit.php?".
                     "id=$id".
                     "&dname=$dname".
                     "&street=$street'>".
                     "edit</a>
           </td>
          </tr>";
  }
?>
</table>

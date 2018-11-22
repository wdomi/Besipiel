  <?php
    include('conf/config.php');
    $id=$_GET['id'];
    $pquery="select count(*) as anz from personnel where department_id=$id";
    $presult=mysqli_query($conn,$pquery);
    $row=mysqli_fetch_array($presult);
    $anz=$row['anz'];
    if ($anz > 0){
      echo "Das Department konnte nicht geloescht werden, da es noch Mitarbeiter drin gibt!"; 
    }
    else{
      $query="delete from department 
                    where id=$id";
      mysqli_query($conn,$query) or die('warum nicht '.mysqli_error($conn));
      echo 'Das Department wurde geloescht!';
    }
  ?>

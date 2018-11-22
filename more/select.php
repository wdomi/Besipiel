
Department-ID: <select name='department'>\n";

<?php
      include('conf/config.php');
      $dquery = 'select * from department';
      $dresult = mysqli_query($connection,$dquery);
      while ($row = mysqli_fetch_array($dresult)){
        $dname = $row['dname'];
        $did   = $row['id'];
        echo     "<option value='$did'>$dname</option>\n";
   }
?>
               </select>

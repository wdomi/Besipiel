<h1>Ein neues Department aufnehmen</h1>
<?php
  include('conf/config.php');
  $dname=$_GET['dname'];
  $street=$_GET['street'];
  $php_self=$_SERVER['PHP_SELF'];
 
  if($dname and $street){
    $query = "insert into department
              (dname, street)
              values
              ('$dname','$street')";
    mysqli_query($conn,$query);

    echo "Thank you! This Information was entered:<br>
          Name: $dname<br>
          Street: $street<br>";

  }
  else{
    echo "<form action='$php_self' method='get'>
            Name:   <input name='dname'  value='$dname'><br>
            Street: <input name='street' value='$street' ><br>
                    <input type='submit' value='Save'>
          </form>";
  }
?>

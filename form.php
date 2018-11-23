<?php
  $vorname  = $_GET['vorname'];
  $nachname = $_GET['nachname'];
  if ($vorname!='' && $nachname!=''){
    echo "Sie heissen $vorname $nachname!";
  }
  else {
    echo "<form action='form.php' method='get'>
            Vorname: <input name='vorname'>
           Nachname: <input name='nachname'>
              <input type='submit'>
          </form>";
  }
?>

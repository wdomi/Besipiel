<?php
 include('conf/config.php');
 $firstname     = $_GET['firstname'];
 $lastname      = $_GET['lastname'];
 $nick          = $_GET['nick'];
 $email         = $_GET['email'];
 $salary        = $_GET['salary'];
 $save          = $_GET['save'];
 $php_self      = $_SERVER['PHP_SELF'];

 if( $firstname and $lastname and $nick and $email ){
   $sql="insert into personnel 
         (firstname, lastname, nick, email, salary) 
         values
         (:firstname,:lastname,:nick,:email,:salary)";
   $query=$conn->prepare($sql);
   $parameter=['firstname' => $firstname,
               'lastname'  => $lastname,
               'nick'      => $nick,
               'email'     => $email,
               'salary'    => $salary];
   $query->execute($parameter);
   // Die eben an die eingefügte Person vergebene ID wird hier ausgegeben
   $id=$conn->lastInsertId();

   // Dann wird kontrolliert, ob der Insert wirklich funktioniert hat!
   if ( $id ){
     $select="select * from personnel where id=:id";
     $squery=$conn->prepare($select);
     $squery->execute(['id' => $id]);
     $row=$squery->fetch();
     echo "Thank you! This Information was entered:<br>
           id:            $id<br>
           Firstname:     $row[firstname]<br>
           Lastname:      $row[lastname]<br>
           Nickname:      $row[nick]<br>
           E-Mail:        $row[email]<br>
           Salary:        $row[salary]<br>";
   }
   else{
     echo "Die abgeschickten Daten konnten nicht in die Datenbank eingfuegt werden!";
   }
 }
 else{
   if ($save){
     echo "Folgende obligorischen Felder waren leer: ";
     if ( ! $firstname ){ $leere_felder="Firstname"; }
     if ( ! $lastname ) { $leere_felder="$leere_felder Lastname"; }
     if ( ! $nick )     { $leere_felder="$leere_felder Nickname"; }
     if ( ! $email )    { $leere_felder="$leere_felder Email"; }
     echo "$leere_felder<br>";
     echo "Bitte fuellen Sie diese aus und schicken Sie das Formular nochmals ab!<br><br>";
   }

   echo "<form action='$php_self' method='get'>
           Firstname: <input name='firstname' value='$firstname'><br>
           Lastname:  <input name='lastname'  value='$lastname' ><br>
           Nickname:  <input name='nick'      value='$nick'     ><br>
           E-Mail:    <input name='email'     value='$email'    ><br>
           Salary:    <input name='salary'    value='$salary'   ><br>
                      <input name='save'      value='Save' type='submit'>
         </form>";
 }
?>









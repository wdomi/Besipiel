<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head profile="http://www.acme.com/profiles/core http://dublincore.org/documents/dcq-html/"><link href="http://purl.org/dc/elements/1.1/" rel="schema.DC" /><link href="http://purl.org/dc/terms/" rel="schema.DCTERMS" />
<title>UZH - Zentrale&nbsp;Informatik - Willkommen im Nachbau</title>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />

<link href="http://www.id.uzh.ch/cl/includes/uzh.css" type="text/css" rel="stylesheet" />
<!-- <link href="/ssi_idcl/publication.css" type="text/css" rel="stylesheet" /> -->
</head>

<body>

<?php
  include("./nachbau.html");
  include("./navspalteneu.html");
?>

<div class="contentarea">
<a class="namedanchor" name="content"><!----></a>
<div class="content">

<h1>Eine neue Person aufnehmen</h1>
<?php
 include('conf/config.php');
 $firstname     = $_GET['firstname'];
 $lastname      = $_GET['lastname'];
 $nick          = $_GET['nick'];
 $email         = $_GET['email'];
 $salary        = $_GET['salary'];
 $department_id = $_GET['department_id'];
 $php_self      = $_SERVER['PHP_SELF'];

 if( $firstname and $lastname and $nick and $email ){
   $query = "insert into personnel 
             (firstname, lastname, nick, email, salary, department_id) 
             values
             ('$firstname','$lastname','$nick','$email','$salary','$department_id')";
   mysqli_query($conn,$query);

   echo "Thank you! This Information was entered:<br>
         Firstname:     $firstname<br>
         Lastname:      $lastname<br>
         Nickname:      $nick<br>
         E-Mail:        $email<br>
         Salary:        $salary<br>
         Department-ID: $department_id<br>";
 } 
 else{
   $dquery = 'select * from department';
   $dresult = mysqli_query($conn,$dquery);
   $options="<option value=''></option>";
   while ($row = mysqli_fetch_array($dresult)){
     $dname = $row['dname'];
     $did   = $row['id'];
     $options="$options
               <option value='$did'>$dname</option>";
   }
   echo "<form action='$php_self' method='get'>
          <table>
            <tr><td>Firstname:  </td><td><input name='firstname' value='$firstname'></td></tr>
            <tr><td>Lastname:   </td><td><input name='lastname'  value='$lastname' ></td></tr>
            <tr><td>Nickname:   </td><td><input name='nick'      value='$nick'     ></td></tr>
            <tr><td>E-Mail:     </td><td><input name='email'     value='$email'    ></td></tr>
            <tr><td>Salary:     </td><td><input name='salary'    value='$salary'   ></td></tr>
            <tr><td>Department: </td><td><select name='department_id'>
                                           $options
                                         </select></td></tr>
            <tr><td><input type='submit' value='Save'></td><td></td></tr>
          </table>
         </form>";
 } 
?>

</div>
</div>

<?php
      include("./footer.html");
?>
 
</div> 
</div></div>
</body></html>

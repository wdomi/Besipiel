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

<h1>Eine Person &auml;ndern</h1>
<?php
 include('conf/config.php');

 $id            = $_GET['id'];
 $firstname     = $_GET['firstname'];
 $lastname      = $_GET['lastname'];
 $nick          = $_GET['nick'];
 $email         = $_GET['email'];
 $salary        = $_GET['salary'];
 $department_id = $_GET['department_id'];
 $update        = $_GET['update'];
 $php_self      = $_SERVER['PHP_SELF'];

 if( $update and $firstname and $lastname and $nick and $email ){
   $query = "update personnel 
                set firstname     = '$firstname',
                    lastname      = '$lastname',
                    nick          = '$nick',
                    email         = '$email',
                    salary        = '$salary',
                    department_id = '$department_id'
              where id=$id";
   mysqli_query($conn,$query) or die ("Konnte query $query nicht ausfuehren.");

   echo "Thank you! This Information was entered:<br>
         Lastname:     $lastname<br>
         Firstname:    $firstname<br>
         Nickname:     $nick<br>
         E-Mail:       $email<br>
         Salary:       $salary<br>
         Department:   $dname<br>";
 }
 else{
   // Werteliste-Options
   $dquery='select * from department';
   $dresult = mysqli_query($conn,$dquery);
   $options = "<option value=''></option>";
   while ($row = mysqli_fetch_array($dresult)){
     $dname = $row['dname'];
     $did   = $row['id'];
     if ($did == $department_id){
       $options="$options<option value='$did' selected>$dname</option>";
     }
     else{
       $options="$options<option value='$did'>$dname</option>";
     }
   }
   echo "<form action='$php_self' method='get'>
           Id: $id<br>  
             <input type='hidden' name='id'         value='$id'>  
           Firstname:      <input name='firstname'  value='$firstname'><br>
           Lastname:       <input name='lastname'   value='$lastname'> <br>
           Nickname:       <input name='nick'       value='$nick'>     <br>
           E-Mail:         <input name='email'      value='$email'>    <br>
           Salary:         <input name='salary'     value='$salary'>   <br>
           Department-ID:  <select name='department_id'>\n
                            $options
                           </select><br>
                           <input type='submit' name='update' value='Update'>
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

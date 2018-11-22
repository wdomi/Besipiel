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

<h1>Ein Department &auml;ndern</h1>
<?php
 //Datei mit den Variablen $benutzerwww, $passwortwww, $datenbank, $dbserver
 include('conf/config.php');
 $update   = $_GET['update'];
 $dname    = $_GET['dname'];
 $street   = $_GET['street'];
 $id       = $_GET['id'];
 $php_self = $_SERVER['PHP_SELF'];
 // Dies ist auch so in der Tabelle department
 if($update and $dname and $street){
   $conn = mysqli_connect($dbserver,
                          $benutzerwww,
                          $passwortwww,
                          $datenbank);
   $query = "update department
                set dname   ='$dname',
                    street  ='$street'
              where id=$id";
   mysqli_query($conn,$query) or die ("Konnte query $query nicht ausfuehren.");

   echo "Thank you! This Information was entered:<br>
         dname:  $dname<br>
         street: $street<br>";
 }
 else{
   echo "<form action='$php_self' method='get'>
                   <input type='hidden' name='id' value='$id'>
          <table>
           <tr><td>Department:</td><td>  <input name='dname' value='$dname'>  </td></tr>
           <tr><td>Street:    </td><td><input name='street'  value='$street'> </td></tr>
           <tr><td><input type='submit' name='update' value='Update'></td><td></td></tr>
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

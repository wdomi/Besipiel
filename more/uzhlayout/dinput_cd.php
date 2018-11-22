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


<h1>Ein neues Department aufnehmen</h1>
<?php
  include('conf/config.php');
  $dname    = $_GET['dname'];
  $street   = $_GET['street'];
  $php_self = $_SERVER['PHP_SELF'];

  if($dname!='' && $street!=''){
    $query = "insert into department
              (dname, street)
              values
              ('$dname','$street')";
    mysqli_query($conn,$query);

    echo "Thank you! This Information was entered:<br>
          Name:   $dname<br>
          Street: $street<br>";
  }
  else{
    echo "<form action='$php_self' method='get'>
           <table>
            <tr><td>Name:  </td><td><input name='dname'  value='$dname'> </td></tr>
            <tr><td>Street:</td><td><input name='street' value='$street'></td></tr>
            <tr><td><input type='submit' value='Save'> </td><td>         </td></tr>
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

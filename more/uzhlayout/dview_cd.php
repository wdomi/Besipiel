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

<h1>Departments anzeigen</h1>
  <table class='grid' border=1>
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
                        <a href='dedit_cd.php?".
                           "id=$id".
                           "&dname=$dname".
                           "&street=$street'>".
                           "edit</a>
             </td>
            </tr>";
    }
  ?>
  </table>

</div>
</div>

<?php
  include("./footer.html");
?>
 
</div> 
</div></div>
</body></html>

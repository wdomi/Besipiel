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

<h1>Personen anzeigen</h1>
<table class='grid'>
  <tr>
    <th>Lastname</th>
    <th>Firstname</th>
    <th>Nickname</th>
    <th>E-Mail</th>
    <th>Salary</th>
    <th>Department</th>
    <th>Options</th>
  </tr>
 
<?php
  include('conf/config.php');
  $query = "select p.id,
                   d.dname,
                   p.firstname,
                   p.lastname,
                   p.nick,
                   p.email,
                   p.salary,
                   p.department_id
              from personnel p
         left join department d
                on p.department_id = d.id";

  $result = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_array($result)){
    $id            = $row['id'];  
    $lastname      = $row['lastname'];
    $firstname     = $row['firstname'];
    $nick          = $row['nick'];
    $email         = $row['email'];
    $salary        = $row['salary'];
    $department_id = $row['department_id'];
    $dname         = $row['dname'];
    echo "<tr>
            <td>$lastname</td>
            <td>$firstname</td>
            <td>$nick</td>
            <td>$email</td>
            <td>$salary</td>
            <td>$dname</td>
            <td>
              <a href='delete.php?id=$id'>delete</a>
              <a href='pedit_cd.php?".
                  "id=$id".
                  "&lastname=$lastname".
                  "&firstname=$firstname".
                  "&nick=$nick".
                  "&email=$email".
                  "&salary=$salary".
                  "&department_id=$department_id'>".
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

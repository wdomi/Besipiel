<!DOCTYPE html>

<!-- cd /Users/domiadmin/.bitnami/stackman/machines/xampp/volumes/root/htdocs/beispiele -->
<!-- git pull https://github.com/wdomi/Besipiel.git -->
<!-- git push --set-upstream https://github.com/wdomi/Besipiel.git master -->

<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>PHP & MySQL Kursbeispiel</title>

    <style type="text/css">
        body {
            background-color: white;
            color: black;
            margin: 10px;
            padding: 25px;
        }

        p {
            font-family: sans-serif;
            font-size: 14px;
            line-height: 14px;
            color: black;
        }
    </style>

  </head>

  <body>

    <h1>Personen anzeigen</h1>

    <form action='view.php' method='get'>
        Person suchen: <input name='searchstring'>
        <input type='submit' name='suchen' value='Suchen'>
    </form>

    <hr> <!-- --------------- this is a line ----------------------- -->

    <p>
      <h1>Personen anzeigen</h1>
      <table border=1>
        <tr>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Nickname</th>
            <th>E-Mail</th>
            <th>Salary</th>
        </tr>
          
        <?php
          //* 1) Execute CONNECTION to database server (create connection object)
          include("conf/config.php");
          //* 2) PREPARE QUERY (create query object)
          $query = $conn->prepare('select * from personnel');
          //* 3a) EXECUTE QUERY (also object)
          $query->execute();

          //* 3b) GET & SHOW RESULT
          while ($row = $query->fetch()) {    // This is an associative array, keys=fieldnames
            $lastname = $row['lastname'];
            $firstname = $row['firstname'];
            $nick = $row['nick'];
            $email = $row['email'];
            $salary = $row['salary'];
            echo "<tr>
                    <td>$lastname</td>
                    <td>$firstname</td>
                    <td>$nick</td>
                    <td>$email</td>
                    <td>$salary</td>
                  </tr>";
          }
        ?>
      </table>
    </p>
  </body>

</html>
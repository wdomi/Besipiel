<?php

//° ---------- connection to database and query as PHP-script ----------

ini_set("display_errors", 1); // this is just so you can see the error while developing, take it off when it goes for real!


//* 1) Execute CONNECTION to database server (create connection object)
include('conf/config.php');
            
//* 2) PREPARE QUERY (create query object)
$query = $conn->prepare('select * from personnel where firstname = :firstname'); // query in SQL language

//* 3a) EXECUTE QUERY (also object)
$query->execute(['firstname' => 'Daniele']);

// ALLERT error SQL, gives the kind of error in case SQL syntax not correct
if ($query->errorCode() > 0) {
    $fehler = $query->errorInfo();
    echo "$fehler[2]";
    exit;
}

//* 3a) GET DATA/RESULT (row by row)
// $row = $query->fetch();
// Data gets taken from table and put in form to associative array by php

//* 4a) SHOQ DATA
//var_dump($row);
// echo '<br><br><br>';

//* 3b) GET & SHOW RESULT

while ($row = $query->fetch()) {			// This is an associative array, keys=fieldnames
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $nick = $row['nick'];
    $email = $row['email'];
    $salary = $row['salary'];
    echo "$firstname<br>
        $lastname<br>
        $nick<br>
        $email<br>
        $salary<br><br>";
}

?>
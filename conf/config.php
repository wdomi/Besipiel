<?php
/*
try {
$conn = new PDO( "mysql:host=localhost;
                  dbname=mykurs21",
                  "mykurs21",
                  "mKiiS6");
} 

// ALLERT error connection (try{} and catch{})
catch(PDOException $e) {
  echo "Verbindungsfehler: "
       .$e->getMessage();
  exit;
} 

// Localhost is http://idkurs.uzh.ch/~kurs21
 */

try {
  $conn = new PDO(
    "mysql:host=localhost;
                    dbname=mykurs",
    "root",
    ""
  );
} catch (PDOException $e) {
  echo "Connection error: "
    . $e->getMessage();
  exit;
}

?>
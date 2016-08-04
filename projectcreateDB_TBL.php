
<?php
require_once 'projectlogin.php';  // Contains our mysql login credentials
echo "login params: hostname = " . $hn . "; username = " . $un . "; password = ******* " . "; db name = " .$db;

// Create connection

$conn = new mysqli($hn, $un, $pw);




// Check connection

 if ($conn->connect_error) {
     echo "<br/>";
     die("Die - Connection failed: " . $conn->connect_error);

}

$sql = "DROP DATABASE " . $db ;
echo "<br/>";
echo "Drop db sql: " . $sql;
if ($conn->query($sql) === TRUE) {
     echo "<br/>";
     echo "Database dropped successfully";
}   else {
     echo "<br/>";
     die("Die - Drop DB failed: " . $conn->error);
}

// Create database

$sql = "CREATE DATABASE " . $db ;
echo "<br/>";
echo "Create db sql: " . $sql;
if ($conn->query($sql) === TRUE) {
     echo "<br/>";
     echo "Database created successfully";
}   else {
     echo "<br/>";
     die("Die - Create DB failed: " . $conn->error);
}


// Close connection then reopen with $db
$conn->close();
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
   echo "<br/>";
   die("Connection with db failed: " . $conn->connect_error);
}  else {
     echo "<br/>";
     echo "Connection with db: $db succeeded";
}


$sql = "CREATE TABLE project (" .
 "id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, " .
 "Firstname VARCHAR(30) NOT NULL, " .
 "Lastname VARCHAR(30) NOT NULL, " .
 "Gender VARCHAR(20) NOT NULL, " .
 "Email VARCHAR(50) NOT NULL, " .
 "League VARCHAR(20), " .
 "Tel INT(20), " .
 "Photo LONGBLOB )" ;
 

echo "<br/>";
echo "sql for create table: " . $sql;

if ($conn->query($sql) === TRUE) {
    echo "<br/>";
    echo "Table created successfully";

} else {
    echo "<br/>";
    echo "Error creating table: " . $conn->error;

}




echo "<br/>";
echo "Connected successfully";

 ?>

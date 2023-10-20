<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ictbs507";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
try{
// prepare and bind
if($stmt = $conn->prepare("INSERT INTO Authors (firstname, lastname, address) VALUES (?, ?, ?)"))
{
  $stmt->bind_param("sss", $firstname, $lastname, $address);

// set parameters and execute


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$stmt->execute();
echo "New records created successfully";
}
else echo("Statement failed: ". $stmt->error . "<br>");

$stmt->close();
$conn->close();
} catch (Exception $e) {
echo"Error occurred ". $e->getMessage() ."<br>";
}
?>
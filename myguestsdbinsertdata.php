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

// prepare and bind
if($stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)"))
{
  $stmt->bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$stmt->execute();
echo "New records created successfully";
}
else echo("Statement failed: ". $stmt->error . "<br>");

$stmt->close();
$conn->close();
?>
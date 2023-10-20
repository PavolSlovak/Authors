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
try {
  // prepare and bind
  if ($stmt = $conn->prepare("INSERT INTO Articles ( author_id, article_name, content) VALUES (?, ?, ?)")) {
    $stmt->bind_param("sss", $author_id, $article_name, $content);

    // set parameters and execute


    $author_id = $_POST['author_id'];
    $article_name = $_POST['article_name'];
    $content = $_POST['content'];
    $stmt->execute();
    //echo "New records created successfully";
    echo $response == 0;
  }
  //else echo("Statement failed: ". $stmt->error . "<br>");
  else
    echo $response == 1;

  $stmt->close();
  $conn->close();
}
catch(Exception $e){

  echo 'Error Occured: '. $e->getMessage();
}
?>
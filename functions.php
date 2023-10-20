<?php 
require_once 'authorsdb.php';


if(isset($_POST["action"])){
    
    if($_POST["action"]=="delete"){
    delete();
    }
    if($_POST["action"]=="update"){
      update();
      }
    }


    
function display_data(){
global $conn;
$sql = "SELECT id, firstname, lastname, address FROM Authors";
$result = $conn->query($sql);
return $result;
}

function display_article($AuthorId){
  global $conn;
  $sql = "SELECT id, article_name, content FROM Articles WHERE author_id = $AuthorId";
  
  $article = mysqli_query($conn, $sql);
  return $article;
}

 function delete(){
    global $conn;
  
    $id = $_POST["id"];
  
    mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Articles WHERE author_id = $id"));

    mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Authors WHERE id = $id"));
    
    
    // First I'm deleting author's articles
    $res1 =  mysqli_query($conn, "DELETE FROM Articles WHERE author_id = $id");
    // Second I'm deleting the author
    $res =  mysqli_query($conn, "DELETE FROM Authors WHERE id = $id");
    
    if($res && $res1){
    echo 1;
    }

  }

  function update(){
    global $conn;

if(isset($_POST['address'])){

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$id = $_POST['id'];

// query to update data 


$res = mysqli_query($conn, "UPDATE Authors SET firstname='$firstname', lastname='$lastname', address='$address' WHERE id='$id'");

if($res){

  echo 1;
}

  }  

  }

?>
<?php 
require_once 'myguestsdb.php';


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
$sql = "SELECT id, firstname, lastname, email FROM MyGuests";
$result = $conn->query($sql);
return $result;
}

 function delete(){
    global $conn;
  
    $id = $_POST["id"];
  
    $rows = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM MyGuests WHERE id = $id"));
  
  
    $res =  mysqli_query($conn, "DELETE FROM MyGuests WHERE id = $id");
    
    if($res){
    echo 1;
    }

  }

  function update(){
if(isset($_POST['email'])){

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$id = $_POST['id'];

// query to update data 


$res = mysqli_query($conn, "UPDATE MyGuests SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id='$id'");

if($res){

  echo 1;
}

  }  

  }
?>
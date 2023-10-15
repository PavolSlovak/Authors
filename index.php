<?php

// require_once('myguestsdb.php');
// $sql = "SELECT id, firstname, lastname, email FROM MyGuests";
// $result = $conn->query($sql);

include 'myguestsdb.php';

include 'functions.php';


?>

<!DOCTYPE html>
<html>
<head>
    <title>My Guests</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
     <!-- jQuery -->
     <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
  </head>
<body>
<div class='container'> 




<!-- Modal Edit -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="frmContact" method="post" action="myguestsdbupdate_1.php">

      <div class="modal-body">

  <label for="firstname">First name:</label><br>
  <input type="text" id="firstname" class="form-control"><br>
  <label for="lastname">Last name:</label><br>
  <input type="text" id="lastname" class="form-control"><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" class="form-control"><br>
  <input type="hidden" id="userid" class="form-control">
  
  <div class="modal-footer">
    
    <a href="#" id="save" class="btn btn-primary" >Save changes</a>
    <button class="btn btn-secondary translate-middle" data-dismiss="modal">Close</button>
      </div>
</div>
      
      </form>       

    </div>
  </div>
</div>



<h2>Add guests</h2>

<form name="frmContact" method="post" action="myguestsdbinsertdata.php">
  <label for="firstname">First name:</label><br>
  <input type="text" id="firstname" name="firstname"><br>
  <label for="lastname">Last name:</label><br>
  <input type="text" id="lastname" name="lastname"><br><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email"><br><br>
  <input type="submit" value="Submit">
</form> 
 

<table class="table table-bordered text-center">
<tr class="bg-dark text-white">
      <td>Guest ID</td>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Email</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>
    <tr>
<tr>
<?php

$result = display_data();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {

?>
    <tr id="<?php echo $row['id']?>">

      <td><?php echo $row['id'] ?></td>
      <td data-target ="firstname"><?php echo $row['firstname'] ?></td>
      <td data-target ="lastname"><?php echo $row['lastname'] ?></td>
      <td data-target ="email"><?php echo $row['email'] ?></td>
            
<!-- Button trigger modal -->
      <td> <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-role="update" data-id="<?php echo $row['id']; ?>" >Update</a> </td>
      <td> <a href="#" type="button" class='btn btn-danger'  onclick = "deletedata(<?php echo $row['id']; ?>);">Delete</a> </td>
    </tr>
    <?php
    } 
  }
  else {
    echo "0 results";
  }
  $conn->close();
?>
</table>

</div>

<script>
      // Function
      function deletedata(id){
        $(document).ready(function(){
          $.ajax({
            // Action
            url: 'functions.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id: id,
              action: "delete"
            },
            success:function(response){
              // Response is the output of action file
              if(response == 1){
                console.log("Data Deleted Successfully");
                document.getElementById(id).style.display = "none";
              }
              else if(response == 0){
                console.log("Data Cannot Be Deleted", msg);
              }
            }
          });
        });
      }
    </script>



<script> // Update Guest Record 

$(document).ready(function(){

  // append values in input fields
$(document).on('click', 'a[data-role=update]', function(){
/* alert($(this).data('id')) */
var id = $(this).data('id');
var firstname = $('#'+id).children('td[data-target=firstname]').text();
var lastname = $('#'+id).children('td[data-target=lastname]').text();
var email = $('#'+id).children('td[data-target=email]').text();


// I'll insert those values into modal input fields and toggle modal

$('#firstname').val(firstname);
$('#lastname').val(lastname);
$('#email').val(email);
$('#userid').val(id);
$('#myModal').modal('toggle');

});

// now create event to get data from fields and update in DB

$('#save').click(function(){
var id = $('#userid').val()
var firstname = $('#firstname').val()
var lastname = $('#lastname').val()
var email = $('#email').val()

$.ajax({

  url      :'functions.php',
  method   : 'post',
  data:    {firstname:firstname, lastname:lastname,email:email, id:id, action: "delete"},
  success: function(response){
        // now update information in the guests table
        $('#'+id).children('td[data-target=firstname]').text(firstname);
        $('#'+id).children('td[data-target=lastname]').text(lastname);
        $('#'+id).children('td[data-target=email]').text(email);
        $('#myModal').modal('toggle');

        if(response == 1){
          console.log("Your record was successfully updated");
              }
              else if(response == 0){
                console.log("Data Cannot Be Updated");
              }
  }
});
});


});
  </script>



<!-- Optional JavaScript -->
    <!-- Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
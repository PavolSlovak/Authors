<?php

include 'authorsdb.php';

include 'functions.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Authors</title>
    <link rel="stylesheet" href="mystyle.css">

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
<?php
require('modalEdit.html');
?>

<!-- Modal Add Article -->
<?php
require('modalAddArticle.html');
?>

<h2>Add Author</h2>

<div class="pb-2">
<!-- <form id="authorForm" >
    <input type="text" class="form-control my-2" placeholder="First Name" id="firstname" name="firstname">
    <input type="text" class="form-control my-2" placeholder="Last Name" id="lastname" name="lastname">
    <input type="text" class="form-control my-2" placeholder="Address" id="address" name="address">
    <td><a href="#" id="insertAuthor" type="button" class='btn btn-success'>Insert Author</a></td>
</form> -->
<form>
  <div class="modal-body">
    <label for="addFirstname">First name:</label><br />
    <input type="text" id="addFirstname" class="form-control" /><br />
    <label for="addLastname">Last name:</label><br />
    <input type="text" id="addLastname" class="form-control" /><br />
    <label for="addAddress">Address:</label><br />
    <input type="address" id="addAddress" class="form-control" /><br />

      <a href="#" id="insertAuthor" class="btn btn-primary">Save changes</a>
  </div>
</form>

</div>

<table class="table table-bordered text-center" id="dataTable">
<thead>

<tr class="bg-dark text-white">
      <td>Add Article</td>
      <td>Show Articles</td>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Address</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>
    <tr>
<tr>
</thead>


<tbody>
<?php
$result = display_data();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {

?>
    <tr id="<?php echo $row['id']?>">
    <!-- Button trigger add article modal -->
      <td>
      <a href="#" type="button" class="btn btn-success add-article" data-toggle="modal" data-target="#addArticleModal" data-id="<?php echo $row['id']; ?>">Add</a>
      </td>

      <td> 
        <a href="displayArticles.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-primary" data-id="<?php echo $row['id']; ?>" >Show</a> 
      </td>

      <td data-target ="firstname"><?php echo $row['firstname'] ?></td>
      <td data-target ="lastname"><?php echo $row['lastname'] ?></td>
      <td data-target ="address"><?php echo $row['address'] ?></td>
            
<!-- Button trigger update modal -->
      <td> <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-role="update" data-id="<?php echo $row['id']; ?>" >Update</a> </td>
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
        </tbody>

</table>

</div>
<script src="delete.js"></script>

<script src="update.js"></script>

<script src="addArticle.js"></script>


<!-- Optional JavaScript -->
    <!-- Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="insertAuthor.js"></script>


  </body>
</html>
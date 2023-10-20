<?php

include 'functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        
        <?php 
    $authorId = $_GET['id'];
    ?>
        <h2>Articles of author with ID <?php echo $authorId ?></h2>
        
    <table class="table table-bordered text-center">
<tr class="bg-dark text-white">
      <td>Article ID</td>
      <td>Article Name</td>
      <td>Content</td>
    </tr>
    <tr>
<tr>
<?php


$article = display_article($authorId);
if ($article->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($article)) {

?>
<tr>
      <td><?php echo $row['id'] ?></td>
      <td data-target ="article_name"><?php echo $row['article_name'] ?></td>
      <td data-target ="content"><?php echo $row['content'] ?></td>
    </tr>
    <?php
    } 
  }
  else {
    echo "0 articles";
  }
  $conn->close();
?>
</table>
<a href="index.php" class="btn btn-success">Back to Authors</a>



    </div>
    
</html>
$(document).ready(function () {
  $("#insertAuthor").click(function () {
    var firstname = $("#addFirstname").val();
    var lastname = $("#addLastname").val();
    var address = $("#addAddress").val();
    console.log("First Name:", firstname);
    console.log("Last Name:", lastname);
    console.log("Address:", address);
    $.ajax({
      url: "functions.php",
      method: "post",
      data: {
        firstname: firstname,
        lastname: lastname,
        address: address,
        action: "insert",
      },
      success: function (response) {
        var id = response;
        console.log(id);
        if (id) {
          // Clear input fields after successful insertion
          $("#addFirstname").val("");
          $("#addLastname").val("");
          $("#addAddress").val("");

          // Get the table body element
          var tableBody = $("#dataTable tbody");
          var newRow = $("<tr id='" + id + "'>");

          newRow.append(
            `<td><a href="#" type="button" class="btn btn-success add-article" data-toggle="modal" data-target="#addArticleModal" data-id="<?php echo $row['id']; ?>">Add</a></td>`
          );
          newRow.append(
            `<td><a href="displayArticles.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-primary" data-id="<?php echo $row['id']; ?>" >Show</a></td>`
          );
          newRow.append("<td>" + firstname + "</td>");
          newRow.append("<td>" + lastname + "</td>");
          newRow.append("<td>" + address + "</td>");
          newRow.append(
            `<td> <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-role="update" data-id="<?php echo $row['id']; ?>" >Update</a> </td>`
          );
          newRow.append(
            `<td> <a href="#" type="button" class='btn btn-danger' onclick="deletedata(${id});"">Delete</a> </td>`
          );

          // Append the new row to the table
          tableBody.append(newRow);

          /* location.reload(); */
          // To here------------------------
          console.log("Your record was successfully updated");
        } else if (response == 0) {
          console.log("Data Cannot Be Updated");
        }
      },
    });
  });
});

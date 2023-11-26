$(document).ready(function () {
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
              `<td>
            <a href="#" type="button" class="btn btn-success add-article-btn" data-toggle="modal" data-target="#addArticleModal" data-id='${id}'>Add</a>
            </td>`
            );
            newRow.append(
              `<td><a href="displayArticles.php?id=${id}" type="button" class="btn btn-primary" data-id="${id}" >Show</a></td>`
            );
            newRow.append("<td data-target='firstname'>" + firstname + "</td>");
            newRow.append("<td data-target='lastname'>" + lastname + "</td>");
            newRow.append("<td data-target='address'>" + address + "</td>");
            newRow.append(
              `<td> <a href="#" type="button" class="btn btn-primary update-btn" data-toggle="modal" data-target="#editModal"  data-id="${id}" >Update</a> </td>`
            );
            newRow.append(
              `<td> <a href="#" type="button" class='btn btn-danger' onclick="deletedata(${id});"">Delete</a> </td>`
            );

            // Append the new row to the table
            tableBody.append(newRow);

            // Attach the event handler to the update button in the newly appended row
            $(".update-btn").on("click", function () {
              // Code to set up the update modal with pre-filled data
              var firstname = $("#" + id)
                .children("td[data-target=firstname]")
                .text();
              var lastname = $("#" + id)
                .children("td[data-target=lastname]")
                .text();
              var address = $("#" + id)
                .children("td[data-target=address]")
                .text();

              $("#firstname").val(firstname);
              $("#lastname").val(lastname);
              $("#address").val(address);
              $("#userid").val(id);
              $("#editModal").modal("toggle");
            });
            $(".add-article-btn").on("click", function () {
              var authorId = id; // Get the author's ID from the button
              $("#id").val(authorId); // Set the hidden input field with the author's ID
            });
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
});

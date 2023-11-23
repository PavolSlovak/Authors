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
        if (response == 1) {
          // Clear input fields after successful insertion
          $("#addFirstname").val("");
          $("#addLastname").val("");
          $("#addAddress").val("");

          // Get the table body element
          var tableBody = $("#dataTable tbody");
          var newRow = $("<tr>");
          newRow.append("<td>" + firstname + "</td>");
          newRow.append("<td>" + lastname + "</td>");
          newRow.append("<td>" + address + "</td>");

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

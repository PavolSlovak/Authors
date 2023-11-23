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
        // now update information in the guests table
        /*  $("#" + id)
              .children("td[data-target=firstname]")
              .text(firstname);
            $("#" + id)
              .children("td[data-target=lastname]")
              .text(lastname);
            $("#" + id)
              .children("td[data-target=address]")
              .text(address);
            $("#editModal").modal("toggle"); */

        if (response == 1) {
          /*  console.log("First Name:", firstname);
              console.log("Last Name:", lastname);
              console.log("Address:", address); */
          console.log("Your record was successfully updated");
        } else if (response == 0) {
          console.log("Data Cannot Be Updated");
        }
      },
    });
  });
});

// Update Author Record

$(document).ready(function () {
  // append values in input fields
  $(document).on("click", "a[data-role=update]", function () {
    /* alert($(this).data('id')) */
    var id = $(this).data("id");
    console.log(id);
    var firstname = $("#" + id)
      .children("td[data-target=firstname]")
      .text();
    var lastname = $("#" + id)
      .children("td[data-target=lastname]")
      .text();
    var address = $("#" + id)
      .children("td[data-target=address]")
      .text();

    // I'll insert those values into modal input fields and toggle modal

    $("#firstname").val(firstname);
    $("#lastname").val(lastname);
    $("#address").val(address);
    $("#userid").val(id);
    $("#editModal").modal("toggle");
  });

  // now create event to get data from fields and update in DB

  $("#save").click(function () {
    var id = $("#userid").val();
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var address = $("#address").val();

    $.ajax({
      url: "functions.php",
      method: "post",
      data: {
        firstname: firstname,
        lastname: lastname,
        address: address,
        id: id,
        action: "update",
      },
      success: function (response) {
        // now update information in the guests table
        $("#" + id)
          .children("td[data-target=firstname]")
          .text(firstname);
        $("#" + id)
          .children("td[data-target=lastname]")
          .text(lastname);
        $("#" + id)
          .children("td[data-target=address]")
          .text(address);
        $("#editModal").modal("toggle");

        if (response == 1) {
          console.log("Your record was successfully updated");
        } else if (response == 0) {
          console.log("Data Cannot Be Updated");
        }
      },
    });
  });
});

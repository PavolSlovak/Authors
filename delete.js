// Function Delete Author
function deletedata(id) {
  $(document).ready(function () {
    $.ajax({
      // Action
      url: "functions.php",
      // Method
      type: "POST",
      data: {
        // Get value
        id: id,
        action: "delete",
      },
      success: function (response) {
        // Response is the output of action file
        if (response == 1) {
          console.log("Data Deleted Successfully", id);
          document.getElementById(id).remove();
        } else if (response == 0) {
          console.log("Data Cannot Be Deleted", msg);
        }
      },
    });
  });
}

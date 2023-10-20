// Add Article Record
$(document).ready(function () {
  $(".add-article").click(function () {
    var authorId = $(this).data("id"); // Get the author's ID from the button
    $("#id").val(authorId); // Set the hidden input field with the author's ID
  });

  // Create an event to get data from fields and update the database
  $("#saveArticle").click(function () {
    var articleName = $("#article_name").val();
    var content = $("#content").val();
    var authorId = $("#id").val(); // Get the author's ID from the hidden field

    $.ajax({
      url: "insertarticle.php",
      method: "post",
      data: {
        article_name: articleName,
        content: content,
        author_id: authorId,
      },
      success: function (response) {
        $("#addArticleModal").modal("toggle");

        if (response == 1) {
          console.log(
            `Your article was successfully added to author with ID number ${authorId}`
          );
        } else if (response == 0) {
          console.log("Data Cannot Be Added");
        }
      },
    });
  });
});

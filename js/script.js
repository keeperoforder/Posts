jQuery(document).ready(function ($) {
  $(".category-link").on("click", function (e) {
    e.preventDefault();

    var category = $(this).data("category");

    $.ajax({
      type: "POST",
      url: ajax_object.ajaxurl,
      data: {
        action: "load_posts_by_category",
        category: category,
      },
      success: function (response) {
        $(".post-list").html(response);
      },
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const categoryLinks = document.querySelectorAll(".category-link");
  const allLink = document.querySelector('[data-category="all"]');
  allLink.classList.add("active");

  allLink.click();

  categoryLinks.forEach((link) => {
    link.addEventListener("click", function () {
      categoryLinks.forEach((link) => link.classList.remove("active"));
      this.classList.add("active");
    });
  });
});

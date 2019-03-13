/* application-test - app.js
   Forked by Eric Amshukov */

$(function() {
  $("button").on("click", function() {
    const name = $(this)
        .closest("tr")
        .find(".first_name")
        .html(),
      email = $(this)
        .closest("tr")
        .find(".email")
        .html();

    /* Non-blocking Bootstrap Modal Alert */
    BootstrapModalWrapperFactory.alert({
      title: name,
      message: `<a class="btn btn-link" title="${name}'s email" href="mailto:${email}">${email}</email>`
    });
  });
});

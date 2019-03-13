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
      title: `<span class="mr-2"><i class="fas fa-user"></i></span> ${name}`,
      message: `<a class="btn btn-link" title="${name}'s email" href="mailto:${email}"><span class="mr-3"><i class="far fa-envelope"></i></span>${email}</a>`
    });
  });
});

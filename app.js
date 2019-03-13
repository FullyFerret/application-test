/* application-test - app.js
   Forked by Eric Amshukov */

const entityMap = Object.freeze({
  "&": "&amp;",
  "<": "&lt;",
  ">": "&gt;",
  '"': "&quot;",
  "'": "&#39;",
  "/": "&#x2F;",
  "`": "&#x60;",
  "=": "&#x3D;"
});

/* Properly escape data to prevent XSS */
const escapeHtml = function(str) {
  return String(str).replace(/[&<>"'`=\/]/g, function(s) {
    return entityMap[s];
  });
};

$(function() {
  $.fn.extend({
    escapeHTML: function() {
      return escapeHtml(this.html());
    }
  });

  $("button").on("click", function() {
    const name = $(this)
        .closest("tr")
        .find(".first_name")
        .escapeHTML(),
      email = $(this)
        .closest("tr")
        .find(".email")
        .escapeHTML();

    /* Non-blocking Bootstrap Modal Alert */
    BootstrapModalWrapperFactory.alert({
      title: name,
      message: `<a class="btn btn-link" title="${name}'s email" href="mailto:${email}">${email}</email>`
    });
  });
});

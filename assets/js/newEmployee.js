/**
 * Form submit
 *
 */
$(".newEmployee").on("submit", function (event) {
  removeClassInvalid();

  if (!event.target.checkValidity()) {
    addClassInvalid();
    return false;
  }
});

/**
 * render validation
 *
 */
function addClassInvalid() {
  $(".newEmployee input[required]").each(function () {
    if (!this.validity.valid) $(this).addClass("is-invalid");
  });
}

/**
 * render validation
 *
 */
function removeClassInvalid() {
  $(".newEmployee input").each(function () {
    if ($(this).hasClass("is-invalid")) $(this).removeClass("is-invalid");
  });
}

/**
 * render required input validation
 *
 */
$(".newEmployee input[required]").each(function () {
  $(this).on("change", () => {
    if ($(this).hasClass("is-invalid")) $(this).removeClass("is-invalid");
    if (!this.validity.valid) $(this).addClass("is-invalid");
  });
});

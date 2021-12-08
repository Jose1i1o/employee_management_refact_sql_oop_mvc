"use strict";
const employeeUrl = "employeesController.php";

/**
 * Form submit
 *
 */
$(".newEmployee").on("submit", function (event) {
  event.preventDefault();

  if (event.target.checkValidity()) {
    let updatedEmployee = {};
    let elements = $(event.target).find("input, select");

    elements.each((number, element) => {
      updatedEmployee[element.id] = element.value;
    });

    updatedEmployee["id"] = userId;
    event.target.classList.add("was-validated");
    removeClassInvalid();

    $.ajax({
      url: "employees/updateByForm",
      method: "UPDATE",
      data: updatedEmployee,
    })
      .done((response) => {
        $("#responseMsg")
          .text("Employee Update Success")
          .attr("class", "text-success");
      })
      .fail((response) => {
        $("#responseMsg")
          .text("Something when wrong")
          .attr("class", "text-danger");
      });
  } else {
    removeClassInvalid();
    addClassInvalid();
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


function newEmployeeForm() {
  $("#employeeTitle").text("New employee");
  $("#submitBtn").text("Add employee");
  $("form").on("submit", handleNewEmployee);
  $("#navEmployee").removeClass("text-secondary").addClass("text-white");
  $("#navDashboard").addClass("text-secondary").removeClass("text-white");
}

/**
 *
 */
function handleNewEmployee(event) {
  event.preventDefault();
  event.stopPropagation();
  const form = document.querySelector(".newEmployee");

  if (!form.checkValidity()) {
  } else {
    let objectToSend = {};
    let elements = $("form").find("input, select");
    elements.each((number, element) => {
      objectToSend[element.id] = element.value;
    });
    $.ajax({
      type: "POST",
      url: "employees/,
      data: objectToSend,
    }).done(() => {
      const successfulAddModalLabel = new bootstrap.Modal(
        document.getElementById("successfulAddModal"),
        {
          keyboard: false,
        }
      );
      successfulAddModalLabel.show();
      $("#successfulAddModal").on("hide.bs.modal", () => {
        window.location.replace("./employees.php");
      });
    });
  }

  form.classList.add("was-validated");
}

/**
 *
 */
function setEmployeeForm(employee) {
  $("#name").val(typeof employee.name !== "undefined" ? employee.name : "");
  $("#lastName").val(
    typeof employee.lastName !== "undefined" ? employee.lastName : ""
  );
  $("#email").val(typeof employee.email !== "undefined" ? employee.email : "");
  $("#gender").val(
    typeof employee.gender !== "undefined" ? employee.gender : ""
  );
  $("#city").val(typeof employee.city !== "undefined" ? employee.city : "");
  $("#streetAddress").val(
    typeof employee.streetAddress !== "undefined" ? employee.streetAddress : ""
  );
  $("#state").val(typeof employee.state !== "undefined" ? employee.state : "");
  $("#age").val(typeof employee.age !== "undefined" ? employee.age : "");
  $("#postalCode").val(
    typeof employee.postalCode !== "undefined" ? employee.postalCode : ""
  );
  $("#phoneNumber").val(
    typeof employee.phoneNumber !== "undefined" ? employee.phoneNumber : ""
  );
}

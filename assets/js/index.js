function getEmployees() {
  return $.ajax({
    type: "GET",
    url: "employees/read",
    contentType: "application/json",
    dataType: "json",
  });
}

function insertEmployees(item) {
  return $.ajax({
    type: "POST",
    url: "employees/create",
    data: item,
  });
}

function updateEmployees(item) {
  return $.ajax({
    type: "PUT",
    url: "employees/update",
    data: item,
  });
}

function deleteEmployee(item) {
  return $.ajax({
    type: "DELETE",
    url: "employees/deleteEmployee/ + ${item.id}",
    data: item,
    dataType: "json",
  });
}

$("#jsGrid").jsGrid({
  width: "100%",
  height: "600px",

  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
  pageLoading: true,
  autoload: true,
  pageSize: 10,
  pageButtonCount: 5,
  deleteConfirm: function (item) {
    return (
      'The client "' +
      item.name +
      " " +
      item.lastName +
      '" will be removed. Are you sure?'
    );
  },

  controller: {
    loadData: async function () {
      let employees = [];
      try {
        employees = await getEmployees();
        console.log(employees);
      } catch (error) {
        console.log(error.responseText);
      }
      return {
        data: employees,
      };
    },
    insertItem: async function (item) {
      let newEmployee = null;
      try {
        newEmployee = await insertEmployees(item);
      } catch (error) {
        console.log(error.textResponse);
      }
      return {
        data: newEmployee,
      };
    },
    updateItem: async function (item) {
      let updatedEmployee = null;
      try {
        updatedEmployee = await updateEmployees(item);
      } catch (error) {
        console.log(error.textResponse);
      }
      return {
        data: updatedEmployee,
      };
    },
    deleteItem: function(item) {
      deleteEmployee(item);
    },
  },

  fields: [{
      title: "Id",
      name: "id",
      type: "number",
      css: "d-none",
    },
    {
      title: "Name",
      name: "name",
      type: "text",
      width: 50,
      validate: "required",
    },
    // {
    //   name: "lastName",
    //   title: "Last name",
    //   type: "text",
    //   width: 60,
    //   validate: "required"
    // },
    {
      title: "Email",
      name: "email",
      type: "text",
      width: 80,
      validate: "required",
    },
    {
      title: "Sex",
      name: "gender",
      type: "text",
      validate: "required",
    },
    {
      title: "Age",
      name: "age",
      type: "text",
      width: 40,
      validate: function (value) {
        if (value > 18) {
          return true;
        }
      },
    },
    {
      title: "Street No.",
      name: "street",
      type: "text",
      width: 40,
    },
    {
      title: "Postal code",
      name: "postalcode",
      type: "text",
      width: 40,
    },
    {
      title: "Phone number",
      name: "phone",
      type: "text",
      width: 60,
    },
    {
      title: "State",
      name: "state",
      type: "text",
      width: 50,
    },
    {
      title: "City",
      name: "city",
      type: "text",
      width: 60,
    },
    {
      type: "control",
      editButton: true,
      deleteButton: true,
      editButtonTooltip: "Edit",
      deleteButtonTooltip: "Delete",
      updateButtonTooltip: "Update",
      cancelEditButtonTooltip: "Cancel edit",
    },
  ],
});


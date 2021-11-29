$("#jsGrid").jsGrid({
  width: "100%",
  height: "600px",

  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
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
    loadData: async function (get) {
      return await $.ajax({
        type: "GET",
        url: "./library/employeeController.php?name&email&gender&age&street&city&state&postalcode&phone",
        dataType: "application/json",
        data: get,
        success: function (data) {
          console.log(data);
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
          console.log(status);
          console.log(error);
        },
      });
    },
    insertItem: function (post) {
      return $.ajax({
        type: "POST",
        url: "../../src/library/employeeController.php",
        dataType: "json",
        data: post,
      });
    },
    updateItem: function (item) {
      console.log(item);
      return $.ajax({
        type: "PUT",
        url: "../../src/library/employeeController.php",
        dataType: "json",
        data: item,
        success: function (item) {
          console.log(item);
        },
        error: function (request, error) {
          console.log(error);
          console.log(request);
        },
      });
    },
    deleteItem: function (item) {
      return $.ajax({
        type: "DELETE",
        url: "../../src/library/employeeController.php",
        dataType: "json",
        data: item,
        success: function (item) {
          console.log(item);
        },
        error: function (request, error) {
          console.log(error);
          console.log(request);
        },
      });
    },
  },

  fields: [
    {
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
      name: "postalCode",
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

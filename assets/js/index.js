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
    loadData: function (get) {
      return $.ajax({
        type: "GET",
        url: "./library/employeeController.php",
        dataType: "json",
        data: get,
        success: function (get) {
          console.log(get);
        },
        error: function (get) {
          console.log(get);
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
      name: "name",
      title: "Name",
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
      name: "email",
      title: "Email",
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
      name: "age",
      title: "Age",
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
      name: "postalCode",
      title: "Postal code",
      type: "text",
      width: 40,
    },
    {
      name: "phone",
      title: "Phone number",
      type: "text",
      width: 60,
    },
    {
      name: "state",
      title: "State",
      type: "text",
      width: 50,
    },
    {
      name: "city",
      title: "City",
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

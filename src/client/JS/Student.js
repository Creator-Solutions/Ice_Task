$(function () {
  $.ajax({
    method: "POST",
    url: "/Ice_Task/src/server/Views/StudentView.php",
    data: JSON.stringify({ Type: "Get" }),
    success: function (response) {
      $("#table").html(response);
    },
    error: function (err) {
      console.log(err);
    },
  });

  $.ajax({
    method: "POST",
    url: "/Ice_Task/src/server/Views/StudentView.php",
    data: JSON.stringify({ Type: "Books" }),
    success: function (response) {
      $("#productTable").html(response);
    },
    error: function (err) {
      console.log(err);
    },
  });
});

const Verify_User = (id) => {
  $.ajax({
    method: "POST",
    url: "/Ice_Task/src/server/Views/StudentView.php",
    data: JSON.stringify({ Type: "Verify", ID: id }),
    success: function (response) {
      let data = JSON.parse(response);
      console.log(data);
    },
    error: function (err) {
      console.log(err);
    },
  });
};

const Remove_User = (id) => {
  $.ajax({
    method: "POST",
    url: "/Ice_Task/src/server/Views/StudentView.php",
    data: JSON.stringify({ Type: "Delete", ID: id }),
    success: function (response) {
      let data = JSON.parse(response);
      console.log(data);
    },
    error: function (err) {
      console.log(err);
    },
  });
};

const Accept_Request = (isbn) => {
  $.ajax({
    method: "POST",
    url: "/Ice_Task/src/server/Views/StudentView.php",
    data: JSON.stringify({ Type: "Accept", ISBN: isbn }),
    success: function (response) {
      let data = JSON.parse(response);
      console.log(data);
    },
    error: function (err) {
      console.log(err);
    },
  });
};

const Decline_Request = (isbn) => {
  $.ajax({
    method: "POST",
    url: "/Ice_Task/src/server/Views/StudentView.php",
    data: JSON.stringify({ Type: "Decline", ISBN: isbn }),
    success: function (response) {
      let data = JSON.parse(response);
      console.log(data);
    },
    error: function (err) {
      console.log(err);
    },
  });
};

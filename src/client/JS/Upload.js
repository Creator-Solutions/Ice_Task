const Upload = () => {
  let image = $("#txtImage").val();
  let bookName = $("#txtBookName").val();
  let isbn = $("#txtISBN").val();
  let displayName = $("#txtDisplayName").val();
  let price = $("#txtPrice").val();
  let course = $("#txtCourse").val();
  let description = $("#txtDescription").val();
  let student_email = $("#txtStudentEmail").val();

  const fields = document.querySelector("input");
  const validInputs = Array.from(fields).filter((input) => input.value !== "");

  if (!validInputs) {
    alert("Please fill in all fields");
  } else if (!image) {
    alert("Please upload book image");
  }

  if (validInputs) {
    image = image.substring(image.indexOf("\\") + 1);
    let obj = {
      Email: student_email,
      Name: bookName,
      ISBN: isbn,
      Display: displayName,
      Price: price,
      Course: course,
      Description: description,
      Image: `../Images/${image.substring(image.indexOf("\\") + 1)}`,
    };

    console.log(obj);

    $.ajax({
      method: "POST",
      url: "/Ice_Task/src/server/Views/Request_View.php",
      data: JSON.stringify(obj),
      success: function (response) {
        let data = JSON.parse(response);

        if (data[0].Message === "Request Process Complete") {
          alert("Request Sent Successfully");
        }
      },
      error: function (err) {
        alert(err.message);
      },
    });
  }
};

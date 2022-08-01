console.log("hello");

var validatePassword = function () {
  let password = document.getElementById("pass_word").value;
  let confirmPassword = document.getElementById("confirm_password").value;
  if (password.length != 0) {
    if (password == confirmPassword) {
      document.getElementById("message").style.color = "green";
      document.getElementById("message").innerHTML = "matching";
      document.getElementById("signUp").removeAttribute("disabled");
    } else {
      document.getElementById("message").style.color = "red";
      document.getElementById("message").innerHTML = "not matching";
      document.getElementById("signUp").setAttribute("disabled", true);
    }
  } else {
    document.getElementById("message").innerHTML = "";
  }
};


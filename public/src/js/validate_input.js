
function validate(form) {
  var fail = validateUsername(form.full_name.value);
  fail += validateEmail(form.email.value);
  fail += validatePassword(form.user_pword.value);

  if (fail == "") {
    return true;
  } else {
    alert(fail);
    return false;
  }
}

function validateUsername(field) { //&nbsp; \u00a0 or \xa0
  if (field == "") {
    return "Empty Name.\n";
  } else if (field.length < 3 || field.length > 32) {
    return "Username must be at least 3 characters. \n";
  }else {
    return "";
  }
}

function validateEmail(field) { 
  if (field == "") {
    return "No Email was entered.\n";
  } else if (!((field.indexOf(".") > 0 && field.indexOf("@") > 0) ||/[^a-zA-Z0-9.@_-]/.test(field))) {
    return "The Email address is invalid.\n";
  } else {
    return "";
  }
}

function validatePassword(field) {
  if (field == "") {
    return "No Password was entered.\n";
  } else if (field.length < 6) {
    return "Passwords must be at least 6 characters.\n";
  } else if (!/[a-z]/.test(field) || !/[A-Z]/.test(field) || !/[0-9]/.test(field) || !/[@$#]/.test(field)) {
    return "Password requires one of each a-z, A-Z, symbols @$#, and 0-9.\n";
  } else {
    return "";
  }
}

// function for notifying and disabling submit button if both passwords are not the same "update on key up"
function pwordCheck() {
    // assign passwords and button in register page input fields
    var pword1 = document.getElementById("1pword").value;
    var pword2 = document.getElementById("2pword").value;
    var btn = document.getElementById("btn");
    
    // check if both passwords are the same
    if (pword1 == pword2) {
        document.getElementById("pwordMessage").innerHTML = "Passwords match ";
        btn.disabled = false;;
    }else {
        document.getElementById("pwordMessage").innerHTML = "Passwords does not match ";
        btn.disabled = true;
    }
}

// check if at least one box is selected
function validateSelection() {
  var checkboxes = document.querySelectorAll("input[type='checkbox']");
  var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);
  if (!checkedOne) {
    alert('Please select at least one.');
    return false;
  }
  return true;
}


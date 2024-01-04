<?php require_once('header.php');?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <script src="validate_input.js"></script>
</head>
<body>
  <center>
  <h1> SIGN UP </h1>

  <!-- onSubmit="return validate(this)" -->
  <form action="reg_comfirm.php" method="post" onSubmit="return validate(this)"> 
    <label>Enter Name: </label> 
    <input type="text" name="full_name" maxlength="32" id="fullname" placeholder="Full Name"> <br><br>

    <label>Enter Email:  </label> 
    <input type="text" name="email" maxlength="32" id="emailAddress" placeholder="Email Address"> <br><br>

    <label for="1pword">Enter Password: </label> 
    <input type="Password" name="user_pword" maxlength="32" id="1pword" placeholder="Password" onkeyup="pwordCheck();"> <br><br>

    <label for="2pword">Confirm Password: </label> 
    <input type="Password" name="user_pword2" maxlength="32" id="2pword" placeholder="Password" onkeyup="pwordCheck();"> 
    
    <p id=pwordMessage>  </p>

    <input type="submit" value="Submit" id="btn"/>
  </form> </center>
</body>
</html>

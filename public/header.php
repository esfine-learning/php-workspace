<?php

  // // check cookie to auto logout
  // if (!isset($_COOKIE['timer'])) {
  //   logout();   
  // }

  // each activity update the time to 100m
  //setcookie('timer', 'x', time()+6000); 

  // // if "user agent" and "session ip" not equal to the curent user, logout 
  // if (isset($_SESSION['check']) && $_SESSION['check'] !=  hash('ripemd128', $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'])) {
  //   logout();
  // }

  // logout user when called
  function logout(){
    echo "<script> location.href='logout.php'; </script>"; 
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


body {
  /* background-image: url("background.png");
  background-repeat: no-repeat;
  background-size: fill; */
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

body {
    font-family: Arial, sans-serif;
    background-color: #ddd;
}

.container {
  width: 80%;
  margin: auto;
  overflow: hidden;
}

.form-container {
  background-color: #fff;
  padding: 20px;
  margin-top: 20px;
  border-radius: 5px;
  box-shadow: 0px 0px 10px #ccc;
}

.input-group {
  margin-bottom: 10px;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
}

.input-group input, .input-group select {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ddd;
}

h1, h3, p {
  text-align: center;
}

label {
  display: inline-block; width: 140px; text-align: center;
}


/* password match when changing */
#pwordMessage {color: red}



/* navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;}

.topnav a {
  float: left;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 15px;
  font-weight: bold;}

.topnav-right {
  float: right;
}

.topnav a:hover {
  background-color: #ddd ;
  color: black;
}



/* request service form */
.form-container {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  width: auto;
  margin: auto;
}

.form-container {
  background-color: #eee;
  display: flex;
  flex-direction: column;
  align-items: center; /* aligns items vertically in the center */
  width: 80%; /* takes the full width of its parent */
}

.form-container .input-group {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  margin-bottom: 10px;
}



/* Buttons */
.submit-button-container {
    display: flex;
    justify-content: center;
}

input[type="submit"] {
    background-color: #333;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    border-radius: 10px;
}
    
input[type="submit"]:hover {
    background-color: #555;
}




/* requests table */
.table-container {
    display: flex;
    justify-content: center;
    max-width: 90%; 
    width: auto;
    margin: 0 auto; 
}

.table-container table {
    border-collapse: collapse;
    width: 100%;
}

.table-container table td, .table-container table th {
    max-width: 200px; 
    word-wrap: break-word; 
    padding: 15px;
    border: 1px solid #ddd;
}

.table-container table th {
    background-color: #333;
    color: white;
}

.table-container table tr:nth-child(even) {
    background-color: #f2f2f2;
}


.status-form {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    margin-bottom: 20px;
}

.status-form select {
    padding: 15px;
    font-size: 16px;
    border-radius: 10px;
    border: 1px solid #ccc;
    width: 100% ;
}


.service-done {
    color: green;
}

.service-pending {
    color: red;
}



</style>
</head>
<body>
<div class="topnav">
  <a href="index.php">Home</a> 
  <?php
      if (isset($_SESSION['id'])) {
        echo "<a href='requests.php'>Requests</a>";
      }
  ?>

  <div class="topnav-right">
    <?php
      if (isset($_SESSION['id'])) {
        echo "<a href='account.php'>". $_SESSION['name']. "</a>";
        echo "<a href='logout.php' >Logout</a>";
      }else{
        echo "<a href='login.php'>Login</a>";
        // echo "<a href='reg.php'>Register</a>";
      }
    ?>
  </div>
</div>
</body>
</html>

<?php
ob_start();
session_start();
?>
<html>

<head>
  <title>HOME</title>
<?php

require_once('header.php');
require_once('db_config.php');

$message = '';

// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // get form data
  $service = $_POST['service'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $factory = $_POST['factory'];

  // prepare query
  $sql = "INSERT INTO requests (service, name, phone, email, factory) VALUES (?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $service, $name, $phone, $email, $factory);

  // execute the query and check the result
  if ($stmt->execute()) {
    echo "<script type='text/javascript'>
            alert('Your request has been submitted successfully.');
            window.location.href = 'index.php';
          </script>";
  } else {
      echo "<script type='text/javascript'>alert('Error: " . $stmt->error . "');</script>";
      header('Location: index.php');
  }

  // close the statement
  $stmt->close();
}

// close the database connection
$conn->close();
?>
</head>

<body>
<div class="container">
  <h1> Welcome </h1>
  <h3>Description of the services provided by the center <br></h3>

  <?php
  if (!empty($message)) {
    echo "<p>$message</p>";
  }

  if (isset($_GET['request']) || $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<div class='form-container'>
              <form method='POST' action=''>

                  <div class='input-group'>
                    <label for='service'>Service:</label>
                    <select id='service' name='service' required>
                        <option value=''>Select a service</option>
                        <option value='temp1'>temp1</option>
                        <option value='temp2'>temp2</option>
                        <option value='temp3'>temp3</option>
                        <option value='temp4'>temp4</option>
                    </select>
                  </div>

                  <div class='input-group'>
                    <label for='name'>Name:</label>
                    <input type='text' id='name' name='name' required>
                  </div>

                  <div class='input-group'>
                    <label for='name'>Name:</label>
                    <input type='text' id='name' name='name' required>
                  </div>

                  <div class='input-group'>
                    <label for='phone'>Phone:</label>
                    <input type='text' id='phone' name='phone' required>
                  </div>

                  <div class='input-group'>
                    <label for='email'>Email:</label>
                    <input type='text' id='email' name='email' required>
                  </div>

                  <div class='input-group'>
                    <label for='factory'>Factory Name:</label>
                    <input type='text' id='factory' name='factory' required>
                  </div>

                  <div style='text-align: center;'>
                    <input type='submit' value='Submit'>
                  </div>
                </form>
            </div>";
  } else {
    echo "<center><form action='index.php' method='GET'>
              <input type='hidden' name='request' value='true'>
              <input type='submit' value='Request Service'>
            </form></center>";
  }
  ?>
</div>
</body>

</html>

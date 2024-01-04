<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Account</title>
<script>
    function showForm() {
        document.getElementById('editForm').style.display = 'block';
    }
</script>
</head>
<body>
<?php

require_once('header.php');
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE user SET user_name = ?, user_email = ? WHERE user_id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $id);

        if (mysqli_stmt_execute($stmt)) {
            // Update session values
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header("location: account.php");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
}

if (isset($_SESSION['id'])) {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];

    echo "<center><h1>Welcome back $name </h1><br>";

    if (isset($_GET['edit'])) {
        echo "<center><div id='editForm'>
                <form method='POST' action=''>
                    <input type='hidden' name='id' value='$id'>
                    <label for='name'>User Name:</label>
                    <input type='text' id='name' name='name' value='$name'><br><br>
                    <label for='email'>Email address:</label>
                    <input type='text' id='email' name='email' value='$email'><br><br>
                    <input type='submit' value='Update'>
                </form>
                </div><center>";
    } else {
        echo "
                <h3> Name: $name <br>
                <h3> Email address: $email <br><br>

                <form action='' method='GET'>
                <input type='hidden' name='edit' value='true'>
                <input type='submit' value='Edit'>
                </form>";
    }
} else {
    echo "<h3>Please <a href='../www/login.php'>Login</a>.</h3>";
    echo "<h3> Or <a href='../www/reg.php'> Register </a><h3>";
}
// close connection
mysqli_close($conn);
?>
</body>
</html>


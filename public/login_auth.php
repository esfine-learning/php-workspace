<?php 
ob_start();
session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Authentication</title>
</head>
  
<body>
<center>
<?php
    require_once('header.php');
    include('db_config.php');

    $email = sanitizeMySQL($conn, $_POST['email']);
    $pword = sanitizeMySQL($conn, $_POST['pword']);

    // find user with matching email and verify
    $query = "SELECT * from user WHERE user_email = '$email'";
    $result = mysqli_query($conn, $query);
    $result_row = mysqli_fetch_row($result); // fetch a result row as an array

    // check connection and perform query
    if($result){
        // verify user name and hashed password
        if(mysqli_num_rows($result) > 0 && password_verify($pword, $result_row[3]) ) {

            // set session data
            $_SESSION['id'] = $result_row[0];
            $_SESSION['name']  = $result_row[1];
            $_SESSION['email']  = $result_row[2];

            // preventing session hijacking
            $_SESSION['check'] = hash('ripemd128', $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);


            setcookie('timer', 'x', time()+600); // set cookie to auto logout after 10m of no activity
            header('Refresh: 0; URL=account.php'); // reload the page to welcome page
        }else {
            echo "<h1> wrong username or password </h1>";
            echo "<h3>Please <a href='login.php'>Login</a> Again.</h3>";
            echo "<h3> Or <a href='reg.php'> Register </a><h3>";
        }
    }else {
        echo mysqli_error($conn);
    }

    // close connection
    mysqli_close($conn);

    // remove special characters to avoid sql injection and XSS
    function test_input($data) {
        $data_clean = stripslashes($data); // remove slashes
        $data_clean = trim($data); // remove extra spaces
        $data_clean = strip_tags($data); // remove all html/php tags
        $data_clean = htmlspecialchars($data); // //removing harmful html characters to avoid XSS

        return $data_clean;
    }

    // remove special charachters to avoid sql injection
    function sanitizeMySQL($conn, $data){
        $data = mysqli_real_escape_string ($conn, $data);
        $data = test_input($data);
        return $data;
    }
?>
</center>
</body>
</html>

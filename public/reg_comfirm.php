<?php
    ob_start(); 
    session_start();
    require_once('header.php');
    include('db_config.php');

    // values from the user input in the form
    $full_name =  $_POST['full_name'];
    $email = $_POST['email'];
    $user_pword =  password_hash($_POST['user_pword'], PASSWORD_DEFAULT);

    // find user with matching email and verify
    $query = "SELECT * from user WHERE user_email = '$email'";
    $result = mysqli_query($conn, $query);

    // check connection and perform query to check if email already exist or not
    if(mysqli_num_rows($result) == 0){
        add_user($conn, $full_name, $email, $user_pword);
    }else {
        echo "<h1>Email already registered</h1>";
        echo "<h3>Go to the <a href='login.php'>Login</a> page to sign in</h3>";
        echo "<h3> Or <a href='reg.php'> Register </a> with different Email<h3>";
    }
    
    // insert into table "user"
    function add_user($conn, $un, $em, $pw){
        $stmt = $conn->prepare('INSERT INTO user (user_name, user_email, user_password) VALUES(?,?,?)');
        $stmt->bind_param('sss', $un, $em, $pw);
        $stmt->execute();
        echo "<h1>Registered Successfully</h1>"; 
        echo "<h3>Go to the <a href='login.php'>Login</a> page to sign in </h3>";
        $stmt->close();
    }

    // Close connection
    mysqli_close($conn);
?>

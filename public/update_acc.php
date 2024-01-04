<?php
    ob_start();
    session_start();
    require_once('db_config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        echo $name . "<br><br>";
        echo $email;

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
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
?>

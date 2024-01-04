<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Requests</title>
</head>
<body>
<?php
require_once('header.php');
require_once('db_config.php');

$statusFilter = null;

if (isset($_SESSION['id'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['status'])) {
            $statusFilter = $_POST['status'] === 'done' ? 1 : ($_POST['status'] === 'pending' ? 0 : null);
        } else {
            $id = $_POST['id'];

            $sql = "UPDATE requests SET status = !status WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo "<script type='text/javascript'>alert('Status updated successfully.');</script>";
            } else {
                echo "<script type='text/javascript'>alert('Error: " . $stmt->error . "');</script>";
            }

            $stmt->close();
        }
    }

    $sql = "SELECT * FROM requests";
    if ($statusFilter !== null) {
        $sql .= " WHERE status = $statusFilter";
    }
    $sql .= " ORDER BY request_date DESC";
    $result = $conn->query($sql);

    // status filter 
    echo "<div class='status-form'>
            <form method='POST' action=''>
                <select name='status' onchange='this.form.submit()'>
                    <option value='all'>All</option>
                    <option value='done'" . ($statusFilter === 1 ? " selected" : "") . ">Done</option>
                    <option value='pending'" . ($statusFilter === 0 ? " selected" : "") . ">Pending</option>
                </select>
            </form>
        </div>";

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Factory</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>";
    
        while($row = $result->fetch_assoc()) {
            $statusClass = $row["status"] ? "service-done" : "service-pending";
            echo "<tr class='$statusClass'>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["service"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["phone"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["factory"] . "</td>
                    <td>" . $row["request_date"] . "</td>
                    <td>" . ($row["status"] ? "Done" : "Pending") . "</td>
                    <td> <div class='submit-button-container'>
                        <form method='POST' action='' onsubmit='return confirm(\"Are you sure you want to change the status?\");'>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <input type='submit' value='Change Status'>
                        </form></div>
                    </td>
                </tr>";
        }
    
        echo "</table>
            </div>
            <br><br>";
    } else {
        echo "<div class='table-container'>No requests found.</div>";
    }
        
}else {
    // display message if user is not logged in
    echo "<br><br><h3><a href='login.php'>Login</a></h3>";
}

$conn->close();
?>

<?php
session_start();
include '../modules/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $phoneNumber = $_POST['phone_number'];
    $sql = "UPDATE users SET first_name='$firstName', last_name='$lastName', phone_number='$phoneNumber' WHERE id=$userId";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../user.php?namesuccess=true");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

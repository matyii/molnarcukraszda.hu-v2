<?php
include '../modules/database.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $phoneNumber = $_POST["phone_number"];
    $items = json_encode($_SESSION['cart'], JSON_UNESCAPED_UNICODE);
    $totalPrice = (float) preg_replace('/[^\d.]/', '', $_POST["total_price"]);
    $sql = "INSERT INTO orders (first_name, last_name, phone_number, items, price) VALUES ('$firstName', '$lastName', '$phoneNumber', '$items', '$totalPrice')";

    if ($conn->query($sql) === TRUE) {
        unset($_SESSION['cart']);
        header("Location: ../cart.php?success=true");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

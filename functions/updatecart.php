<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['quantity']) && is_numeric($_POST['id']) && is_numeric($_POST['quantity'])) {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] = $quantity;
            http_response_code(200);
            echo json_encode(array("message" => "Cart session updated successfully."));
        }
    }
}
?>
<?php
session_start();

if (isset($_POST['addToCart'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];
    $ingredients = $_POST['ingredients'];
    $size = $_POST['size'];

    addToCart($id, $name, $price, $quantity, $image, $ingredients, $size);

    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}

function addToCart($id, $name, $price, $quantity, $image, $ingredients, $size) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
    } else { 
        $_SESSION['cart'][$id] = array(
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $image,
            'ingredients' => $ingredients,
            'size' => $size
        );
    }
}

function removeFromCart($id) {
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
}

if (isset($_POST['removeFromCart'])) {
    $idToRemove = $_POST['idToRemove'];
    removeFromCart($idToRemove);
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}

?>
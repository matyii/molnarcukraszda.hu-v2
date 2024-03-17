<?php
session_start();

function createProductCard($product) {
    $cardDiv = '<div class="col md-3 mb-3">';
    $cardDiv .= '<div class="card text-center">';
    $cardDiv .= '<div class="card-body">';

    if (isset($product['image'])) {
        $cardDiv .= '<img src="' . $product['image'] . '" style="width: 150px;" class="card-img-top rounded w-100 mb-3">';
    }

    if (isset($product['name'])) {
        $cardDiv .= '<h3 class="card-title">' . $product['name'] . '</h3>';
    }

    if (isset($product['ingredients'])) {
        $ingredients = is_array($product['ingredients']) ? implode(', ', $product['ingredients']) : $product['ingredients'];
        $cardDiv .= '<p class="card-subtitle mb-3">' . $ingredients . '</p>';
    }

    if (isset($product['size'])) {
        $cardDiv .= '<p class="card-subtitle mb-3">' . $product['size'] . '</p>';
    }

    if (isset($product['price'])) {
        $cardDiv .= '<p class="fw-bold">' . $product['price'] . '</p>';
    }

    if (isset($product['id']) && isset($product['name']) && isset($product['price'])) {
        $cardDiv .= '<form method="post" action="functions/addtocart.php">';
        $cardDiv .= '<input type="hidden" name="id" value="' . $product['id'] . '">';
        $cardDiv .= '<input type="hidden" name="name" value="' . $product['name'] . '">';
        $cardDiv .= '<input type="hidden" name="price" value="' . $product['price'] . '">';
        if (isset($product['image'])) {
            $cardDiv .= '<input type="hidden" name="image" value="' . $product['image'] . '">';
        }
        if (isset($product['ingredients'])) {
            $cardDiv .= '<input type="hidden" name="ingredients" value="' . $product['ingredients'] . '">';
        }
        if (isset($product['size'])) {
            $cardDiv .= '<input type="hidden" name="size" value="' . $product['size'] . '">';
        }

        $cardDiv .= '<input type="hidden" name="quantity" value="1">';
        $cardDiv .= '<button type="submit" name="addToCart" class="btn btn-primary"><i class="bi bi-basket2-fill"></i> Kosárba</button>';
        $cardDiv .= '</form>';
    }      

    $cardDiv .= '</div></div></div>';
    return $cardDiv;
}


function loadProductsFromDatabase() {
    include 'modules/database.php';
    $sql = "SELECT * FROM products";
    $type = isset($_GET['type']) ? $_GET['type'] : 'all';
    if ($type !== 'all') {
        $sql .= " WHERE type = '$type'";
    }
    $sql .= " ORDER BY type";
    $result = $conn->query($sql);
    $productCards = '';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productCards .= createProductCard($row);
        }
    } else {
        echo "Nincs találat";
    }
    $conn->close();
    return $productCards;
}

if (isset($_POST['addToCart'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    addToCart($id, $name, $price, $quantity);
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molnár Cukrászda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/png">
</head>
<body>
    <?php include 'modules/navbar.php' ?>
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <?php include 'modules/shopbuttons.php' ?>
        </div>
        <div class="row row-cols-1 row-cols-md-3 my-5" id="productCards">
            <?php echo loadProductsFromDatabase(); ?>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
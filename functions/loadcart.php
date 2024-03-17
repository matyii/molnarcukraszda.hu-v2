<?php

function generateCartHTML() {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $cartHTML = '';
        foreach ($_SESSION['cart'] as $id => $item) {
            $totalPrice = $item['price'] * $item['quantity'];
            $cartHTML .= '<div class="card mb-3">';
            $cartHTML .= '<div class="row g-0">';
            $cartHTML .= '<div class="col-md-4">';
            $cartHTML .= '<img src="' . $item['image'] . '" class="img-fluid rounded-start" style="width: 200px;">';
            $cartHTML .= '</div>';
            $cartHTML .= '<div class="col-md-8">';
            $cartHTML .= '<div class="card-body">';
            $cartHTML .= '<h5 class="card-title">' . $item['name'] . '</h5>';
            $cartHTML .= '<p class="card-text">' . $item['ingredients'] . '</p>';
            $cartHTML .= '<p class="card-text">' . $item['size'] . '</p>';
            $cartHTML .= '<div class="d-flex justify-content-between align-items-center">';
            $cartHTML .= '<div>';
            $cartHTML .= '<button class="btn btn-sm btn-outline-dark me-2" onclick="decrementQuantity(' . $id . ')">-</button>';
            $cartHTML .= '<span class="fw-bold" id="quantity_' . $id . '">' . $item['quantity'] . '</span>';
            $cartHTML .= '<button class="btn btn-sm btn-outline-dark ms-2" onclick="incrementQuantity(' . $id . ')">+</button>';
            $cartHTML .= '</div>';
            $cartHTML .= '<p class="fw-bold">' . $totalPrice . '€' . '</p>';
            $cartHTML .= '</div>';
            $cartHTML .= '</div></div></div>';
            $cartHTML .= '<div class="position-absolute top-0 end-0 p-2">';
            $cartHTML .= '<form method="post" action="functions/addtocart.php">';
            $cartHTML .= '<input type="hidden" name="idToRemove" value="' . $id . '">';
            $cartHTML .= '<button type="submit" name="removeFromCart" class="btn btn-close"></button>';
            $cartHTML .= '</form>';
            $cartHTML .= '</div>';
            $cartHTML .= '</div>';
        }
    } else {
        $cartHTML = '<div class="card mb-3">';
        $cartHTML .= '<div class="card-body">';
        $cartHTML .= '<p class="card-text fw-bold">Üres a kosarad</p>';
        $cartHTML .= '</div>';
        $cartHTML .= '</div>';
    }
    return $cartHTML;
}
?>

<script>

function incrementQuantity(id) {
    var quantityElement = document.getElementById('quantity_' + id);
    var currentQuantity = parseInt(quantityElement.innerText);
    quantityElement.innerText = currentQuantity + 1;
    updateCartSession(id, currentQuantity + 1);
}

function decrementQuantity(id) {
    var quantityElement = document.getElementById('quantity_' + id);
    var currentQuantity = parseInt(quantityElement.innerText);
    if (currentQuantity > 1) {
        quantityElement.innerText = currentQuantity - 1;
        updateCartSession(id, currentQuantity - 1);
    }
}

function updateCartSession(id, quantity) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "functions/updatecart.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + id + "&quantity=" + quantity);
}
</script>
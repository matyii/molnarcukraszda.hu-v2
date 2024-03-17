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
    <?php 
    include 'modules/navbar.php';
    include 'functions/loadcart.php';
    if (isset($_GET['success']) && $_GET['success'] === 'true') {
        $alertMessage = "Sikeres rendelés!";
    }
    ?>
<div class="container my-5 pt-5">
    <?php if (!empty($alertMessage)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $alertMessage; ?>
            </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-8">
            <?php echo generateCartHTML(); ?>
        </div>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                <h5 class="card-title">Összegzés</h5>
                <?php
                $totalPrice = 0;
                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        $totalPrice += $item['price'] * $item['quantity'];
                        echo '<p>' . $item['quantity'] . 'x ' . $item['name'] . ': ' . ($item['price'] * $item['quantity']) . '€' . '</p>';
                    }
                } else {
                    echo '<p>A kosár üres.</p>';
                }
                ?>
                <hr>
                <p class="fw-bold">Összesen: <?php echo $totalPrice; ?>€</p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title text-center">Adatok</h3>
                    <form action="functions/order.php" method="post">
                        <div class="mb-3 form-floating">
                            <input type="text" class="form-control" name="first_name" id="inputFirstName" placeholder=" " autocomplete="given-name">
                            <label for="inputFirstName">Keresztnév</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="text" class="form-control" name="last_name" id="inputLastName" placeholder=" " autocomplete="family-name">
                            <label for="inputLastName">Vezetéknév</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input type="tel" class="form-control" name="phone_number" id="inputPhoneNumber" placeholder=" " autocomplete="tel">
                            <label for="inputPhoneNumber">Telefonszám</label>
                        </div>
                        <input type="number" name="total_price" id="total_price" class="visually-hidden" value="<?php echo $totalPrice; ?>">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Rendelés leadása</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
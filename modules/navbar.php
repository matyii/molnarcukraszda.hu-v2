<?php 
session_start();

function getCartItemCount() {
    $itemCount = 0;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $itemCount += $item['quantity'];
        }
    }

    return $itemCount;
}
?>
<nav class="navbar navbar-expand-lg border-bottom fixed-top bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Molnár Cukrászda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="bi bi-house-fill"></i> Főoldal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="products.php"><i class="bi bi-cake2-fill"></i> Termékek</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-person-fill"></i> Felhasználó</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item <?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ? 'd-none' : ''; ?>" href="login.php"><i class="bi bi-box-arrow-in-right"></i> Bejelentkezés</a>
                    <a class="dropdown-item <?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ? 'd-none' : ''; ?>" href="register.php"><i class="bi bi-person-fill-add"></i> Regisztráció</a>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        ?>
                        <a class="dropdown-item" href="user.php"><i class="bi bi-gear-fill"></i> Kezelés</a>
                        <a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left"></i> Kijelentkezés</a>
                        <?php
                    } else {
                    }
                    ?>
                    </div>
                </li>
                <?php
                    if (isset($_SESSION['username'])) {
                        include 'modules/database.php';
                        $username = $_SESSION['username'];
                        $sql = "SELECT permission_level FROM users WHERE username = '$username'";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $permission_level = $row['permission_level'];
                            if ($permission_level == 2) {
                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-person-fill-gear"></i> Admin</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="admin.php"><i class="bi bi-server"></i> Vezérlőpult</a>
                                        <a class="dropdown-item" href="manage.php"><i class="bi bi-people-fill"></i> Felhasználók</a>
                                        <a class="dropdown-item" href="orders.php"><i class="bi bi-basket2-fill"></i> Rendelések</a>
                                    </div>
                                </li>
                                <?php
                            }
                        } else {
                            echo "permission hiba";
                        }
                        $conn->close();
                    }
                    ?>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link"><i class="bi bi-person-lines-fill"></i> Elérhetőség</a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link">
                        <i class="bi bi-cart-fill"></i> Kosár (<?php echo getCartItemCount() ?>)
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
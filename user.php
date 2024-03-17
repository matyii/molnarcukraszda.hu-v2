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
    include 'functions/checklogin.php';
    include 'modules/navbar.php';
    include 'modules/database.php';
    ?>
    <div class="container pt-5 mb-5">
        <div class="row row-cols-sm-1">
            <?php
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $permissionLevel = $row['permission_level'];
            ?>
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="assets/img/avatar.jpg" style="width: 150px;" class="rounded-circle my-3">
                            <h3 class="card-title">Üdvözöljük, <?php echo $username; ?>!</h3>
                            <?php if ($permissionLevel == 0) { ?>
                                <span class="badge rounded-pill text-bg-primary">Vásárló</span>
                            <?php } elseif ($permissionLevel == 1) { ?>
                                <span class="badge rounded-pill text-bg-danger">Rendelés kezelő</span>
                            <?php } elseif ($permissionLevel == 2) { ?>
                                <span class="badge rounded-pill text-bg-info">Admin</span>
                            <?php } ?>
                            <div class="container my-3 d-flex flex-column">
                                <a href="logout.php" class="btn btn-danger"><i class="bi bi-box-arrow-left"></i> Kilépés</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
                echo "User data not found.";
            }
            ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Személyes adatok</h3>
                        <?php 
                        if (isset($_GET['namesuccess']) && $_GET['namesuccess'] == 'true') {
                            $message = "Személyes adatok sikeresen frissítve!";
                        }
                        ?>
                        <?php if (isset($message)): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>
                        <form action="functions/changeuserinfo.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="first_name" id="firstName" placeholder="Keresztnév">
                                <label for="firstName">Keresztnév</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Vezetéknév">
                                <label for="lastName">Vezetéknév</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone_number" id="phoneNumber" placeholder="Telefonszám">
                                <label for="phoneNumber">Telefonszám</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy2-fill"></i> Adatok mentése</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Jelszó megváltoztatása</h3>
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php if ($_GET['error'] == 'empty_fields'): ?>
                                    Minden mező kitöltése kötelező.
                                <?php elseif ($_GET['error'] == 'passwords_not_match'): ?>
                                    Az új jelszavak nem egyeznek meg.
                                <?php elseif ($_GET['error'] == 'current_password_not_match'): ?>
                                    A jelenlegi jelszó helytelen.
                                <?php endif; ?>
                            </div>
                        <?php elseif (isset($_GET['pwsuccess']) && $_GET['pwsuccess'] == 'true'): ?>
                            <div class="alert alert-success" role="alert">
                                A jelszó sikeresen frissítve.
                            </div>
                        <?php endif; ?>
                        <form action="functions/changepassword.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="current_password" id="currentPassword" placeholder="Jelenlegi jelszó">
                                <label for="currentPassword">Jelenlegi jelszó</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="new_password" id="newPassword" placeholder="Új jelszó">
                                <label for="newPassword">Új jelszó</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="confirm_new_password" id="confirmNewPassword" placeholder="Jelszó megerősítése">
                                <label for="confirmNewPassword">Jelszó megerősítése</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy2-fill"></i> Változtatások mentése</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
            <div class="card">
            <?php 
            include 'modules/database.php';
            if (isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $sql = "SELECT first_name, last_name FROM users WHERE id = $userId";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $userFirstName = $row['first_name'];
                    $userLastName = $row['last_name'];
                    $ordersSql = "SELECT o.id AS order_id, CONCAT(o.first_name, ' ', o.last_name) AS customer_name, o.items, o.price 
                                FROM orders o
                                WHERE o.first_name = '$userFirstName' AND o.last_name = '$userLastName'";
                    $ordersResult = $conn->query($ordersSql);

                    if (!$ordersResult) {
                        echo "Error: " . $ordersSql . "<br>" . $conn->error;
                    } else {
                        if ($ordersResult->num_rows > 0) {
                            echo '<div class="card-body">
                                    <h3 class="card-title">Rendelések</h3>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Rendelési szám</th>
                                                <th>Vásárló neve</th>
                                                <th>Termékek</th>
                                                <th>Ár</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                        while ($orderRow = $ordersResult->fetch_assoc()) {
                                            $itemsArray = json_decode($orderRow["items"], true);
                                            
                                            $itemDetails = array_map(function($item) {
                                                return $item['quantity'] . 'x ' . $item['name'];
                                            }, $itemsArray);
                                            
                                            $itemDetailsString = implode(', ', $itemDetails); 
                                            echo "<tr><td>" . $orderRow["order_id"] . "</td><td>" . $orderRow["customer_name"] . "</td><td>" . $itemDetailsString . "</td><td>" . $orderRow["price"] . "</td></tr>";
                                        }
                                        
                                        

                            echo '</tbody>
                                    </table>
                                </div>';
                        } else {
                            echo "<div class='card-body'>Nincsenek rendelések.</div>";
                        }
                    }
                } else {
                    echo "Nincs felhasználói adat a sessionben.";
                }
            } else {
                echo "A felhasználó nincs bejelentkezve.";
            }
            ?>
        </div>
            </div>
        </div>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</html>
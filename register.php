<?php
include 'modules/database.php';
include 'functions/register.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Molnár Cukrászda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/png">
</head>
<body>
    <?php include 'modules/navbar.php'; ?>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="mt-5 card col-md-5 col-12">
            <div class="card-body">
                <h2 class="card-title">Regisztráció</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <?php if (!empty($message)): ?>
                        <div class="alert <?php echo strpos($message, "Sikeres") !== false ? "alert-success" : "alert-danger"; ?>" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Felhasználónév">
                        <label for="username">Felhasználónév</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Jelszó">
                        <label for="password">Jelszó</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Jelszó megerősítése">
                        <label for="confirm_password">Jelszó megerősítése</label>
                    </div>
                    <div class="container text-center mb-3">
                        <p>Már van fiókja? <a href="login.php">Jelentkezzen be!</a></p>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-person-fill-add"></i> Regisztráció</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

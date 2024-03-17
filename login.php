<?php
include 'modules/database.php';
include 'functions/login.php';
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
    <?php include 'modules/navbar.php' ?>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="mt-5 card col-md-5 col-12">
            <div class="card-body">
                <h2 class="card-title">Bejelentkezés</h2>
                <?php if(isset($error)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username_email">
                        <label for="floatingInput">Email / Felhasználónév</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Jelszó</label>
                    </div>
                    <div class="container text-center">
                        <p>Nincs még fiókja? <a href="register.php">Regisztráljon!</a></p>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Bejelentkezés</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
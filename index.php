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
    <div class="container d-flex vh-100 align-items-center mt-5">
        <div class="row my-5">
            <div class="col-lg mb-5">
                <div id="stockImages" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#stockImages" data-bs-slide-to="0" class="active" aria-current="true"></button>
                        <button type="button" data-bs-target="#stockImages" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#stockImages" data-bs-slide-to="2"></button>
                        <button type="button" data-bs-target="#stockImages" data-bs-slide-to="3"></button>
                      </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="assets/img/stock/1.jpg" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="assets/img/stock/2.jpg" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="assets/img/stock/3.jpg" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="assets/img/stock/4.jpg" class="d-block w-100">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#stockImages" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#stockImages" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden"></span>
                    </button>
                  </div>   
            </div>
            <div class="col-lg text-center">
                <img src="assets/img/logo.png" width="150px" class="shadow-lg rounded-circle">
                <h1 class="fs-1">Üdvözöljük cukrászdánk weboldalán!</h1>
                <p>Kóstolja meg csodás édességeinket, melyek csak Önnek készültek!</p>
                <a href="products.php" class="btn btn-primary">Nézze meg termékeink!</a>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>
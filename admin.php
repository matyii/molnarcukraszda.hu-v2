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
    include 'functions/checkpermission.php';
    include 'modules/navbar.php';
    ?>
    <h1 class="fs-1 my-5 text-center pt-5">Admin kezelőfelület</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-4">
            <div class="card-body">
              <h2 class="card-title">Legutóbbi rendelések</h2>
            <?php
            include 'modules/database.php';
            $sql = "SELECT id, first_name, last_name, phone_number, items, price, order_date FROM orders LIMIT 7";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              echo '<div class="overflow-x-auto">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Rendelés azonosító</th>
                                <th>Név</th>
                                <th>Termék</th>
                                <th>Telefonszám</th>
                                <th>Ár</th>
                              </tr>
                            </thead>
                            <tbody>';
          
                            while ($row = $result->fetch_assoc()) {
                              $items = json_decode($row['items'], true);
                              $itemDetails = [];
                              foreach ($items as $item) {
                                  $itemDetails[] = $item['quantity'] . 'x ' . $item['name'];
                              }
                              $itemDetailsStr = implode(', ', $itemDetails);
                          
                              echo '<tr>
                                      <td>' . $row['id'] . '</td>
                                      <td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td>
                                      <td>' . $itemDetailsStr . '</td>
                                      <td>' . $row['phone_number'] . '</td>
                                      <td>' . $row['price'] . '</td>
                                    </tr>';
                          }
              echo '</tbody>
                    </table>
                  </div>
                </div>';
          } else {
              echo "Nincs találat";
          }
            $conn->close();
            ?>
              </div>
            </div>
            <div class="row justify-content-center">
                <div class="card mb-4">
                <?php
                include 'modules/database.php';
                $sql = "SELECT username, email, registration_date
                        FROM users
                        ORDER BY registration_date DESC
                        LIMIT 7";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<div class="card-body">
                              <h2 class="card-title">Legújabb felhasználók</h2>
                              <div class="overflow-x-auto">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Felhasználónév</th>
                                      <th>Email</th>
                                      <th>Regisztráció dátuma és időpontja</th>
                                    </tr>
                                  </thead>
                                  <tbody>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                                  <td>' . $row['username'] . '</td>
                                  <td>' . $row['email'] . '</td>
                                  <td>' . $row['registration_date'] . '</td>
                                </tr>';
                    }

                    echo '</tbody>
                              </table>
                            </div>
                          </div>';
                } else {
                    echo "Nincsenek új felhasználók.";
                }

                $conn->close();
                ?>
                  </div>
              </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
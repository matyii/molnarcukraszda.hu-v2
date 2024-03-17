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
    <div class="container">
        <div class="container mt-5">
            <h1 class="pt-5">Rendelések</h1>
        </div>
        <div class="overflow-x-auto">
        <?php
        include 'modules/database.php';

        $sql = "SELECT * FROM orders";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table table-striped my-5">
                    <thead>
                        <tr>
                            <th scope="col">Rendelés ID</th>
                            <th scope="col">Név</th>
                            <th scope="col">Telefonszám</th>
                            <th scope="col">Termék</th>
                            <th scope="col">Ár</th>
                            <th scope="col">Rendelés Dátuma</th>
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
                                <td>' . $row['phone_number'] . '</td>
                                <td>' . $itemDetailsStr . '</td>
                                <td>' . $row['price'] . '</td>
                                <td>' . $row['order_date'] . '</td>
                            </tr>';
                    }
                    
            echo '</tbody>
                </table>';
        } else {
            echo "Nincs találat";
        }
        $conn->close();
        ?>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
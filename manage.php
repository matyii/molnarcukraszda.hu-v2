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
            <h1 class="pt-5">Felhasználók</h1>
        </div>
        <div class="overflow-x-auto">
        <?php
            include 'modules/database.php';
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);  
            if ($result->num_rows > 0) {
                echo '<table class="table table-striped my-5">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Felhasználónév</th>
                                <th scope="col">Keresztnév</th>
                                <th scope="col">Vezetéknév</th>
                                <th scope="col">Telefonszám</th>
                                <th scope="col">Email cím</th>
                                <th scope="col">Regisztráció Dátuma</th>
                                <th scope="col">Engedély Szint</th>
                            </tr>
                        </thead>
                        <tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <th scope="row">' . $row['id'] . '</th>
                            <td>' . $row['username'] . '</td>
                            <td>' . $row['first_name'] . '</td>
                            <td>' . $row['last_name'] . '</td>
                            <td>' . $row['phone_number'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['registration_date'] . '</td>
                            <td>' . $row['permission_level'] . '</td>
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
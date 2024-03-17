<?php 
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $errors = [];
    if (empty($username)) {
        $errors[] = "Felhasználónév megadása kötelező";
    }
    if (empty($email)) {
        $errors[] = "Email cím megadása kötelező";
    }
    if (empty($password)) {
        $errors[] = "Jelszó megadása kötelező";
    }
    if ($password !== $confirm_password) {
        $errors[] = "A jelszavak nem egyeznek";
    }

    $check_username_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";

    $result_username = $conn->query($check_username_sql);
    $result_email = $conn->query($check_email_sql);

    if ($result_username->num_rows > 0) {
        $errors[] = "A felhasználónév már foglalt";
    }
    if ($result_email->num_rows > 0) {
        $errors[] = "Az email cím már regisztrálva van";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_sql = "INSERT INTO users (username, email, password, permission_level) VALUES ('$username', '$email', '$hashed_password', 0)";
        if ($conn->query($insert_sql) === TRUE) {
            $message = "Sikeres regisztráció";
        } else {
            $message = "Hiba: " . $insert_sql . "<br>" . $conn->error;
        }
    } else {
        foreach ($errors as $error) {
            $message .= $error . "<br>";
        }
    }
}

$conn->close();
?>
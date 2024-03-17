<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_email = $_POST["username_email"];
    $password = $_POST["password"];
    $check_user_sql = "SELECT * FROM users WHERE username = '$username_email' OR email = '$username_email'";
    $result = $conn->query($check_user_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION['loggedin'] = true;
            header("Location: user.php");
            exit();
        } else {
            $error = "Hibás felhasználónév vagy jelszó";
        }
    } else {
        $error = "Hibás felhasználónév vagy jelszó";
    }
    $conn->close();
}
?>
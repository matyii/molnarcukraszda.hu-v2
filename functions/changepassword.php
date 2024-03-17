<?php
session_start();
include '../modules/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["username"])) {
        header("Location: ../login.php");
        exit;
    }
    
    $username = $_SESSION["username"];
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $confirmNewPassword = $_POST["confirm_new_password"];
    
    if (empty($currentPassword) || empty($newPassword) || empty($confirmNewPassword)) {
        header("Location: ../user.php?error=empty_fields");
        exit;
    } elseif ($newPassword !== $confirmNewPassword) {
        header("Location: ../user.php?error=passwords_not_match");
        exit;
    }
    
    $checkPasswordQuery = "SELECT password FROM users WHERE username = '$username'";
    $result = $conn->query($checkPasswordQuery);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];
        
        if (password_verify($currentPassword, $storedPassword)) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updatePasswordQuery = "UPDATE users SET password = '$hashedPassword' WHERE username = '$username'";
            
            if ($conn->query($updatePasswordQuery) === TRUE) {
                header("Location: ../user.php?pwsuccess=true");
                exit;
            } else {
                header("Location: ../user.php");
                exit;
            }
        } else {
            header("Location: ../user.php?error=current_password_not_match");
            exit;
        }
    } else {
        header("Location: ../user.php");
        exit;
    }
    
    $conn->close();
}
?>

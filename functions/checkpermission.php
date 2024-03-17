<?php 
session_start();
include 'modules/database.php';
$username = $_SESSION['username'];
$sql = "SELECT `permission_level` FROM `users` WHERE username='$username'";
$result = $conn->query($sql);
$urls = array('admin.php', 'manage.php', 'orders.php');
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $permissionlevel = $row['permission_level'];
    $currentUrl = $_SERVER['REQUEST_URI'];
    $lastUrlPart = basename($currentUrl);
    if ($permissionlevel == 1 && $lastUrlPart !== 'orders.php') {
        header("Location: index.php");
        exit;
    } elseif ($permissionlevel == 0) {
        foreach ($urls as $url) {
            if (strpos($lastUrlPart, $url) !== false) {
                header("Location: index.php");
                exit;
            }
        }
    }
}
?>
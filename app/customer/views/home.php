<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ' . LOGIN_PAGE);
    exit();
}

require('../controllers/UserController.php');
require('../../../routes.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'logout') {
    logout();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hello,

    <form method="post" action="">
        <input type="hidden" name="action" value="logout">
        <button type="submit">Log out</button>
    </form>
</body>
</html>
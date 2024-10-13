<?php 
session_start();

require('../controllers/AuthController.php');
require('../../../routes.php');


if (isset($_SESSION['username'])) {
    header('Location: ' . HOME_PAGE);
    exit();
} elseif (isset($_COOKIE['username'])){
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['is_logged_in'] = true;
    header('Location: ' . HOME_PAGE);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $remember_me = isset($_POST['remember_me']) ? true : false;
    $error_message = login($_POST['username'], $_POST['password'], $remember_me);
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
    <form method="post" action="">
        <div>
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
        </div>

        <div>
            <input type="text" name="password" placeholder="Mật khẩu" required>
        </div>

        <div>
            <input type="checkbox" name="remember_me" id="remember_me">
            <label for="remember_me">Ghi nhớ đăng nhập</label>
        </div>

        <div>
            <button type="submit">Đăng nhập</button>
        </div>

        <div>
            hoặc
        </div>
    </form>

    <a href="<?php echo REGISTER_PAGE; ?>">
            <button>Đăng kí</button>
    </a>

    <div class="result">
        <?php 
        if (!empty($error_message)) {
            echo "<p>$error_message</p>";
        }
        ?>
    </div>
</body>
</html>
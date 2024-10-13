<?php 
require('../../../config/db.php');

function login($username, $password, $remember_me) {
    global $connection;

    if ($username !== '' && $password !== '') {
        try {
            $sql = 'SELECT * FROM customer WHERE username = :username' ; 
            $statement = $connection -> prepare($sql);
            $statement -> bindParam(':username', $username, PDO::PARAM_STR);
            $statement -> execute();

            if ($statement -> rowCount() > 0) {
                $row = $statement -> fetch(PDO::FETCH_ASSOC);

                if ($password == $row['password']) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['is_logged_in'] = true;

                    if ($remember_me) {
                        setcookie('username', $row['username'], time() + 120);
                    }

                    header("Location: " . HOME_PAGE);
                    exit();
                } else {
                    return 'Mật khẩu không đúng';
                }
            } else {
                return "Tên đăng nhập không tồn tại";
            }
        } catch (PDOException $e) {
            return "Lỗi truy vấn cơ sở dữ liệu: " . $e -> getMessage();
        }
    } else {
        return "Vui lòng nhập tên đăng nhập và mật khẩu";
    }
}

?>
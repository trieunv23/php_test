<?php 
require('../../../config/db.php');

function get_profile($userid) {
    global $connection;

    try {
        $sql = 'SELECT id, name, dob FROM customer WHERE id = :userid';
        $statement = $connection -> prepare($sql) ; 
        $statement -> bindParam(':userid', $userid, PDO::PARAM_STR);
        $statement -> execute();

        if ($statement -> rowCount() > 0) {
            $row = $statement -> fetch(PDO::FETCH_ASSOC);

            return (object) $row; 
        } else {
            return null;
        }
    } catch (PDOException $e) {
        echo "Lỗi truy vấn cơ sở dữ liệu" . $e -> getMessage();
        return null;
    }
}

function logout() {
    unset($_SESSION['username']);

    if (isset($_COOKIE['username'])) {
        setcookie('username', '', time() - 3600);
    }

    header('Location: '. LOGIN_PAGE);
}

?>  
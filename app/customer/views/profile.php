<?php 
session_start();

require('../modules/get_profile.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php") ;
    exit(); 
}

$userid = isset($_GET['userid']) ? $_GET['userid'] : null; 

if ($userid) {
    $user_profile = get_profile($userid) ; 
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
   <div>
        <?php 
        if (isset($user_profile)) {
            echo "<div>
                    <div>
                       Name: ". htmlspecialchars($user_profile -> name)."
                    </div>

                    <div>
                       Day of Birth: ". htmlspecialchars($user_profile -> dob)."
                    </div>
                  </div>";
        } else {
            echo "<div>
                <h2>404</h2>
            </div>";
        }
        
        ?>
   </div> 
</body>
</html>
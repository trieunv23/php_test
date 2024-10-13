<?php
require('../../app/Controllers/DashboardController.php');   

$customers = get_all_customer();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add_customer':
                add_customer($_POST['username'], $_POST['password'], $_POST['name'], $_POST['dob']);
                break;
            case 'delete_customer':
                delete_customer($_POST['id']);
                break;
            default:
               
                break;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>
    <h1>Customer List</h1>
    <table class="table" cellpadding = "10">
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Date of Birth</td>
                <td>Username</td>
                <td>Password</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            <?php if ($customers && count($customers) > 0) : ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($customer['id']); ?></td>
                        <td><?php echo htmlspecialchars($customer['name']); ?></td>
                        <td><?php echo htmlspecialchars($customer['dob']); ?></td>
                        <td><?php echo htmlspecialchars($customer['username']); ?></td>
                        <td><?php echo htmlspecialchars($customer['password']); ?></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="action" value="delete_customer">
                                <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No custome found</p>
            <?php endif; ?>

            <tr>
                <form action="" method="POST" style="display: inline">
                    <input type="hidden" name="action" value="add_customer">
                    <td>#</td>
                    <td><input type="text" name="name" class="input" require></td>
                    <td><input type="text" name="dob" class="input" require></td>
                    <td><input type="text" name="username" class="input" require></td>
                    <td><input type="text" name="password" class="input" require></td>
                    <td class="center"><button type="submit">Add</button></td>
                </form>
            </tr>

        </tbody>
    </table>
</body>
</html>
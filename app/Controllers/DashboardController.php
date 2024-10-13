<?php

require_once __DIR__ . '../../Models/CustomerModel.php';

function get_all_customer() {
    $customer_model = new CustomerModel();
    return $customer_model->get_all_customer();
}

function add_customer($username, $password, $name, $dob) {
    if (isset($username) && isset($password) && isset($name) && isset($dob)) {
        $customer_model = new CustomerModel();
        try {
            $customer_model -> add_customer($username, $name, $password, $dob) ; 
            header('Location: ../../view/admin/dashboard.php');
        } catch (\Throwable $th) {
            //throw $th;
        }
    } else {
        echo "Invalid request";
    }
}

function delete_customer($customer_id) {
    global $connection;

    if (isset($customer_id)) {
        $sql = 'DELETE FROM customer WHERE id = :id';
        $statement = $connection->prepare($sql);
        if ($statement->execute([':id' => $customer_id])) {
            header('Location: ' . ADMIN_DASHBOARD   );
        } else {
            echo "Error deleting costume";
        }
    } else {
        echo "Invalid request";
    }
}


?>
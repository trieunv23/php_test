<?php 

require_once ('../../config/Database.php');

class CustomerModel {
    private $connection;

    public function __construct() {
        $this->connection = Database::get_connection();
    }

    public function get_all_customer() {
        $statement = $this->connection->prepare('SELECT * FROM customer');
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function add_customer($username, $name, $password, $dob) {
        $statement = $this->connection->prepare('INSERT INTO customer (username, name, password, dob) VALUES (?, ?, ?, ?)');
        $statement -> bind_param("ssss", $username, $name, $password, $dob);
        return $statement->execute();
    }

    public function delete_customer($id) {
        $statement = $this->connection->prepare('DELETE FROM customer WHERE id = ?');
        $statement -> bind_param('i', $id);
        return $statement -> execute();
    }
}
?>
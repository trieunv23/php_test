<?php 
namespace App\Models;

class Customer {

    private $id;
    private $name;
    private $dob;

    public function __construct($id = null, $name = null, $dob = null) {
        $this -> id = $id;
        $name -> name = $name;
        $dob -> dob = $dob;
    }

    

}
?>

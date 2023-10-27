<?php

namespace App\Controller;

// Import necessary classes from respective namespaces.
use App\Db\DbBike as DbBike;
use App\Model\Bike;

//require_once(__DIR__."/../Model/bikes.php");
//require_once (__DIR__ . "/../View/HeadNavHeroView.php");


// Define the BikeCreateController class within the App\BikeCreateController namespace.
class BikeController
{
    private $db;

    // Method to execute the main logic of the application.
    public function __construct()
    {
        $user = "admin";
        $host = "127.0.0.1";
        $passwd = "12345";
        $database = "product";
        $this->db = new DbBike($host, $user, $passwd, $database);
    }

    public function Create(): void
    {
        require_once(__DIR__ . "/../View/BikeCreateView.php");
    }

    public function Post(): void
    {
        $bike_name = $_POST['bike_name'];
        $bike_price = $_POST['bike_price'];
        $id = $this->db->postBikeToDb($bike_name, $bike_price);
        $bike = $this->db->getBike($id);
        require_once(__DIR__ . "/../View/BikePostView.php");
    }

    public function Read(): void
    {
        require_once(__DIR__ . "/../View/BikeReadView.php");
    }
    public function Get(): void
    {
        $bike_id = $_GET['bike_id'];
        $bike = $this->db->searchBike($bike_id);
        require_once(__DIR__ . "/../View/BikeGetView.php");
    }

    public function Update(): void
    {
        require_once(__DIR__ . "/../View/BikeUpdateView.php");
    }
    public function Put(): void
    {
        $bike_id = $_GET['bike_id'];
        $bike_price = $_GET['bike_price'];
        $bike = $this->db->updateBikePrice($bike_id, $bike_price);
        $body=json_encode($bike);
        header('Content-Type: application/json; charset=utf-8');
        echo $body;
    }

}

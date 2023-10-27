<?php

namespace App\Db;
use App\Db\Db as Db;
use App\Model\Bike;

require_once(__DIR__ . "/../Db/Db.php");

class DbBike extends Db
{
    public function getBikes(): array
    {
        $sql = "SELECT * FROM bike";
        $result = $this->conn->query($sql);
        $bikes = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bike = new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);
                $bikes[] = $bike;
            }
        }

        return $bikes;
    }

    public function getBike(int|string $id): Bike
    {
        $sql = "SELECT * FROM bike WHERE bike_id='$id'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);
    }


    public function postBikeToDb($bike_name, $bike_price): int|string
    {
        $sql = "INSERT INTO bike (bike_name,bike_price) VALUES ('$bike_name','$bike_price')";
        $this->conn->query($sql);
        return $this->conn->insert_id;
    }

    public function searchBike($bike_id): Bike
    {
        $sql = "SELECT * FROM bike WHERE bike_id='$bike_id'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);
    }

    public function updateBikePrice($bike_name, $bike_price): Bike
    {
        $sql = "UPDATE bike SET bike_price = '$bike_price' WHERE bike_name = '$bike_name'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);
    }
}
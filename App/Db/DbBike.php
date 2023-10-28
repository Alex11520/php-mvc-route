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

//    public function searchBike($bike_id): Bike
//    {
//        //get all bike id from table
//        $idResult = $this->conn->query("SELECT bike_id FROM bike");
//        //check if the input bike id exist
//        if (in_array($bike_id, (array)$idResult)) {
//            // exist
//            //query the table and get the bike info
//            $sql = "SELECT * FROM bike WHERE bike_id='$bike_id'";
//            $result = $this->conn->query($sql);
//            $row = $result->fetch_assoc();
//            return new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);
//        } else {
//            // not exist show error page
//            require_once __DIR__ . '/../View/ErrorPage.php';
//            return new Bike('', '', '');
//        }
//
//    }
    public function searchBike($bike_id): Bike
    {
            $sql = "SELECT * FROM bike WHERE bike_id='$bike_id'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);
    }

//    public function updateBikePrice($bike_id, $bike_price): Bike
//    {
//        //get all bike id from table
//        $idResult = $this->conn->query("SELECT bike_id FROM bike");
//        //check if the input bike id exist
//        if (in_array($bike_id, (array)$idResult)) {
//            // exist
//            $sql = "UPDATE bike SET bike_price = '$bike_price' WHERE bike_id = '$bike_id'";
//            $this->conn->query($sql);
//            $result = $this->conn->query("SELECT * FROM bike WHERE bike_id='$bike_id'");
//            $row = $result->fetch_assoc();
//            return new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);
//        } else {
//            // not exist show error page
//            require_once __DIR__ . '/../View/ErrorPage.php';
//            return new Bike('', 'err', '');
//        }
//    }

    public function updateBikePrice($bike_id, $bike_price): Bike
    {
            $sql = "UPDATE bike SET bike_price = '$bike_price' WHERE bike_id = '$bike_id'";
            $this->conn->query($sql);
            $result = $this->conn->query("SELECT * FROM bike WHERE bike_id='$bike_id'");
            $row = $result->fetch_assoc();
            return new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);
    }

    public function deleteBike($bike_id): void
    {
        $sql = "DELETE FROM bike WHERE bike_id='$bike_id'";
        $this->conn->query($sql);
//        $result = $this->conn->query(SELECT * FROM bike)
    }

    public function showAllBikes(): void
    {
        echo "<table>";
        $result = $this->conn->query("SELECT * FROM bike");
        while($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo "<td style=\"width: 50px;\">".$row['bike_id']."</td>";
            echo "<td style=\"width: 150px;\">".$row['bike_name']."</td>";
            echo "<td style=\"width: 50px;\">".$row['bike_price']."</td>";
            echo "</tr>";
            echo PHP_EOL;
        }
    }
}
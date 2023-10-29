<?php

namespace App\Db;

use App\Db\Db as Db;
use App\Model\Bike;
use Exception;
use mysqli_result;

// Include the Db class
require_once(__DIR__ . "/../Db/Db.php");

// DbBike class inherits from Db class
class DbBike extends Db
{
    // Function to get all bikes from the database
    public function getBikes(): array
    {
        // SQL query to select all bikes
        $sql = "SELECT * FROM bike";
        // Execute the query
        $result = $this->conn->query($sql);
        // Initialize an empty array to hold Bike objects
        $bikes = array();

        // Loop through each returned row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Create Bike object from the row data
                $bike = new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);
                // Add Bike object to array
                $bikes[] = $bike;
            }
        }

        // Return array of Bike objects
        return $bikes;
    }

    // Function to get a specific bike by id
    public function getBike(int|string $id): Bike
    {
        // SQL query to select bike by id
        $sql = "SELECT * FROM bike WHERE bike_id='$id'";
        // Execute the query
        $result = $this->conn->query($sql);
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();
        // Return a new Bike object
        return new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);
    }

    // Function to insert a new bike into the database
    public function postBikeToDb($bike_name, $bike_price): int|string
    {
        // SQL query to insert new bike
        $sql = "INSERT INTO bike (bike_name,bike_price) VALUES ('$bike_name','$bike_price')";
        // Execute the query
        $this->conn->query($sql);
        // Return the last inserted id
        return $this->conn->insert_id;
    }

    // Function to search for a bike by id
    public function searchBike($bike_id): array|false|null
    {
        // SQL query to select bike by id
        $sql = "SELECT * FROM bike WHERE bike_id='$bike_id'";
        // Execute the query
        $result = $this->conn->query($sql);
        // Return the result as an associative array
        return $result->fetch_assoc();
    }

    // Function to update the price of a bike by id
    public function updateBikePrice($bike_id, $bike_price): array|false|null
    {
        // SQL query to update bike price
        $sql = "UPDATE bike SET bike_price = '$bike_price' WHERE bike_id = '$bike_id'";
        // Execute the query
        $this->conn->query($sql);
        // Fetch the updated bike to verify the update
        $result = $this->conn->query("SELECT * FROM bike WHERE bike_id='$bike_id'");
        // Return the result as an associative array
        return $result->fetch_assoc();
    }

    // Function to delete a bike by id
    public function deleteBike($bike_id): bool
    {
        // SQL query to delete bike by id
        $sql = "DELETE FROM bike WHERE bike_id='$bike_id'";
        // Execute the query and return the result
        return $this->conn->query($sql);
    }

    // Function to show all bikes in an HTML table
    public function showAllBikes(): void
    {
        // Begin table HTML
        echo "<table>";
        // Query to select all bikes
        $result = $this->conn->query("SELECT * FROM bike");
        // Loop through each row
        while ($row = $result->fetch_assoc()) {
            // Output each row as an HTML table row
            echo "<tr>";
            echo "<td style=\"width: 50px;\">" . $row['bike_id'] . "</td>";
            echo "<td style=\"width: 150px;\">" . $row['bike_name'] . "</td>";
            echo "<td style=\"width: 50px;\">" . $row['bike_price'] . "</td>";
            echo "</tr>";
            // Output a new line for better readability in HTML source
            echo PHP_EOL;
        }
    }
}

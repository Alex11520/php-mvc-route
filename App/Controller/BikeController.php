<?php

namespace App\Controller;

// Import necessary classes from respective namespaces.
use App\Db\DbBike as DbBike;
use App\Model\Bike;
use Exception;


// Define the BikeCreateController class within the App\BikeCreateController namespace.
class BikeController
{
    private $db;

    // Method to execute the main logic of the application.
    //construct a connection to database
    public function __construct()
    {
        //prams for connection
        $user = "admin";
        $host = "127.0.0.1";
        $passwd = "12345";
        $database = "product";
        //new connection
        $this->db = new DbBike($host, $user, $passwd, $database);
    }

    //function that direct to BikeCreateView
    public function Create(): void
    {
        //redirect to the page that getting the info of the to be created new bike
        require_once(__DIR__ . "/../View/BikeCreateView.php");
    }

    /**
     * @throws Exception
     */
    //function that add new bike to database
    public function Post(): void
    {
        // Retrieve the bike name and price from the POST request
        $bike_name = $_POST['bike_name'];
        $bike_price = $_POST['bike_price'];

        // Check for invalid bike price (less than 0)
        if ($bike_price < 0) {
            // Throw an exception with message "Invalid price" and error code 400
            throw new Exception("Invalid price", 400);
        }

        // Insert the bike into the database and retrieve the ID of the inserted record
        $id = $this->db->postBikeToDb($bike_name, $bike_price);

        // Retrieve the bike data from the database using the ID
        $bike = $this->db->getBike($id);

        // Set the HTTP response code to 201 (Created)
        http_response_code(201);

        // Include the BikePostView.php file to render the output
        require_once(__DIR__ . "/../View/BikePostView.php");
    }

    public function Read(): void
    {
        //redirect to the page that getting the name of the bike you want to search
        require_once(__DIR__ . "/../View/BikeReadView.php");
    }

    /**
     * @throws Exception
     */
    // Define the Get method
    public function Get(): void
    {
        // Retrieve the bike_id from the GET request
        $bike_id = $_GET['bike_id'];

        // Search for the bike in the database
        $row = $this->db->searchBike($bike_id);

        // If no bike is found, throw a 404 exception
        if ($row == null) {
            throw new Exception("No bike found", 404);
        }

        // Create a new Bike object with the retrieved data
        $bike = new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);

        // Include the BikeGetView.php to render the view
        require_once(__DIR__ . "/../View/BikeGetView.php");
    }

// Define the Update method
    public function Update(): void
    {
        // Include the BikeUpdateView.php to render the view
        require_once(__DIR__ . "/../View/BikeUpdateView.php");
    }

// Define the Put method
    public function Put(): void
    {
        // Retrieve the bike_id and bike_price from the GET request
        $bike_id = $_GET['bike_id'];
        $bike_price = $_GET['bike_price'];

        // Validate the bike price
        if ($bike_price < 0) {
            throw new Exception("Invalid price", 400);
        }

        // Update the bike price in the database
        $row = $this->db->updateBikePrice($bike_id, $bike_price);

        // If no bike is found for update, throw a 404 exception
        if ($row == null) {
            throw new Exception("No bike found", 404);
        }

        // Create a new Bike object with the updated data
        $bike = new Bike($row['bike_id'], $row['bike_name'], $row['bike_price']);

        // Encode the Bike object to JSON
        $body = json_encode($bike);

        // Set the Content-Type to JSON
        header('Content-Type: application/json; charset=utf-8');

        // Output the JSON body
        echo $body;
    }

// Define the Remove method
    public function Remove(): void
    {
        // Include the BikeRemoveView.php to render the view
        require_once(__DIR__ . "/../View/BikeRemoveView.php");
    }

// Define the Delete method
    public function Delete(): void
    {
        // Retrieve the bike_id from the GET request
        $bike_id = $_GET['bike_id'];

        // Set the Content-Type to JSON
        header('Content-Type: application/json; charset=utf-8');

        // Delete the bike from the database
        $this->db->deleteBike($bike_id);

        // Set the HTTP status code to 200 (OK)
        http_response_code(200);
    }

// Define the Display method
    public function Display(): void
    {
        // Show all bikes from the database
        $this->db->showAllBikes();
    }
}
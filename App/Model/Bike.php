<?php

// Declare namespace to logically group classes
namespace App\Model;

// Define the Bike class
class Bike
{
    // Declare properties for the Bike object
    public $bike_id;
    public $bike_name;
    public $bike_price;

    // Constructor method to initialize a Bike object
    public function __construct($bike_id, $bike_name, $bike_price)
    {
        // Initialize the bike_id property
        $this->bike_id = $bike_id;
        // Initialize the bike_name property
        $this->bike_name = $bike_name;
        // Initialize the bike_price property
        $this->bike_price = $bike_price;
    }
}

<?php

namespace App\Model;

class Bike
{
    public $bike_id;
    public $bike_name;
    public $bike_price;

    public function __construct($bike_id, $bike_name, $bike_price)
    {
        $this->bike_name = $bike_name;
        $this->bike_price = $bike_price;
        $this->bike_id = $bike_id;
    }
}
<?php

namespace App\Controller;

class HomeController
{
    //direct to home page
    public function Get(): void{
        require_once (__DIR__ . "/../View/HomeView.php");
    }
}
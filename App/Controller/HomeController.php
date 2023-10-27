<?php

namespace App\Controller;

class HomeController
{
    public function Get(): void{
        require_once (__DIR__ . "/../View/HomeView.php");
    }
}
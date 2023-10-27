<?php

namespace App\Controller;

class ErrorController
{
    public function Get(): void{
        require_once (__DIR__ . "/../View/ErrorPage.php");
    }
}
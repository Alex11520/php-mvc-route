<?php

namespace App\Db;

use mysqli;

class Db
{
    /** The database connection */
    public mysqli $conn;

    /** Constructor creates the connection. */
    public function __construct($host,$user,$passwd,$database)
    {
        $this->conn = new mysqli($host, $user, $passwd, $database);
        if ($this->conn -> connect_error)
        {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }



    /** Destructor destroys the connection. */
    public function __destruct()
    {
        $this->conn->close();
    }
}


<?php

class bd
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli("localhost", "root", "", "proyecto");
        if ($this->mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
            exit();
        }
    }

    public function query($sql)
    {
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $result->free_result();
        $this->mysqli->close();
        return $row;
    }

    public function insert($sql)
    {
        $this->mysqli->query($sql);
        return true;
    }
}

<?php

class Imone
{
    //DB stuff
    private $conn;
    private $table = 'imones';
    //Imone properties
    public $code;
    public $jarCode;
    public $name;
    public $month;
    public $avgWage;
    public $avgWage2;
    public $numInsured;
    public $tax;
    public $ecoActName;
    public $ecoActCode;
    public $municipality;

    public $path;
    //Constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function search_by_name()
    {
        //Create querry
        $query = "SELECT * from " . $this->table . " WHERE name = '" . $this->name . "'";

        $stmt = $this->conn->prepare($query);
        //Execute
        if ($stmt->execute()) {
            http_response_code(200);
        } else {
            //print error
            http_response_code(400);
            die();
        }
        return $stmt;

        //Set properties

    }

    public function search_by_code()
    {
        //Create querry
        $query = "SELECT * from " . $this->table . " WHERE code = '" . $this->code . "'";

        $stmt = $this->conn->prepare($query);
        //Execute
        if ($stmt->execute()) {
            http_response_code(200);
        } else {
            //print error
            http_response_code(400);
            die();
        }
        return $stmt;

        //Set properties

    }

    public function load_table()
    {
        $query = "LOAD DATA INFILE '" . $this->path . "'
        REPLACE INTO TABLE imones
        FIELDS TERMINATED BY ';'
        OPTIONALLY ENCLOSED BY '\"'
        LINES TERMINATED BY '\n'
        IGNORE 1 LINES;
        ";

        $stmt = $this->conn->prepare($query);

        //Execute
        if ($stmt->execute()) {
            http_response_code(200);
        } else {
            //print error
            http_response_code(400);
            die();
        }
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table;
        $stmt = $this->conn->prepare($query);

        //Execute
        if ($stmt->execute()) {
            http_response_code(200);
        } else {
            //print error
            http_response_code(400);
            die();
        }
    }
}

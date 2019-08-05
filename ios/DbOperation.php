<?php

class DbOperation
{
  private $conn;

     //Constructor
     function __construct()
     {
         require_once dirname(__FILE__) . '/Config.php';
         require_once dirname(__FILE__) . '/DbConnect.php';
         // opening db connection
         $db = new DbConnect();
         $this->conn = $db->connect();
     }

    //Function to create a new user
    //this method will return all the teams in the database

    public function getAllTeams(){
        $stmt = $this->conn->prepare("SELECT * FROM example_table");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}

?>

<?php

    class Type_and_rate
    {
        private $conn;
        public $id;
        public $type;
        public $rate;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function read() 
        {
            $query = 'SELECT * FROM tbl_type_and_rate';
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function store()
        {
            $query = '
                INSERT INTO tbl_type_and_rate
                SET type=:type, rate=:rate
            ';
            $stmt = $this->conn->prepare($query);
            $this->type    =   htmlspecialchars(strip_tags($this->type));
            $this->rate    =   htmlspecialchars(strip_tags($this->rate));
            $stmt->bindParam(':type', $this->type);
            $stmt->bindParam(':rate', $this->rate);
            if ($stmt->execute()) {
                return array(
                    "status"    =>  'true',
                    "message"   =>  "Added Successfully!"
                );
            } else {
                return array(
                    "status" => 'false',
                    "message"=> "Error adding new data!"
                );
            }
        }

        public function destroy()
        {
            $query = '
                DELETE FROM tbl_type_and_rate
                WHERE id=:id
            ';
            $stmt = $this->conn->prepare($query);
            $this->id    =   htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id', $this->id);
            if ($stmt->execute()) {
                return array(
                    "status"    =>  'true',
                    "message"   =>  "Deleted Successfully!"
                );
            } else {
                return array(
                    "status" => 'false',
                    "message"=> "Error deleted data!"
                );
            }
        }
    }
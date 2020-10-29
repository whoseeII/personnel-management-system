<?php

    class User
    {
        private $conn;
        public $username;
        public $password;

        public $id;
        public $fullname;
        public $type;
        public $rate;
        public $address;
        public $gender;
        public $marital;
        public $email;
        public $mobile;
        public $join_date;
        public $photo;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        // user login
        public function user_login()
        {
            $query = '
                SELECT password , id, username, role, employee_id
                FROM tbl_user 
                WHERE username=:username
                LIMIT 1
            ';
            $stmt = $this->conn->prepare($query);
            $this->username   =   htmlspecialchars(strip_tags($this->username));
            $this->password   =   htmlspecialchars(strip_tags($this->password));
            $stmt->bindParam(':username', $this->username);
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    password_verify($this->password, $row['password']) ? $pass = true : $pass = false;
                    return array(
                        "status" => $pass,
                        "data"   => array(
                            "username"  =>  $row['username'],
                            "id"        =>  $row['id'],
                            "role"      =>  $row['role'],
                            "employee_id"=> $row['employee_id']
                        )
                    );
                } else {
                    return array(
                        "status" => false
                    );
                }
            } else {
                return array(
                    "status" => false
                );
            }
        }
        // user login


        public function user_register() {
            date_default_timezone_set("Asia/Manila");
            $current_date = date("Y-m-d H:i:s");
            $query = '
                INSERT INTO users
                SET fullname=:fullname, username=:username, password=:password, created_at=:created_at, status=:status
            ';
            $stmt = $this->conn->prepare($query);
            $this->fullname    =   htmlspecialchars(strip_tags($this->fullname));
            $this->username    =   htmlspecialchars(strip_tags($this->username));
            $this->password    =   htmlspecialchars(strip_tags($this->password));
            $stmt->bindParam(':fullname', $this->fullname);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', password_hash($this->password, PASSWORD_DEFAULT));
            $stmt->bindParam(':created_at', $current_date);
            $stmt->bindParam(':status', $status = '0'); 
            if ($stmt->execute()) {
                return array(
                    "status"    =>  true,
                    "message"   =>  "Register complete. Please wait for admin confirmation."
                );
            } else {
                return array(
                    "status" => false,
                    "message"=> "Register error. Please contact system maintenance."
                );
            }
        }


        public function profile()
        {
            $query = '
                SELECT * FROM tbl_employee
                WHERE id=:id
            ';
            $stmt = $this->conn->prepare($query);
            $this->id    =   htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            return $stmt;
        }

        public function account_update() 
        {
            $query = '
                    UPDATE tbl_user
                    SET username=:username, password=:password
                    WHERE id=:id
                ';
            $stmt = $this->conn->prepare($query);
            $this->id    =   htmlspecialchars(strip_tags($this->id));
            $this->username    =   htmlspecialchars(strip_tags($this->username));
            $this->password    =   htmlspecialchars(strip_tags($this->password));
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', password_hash($this->password, PASSWORD_DEFAULT));
            if ($stmt->execute()) {
                return array(
                    "status"    =>  'true',
                    "message"   =>  "Updated Succesfully!"
                );
            } else {
                return array(
                    "status"    =>  'false',
                    "message"   =>  "Error updating data!"
                );
            }
        }

    }
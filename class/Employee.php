<?php

    class Employee
    {
        private $conn;
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
        public $photo_cont;
        public $username;
        public $password;

        public function __construct($db)
        { //function for initializing database connection
            $this->conn = $db;
        }

        public function read() 
        {//retrieving all employee from database
            $query = 'SELECT * FROM tbl_employee';
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function employee_view(){
            $query = 'SELECT * FROM tbl_employee WHERE id=:id';
            $stmt = $this->conn->prepare($query);
            $this->id    =   htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            return $stmt;
        }

        public function store()
        { //adding new employee function
            $query = '
                INSERT INTO tbl_employee
                SET fullname=:fullname, type=:type, rate=:rate, address=:address, gender=:gender, marital=:marital, email=:email, mobile=:mobile, join_date=:join_date, photo=:photo
            ';
            $stmt = $this->conn->prepare($query);
            $this->fullname     =   htmlspecialchars(strip_tags($this->fullname));
            $this->type         =   htmlspecialchars(strip_tags($this->type));
            $this->rate         =   htmlspecialchars(strip_tags($this->rate));
            $this->address      =   htmlspecialchars(strip_tags($this->address));
            $this->gender       =   htmlspecialchars(strip_tags($this->gender));
            $this->marital      =   htmlspecialchars(strip_tags($this->marital));
            $this->email        =   htmlspecialchars(strip_tags($this->email));
            $this->mobile       =   htmlspecialchars(strip_tags($this->mobile));
            $this->join_date    =   htmlspecialchars(strip_tags($this->join_date));
            $this->photo        =   $this->prepare_photo();
            $this->photo == 'data:image/;base64,' ? '':null;
            $stmt->bindParam(':fullname', $this->fullname);
            $stmt->bindParam(':type', $this->type);
            $stmt->bindParam(':rate', $this->rate);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':marital', $this->marital);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':mobile', $this->mobile);
            $stmt->bindParam(':join_date', $this->join_date);
            $stmt->bindParam(':photo', $this->photo);
            if ($stmt->execute()) {
                return $this->register_user($this->conn->lastInsertId(), $this->email);
            } else {
                return array(
                    "status" => 'false',
                    "message"=> "Error adding new data!"
                );
            }
        }

        public function update()
        { //updating employee function
            
            if($this->photo_cont['size'] > 0) {
                $query = '
                    UPDATE tbl_employee
                    SET fullname=:fullname, type=:type, rate=:rate, address=:address, gender=:gender, marital=:marital, email=:email, mobile=:mobile, join_date=:join_date, photo=:photo
                    WHERE id=:id
                ';

                $stmt = $this->conn->prepare($query);
                $this->fullname     =   htmlspecialchars(strip_tags($this->fullname));
                $this->type         =   htmlspecialchars(strip_tags($this->type));
                $this->rate         =   htmlspecialchars(strip_tags($this->rate));
                $this->address      =   htmlspecialchars(strip_tags($this->address));
                $this->gender       =   htmlspecialchars(strip_tags($this->gender));
                $this->marital      =   htmlspecialchars(strip_tags($this->marital));
                $this->email        =   htmlspecialchars(strip_tags($this->email));
                $this->mobile       =   htmlspecialchars(strip_tags($this->mobile));
                $this->join_date    =   htmlspecialchars(strip_tags($this->join_date));
                $this->id    =   htmlspecialchars(strip_tags($this->id));
                $this->photo        =   $this->prepare_photo();
                $this->photo == 'data:image/;base64,' ? '':null;

                
                $stmt->bindParam(':fullname', $this->fullname);
                $stmt->bindParam(':type', $this->type);
                $stmt->bindParam(':rate', $this->rate);
                $stmt->bindParam(':address', $this->address);
                $stmt->bindParam(':gender', $this->gender);
                $stmt->bindParam(':marital', $this->marital);
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':mobile', $this->mobile);
                $stmt->bindParam(':join_date', $this->join_date);
                $stmt->bindParam(':photo', $this->photo);
                $stmt->bindParam(':id', $this->id);
            } else {
                $query = '
                    UPDATE tbl_employee
                    SET fullname=:fullname, type=:type, rate=:rate, address=:address, gender=:gender, marital=:marital, email=:email, mobile=:mobile, join_date=:join_date
                    WHERE id=:id
                ';

                $stmt = $this->conn->prepare($query);
                $this->fullname     =   htmlspecialchars(strip_tags($this->fullname));
                $this->type         =   htmlspecialchars(strip_tags($this->type));
                $this->rate         =   htmlspecialchars(strip_tags($this->rate));
                $this->address      =   htmlspecialchars(strip_tags($this->address));
                $this->gender       =   htmlspecialchars(strip_tags($this->gender));
                $this->marital      =   htmlspecialchars(strip_tags($this->marital));
                $this->email        =   htmlspecialchars(strip_tags($this->email));
                $this->mobile       =   htmlspecialchars(strip_tags($this->mobile));
                $this->join_date    =   htmlspecialchars(strip_tags($this->join_date));
                $this->id    =   htmlspecialchars(strip_tags($this->id));

                
                $stmt->bindParam(':fullname', $this->fullname);
                $stmt->bindParam(':type', $this->type);
                $stmt->bindParam(':rate', $this->rate);
                $stmt->bindParam(':address', $this->address);
                $stmt->bindParam(':gender', $this->gender);
                $stmt->bindParam(':marital', $this->marital);
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':mobile', $this->mobile);
                $stmt->bindParam(':join_date', $this->join_date);
                $stmt->bindParam(':id', $this->id);

            }


            if ($stmt->execute()) {
                return array(
                    "status" => 'true',
                    "message"=> "Employee data updated successfully!"
                );
            } else {
                return array(
                    "status" => 'false',
                    "message"=> "Error updating new data!"
                );
            }

        }

        public function register_user($id, $username) 
        { //register user function
            $query = '
                    INSERT INTO tbl_user
                    SET username=:username, password=:password, role=:role, employee_id=:employee_id
            ';
            $role =2;
            $stmt = $this->conn->prepare($query);
            $this->username    =   htmlspecialchars(strip_tags($username));
            $this->password    =   htmlspecialchars(strip_tags($username));
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', password_hash($this->password, PASSWORD_DEFAULT));
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':employee_id', $id); 
            if ($stmt->execute()) {
                return array(
                    "status"    =>  'true',
                    "message"   =>  "Added Succesfully!"
                );
            }
        }

        public function prepare_photo() 
        { //preparing photo to upload in assets/dist/img/ path
            
            $name = $this->photo_cont['name'];
            $target_dir = "C:/xampp/htdocs/personnel-management-system/assets/dist/img/";
            $target_file = $target_dir . basename($this->photo_cont["name"]);

            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $image_base64 = base64_encode(file_get_contents($this->photo_cont['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            move_uploaded_file($this->photo_cont['tmp_name'],$target_dir.$name);

            return $image;
        }

        public function destroy()
        { //deleting employee function
            $query = '
                DELETE FROM tbl_employee
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
                    "message"=> "Error deleting data!"
                );
            }
        }

        
    }
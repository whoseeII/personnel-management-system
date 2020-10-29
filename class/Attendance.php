<?php

    class Attendance
    {
        private $conn;
        public $employee_id;
        public $date;
        public $mark;
        public $fullname;
        public $time;
        public $id;

        public function __construct($db)
        { //function for initializing database connection
            $this->conn = $db;
        }

        public function read() 
        {//retrieving all employee from database
            $query = '
            SELECT a.*, e.fullname FROM tbl_attendance a
            LEFT JOIN tbl_employee e
            ON e.id = a.employee_id
            WHERE a.date=:date
            ORDER BY a.date DESC
                ';
            
            $stmt = $this->conn->prepare($query);
            $this->date         =   htmlspecialchars(strip_tags($this->date));
            $stmt->bindParam(':date', $this->date);
            $stmt->execute();
            return $stmt;
        }


        public function store()
        { //adding new attendance function
            $is_duplicate = $this->is_duplicate();
            if($is_duplicate['status'])
            {
                $query = '
                    INSERT INTO tbl_attendance
                    SET employee_id=:employee_id, mark=:mark, date=:date
                ';
                $stmt = $this->conn->prepare($query);
                $this->employee_id     =   htmlspecialchars(strip_tags($this->employee_id));
                $this->mark         =   htmlspecialchars(strip_tags($this->mark));
                $this->date         =   htmlspecialchars(strip_tags($this->date));
            
                $stmt->bindParam(':employee_id', $this->employee_id);
                $stmt->bindParam(':mark', $this->mark);
                $stmt->bindParam(':date', $this->date);

                if ($stmt->execute()) {
                    return array(
                        "status" => 'true',
                        "message"=> "New attendance added successfully!"
                    );
                } else {
                    return array(
                        "status" => 'false',
                        "message"=> "Error adding new data!"
                    );
                }
            }
            else
            {
                return array(
                    "status"    =>  'false',
                    "message"   =>  $is_duplicate['message']
                );
            }
        }

        public function is_duplicate()
        {
            $query = '
                SELECT * from tbl_attendance
                WHERE employee_id=:employee_id and date=:date
            ';
            $stmt = $this->conn->prepare($query);
            $this->employee_id     =   htmlspecialchars(strip_tags($this->employee_id));
            $this->date     =   htmlspecialchars(strip_tags($this->date));
            $stmt->bindParam(':employee_id', $this->employee_id);
            $stmt->bindParam(':date', $this->date);
            $stmt->execute();
            $num = $stmt->rowCount();
            if ($num > 0) {
                return array(
                    "status" => false,
                    "message"=> "Duplicated!"
                );
            } else {
                return array(
                    "status" => true
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
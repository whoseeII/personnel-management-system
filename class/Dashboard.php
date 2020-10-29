<?php

    class Dashboard
    {
        private $conn;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function total($table, $type) {
            switch ($table) {
                case 'stocks':
                    $query = '
                        SELECT SUM(quantity) AS total
                        FROM '.$table;
                    break;

                case '___stocks_action':
                    $query = '
                        SELECT SUM(quantity) AS total
                        FROM '.$table.'
                        WHERE action = \''.$type.'\'';
                    break;
                
                default:
                    $query = '
                        SELECT COUNT(id) AS total
                        FROM '.$table;
                    break;
            }
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total'];
        }
    }
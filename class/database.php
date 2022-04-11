<?php
// q6=X5EQwjuvrZUNk
    class Database{

        public $conn;
        public $table;
        public $order;
        
        public function getConnect():void{
            $conn = MySQLi_connect("localhost","atmr_user","tqVgK4RY.i/Cjr-T","animal_comp");
            MySQLi_Set_Charset($conn,"utf8");
            $this->conn = $conn;
        }
    }

?>
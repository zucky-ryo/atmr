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

        public function getAllData($where=1){
            $sql = sprintf("select * from %s where %s order by %s;",$this->table,$where,$this->order);
            $res = mysqli_query($this->conn,$sql);
            while($row = mysqli_fetch_assoc($res)){
                $datas[] = $row;
            }
            return $datas;
        }
    }

?>
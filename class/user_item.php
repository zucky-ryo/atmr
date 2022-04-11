<?php
    require_once __DIR__.'/../class/database.php';

    class UserItem extends Database{
        public $user_id;
        public $item_id;
        public $guest_id;

        public function __construct(){
            $this->getConnect();
            $this->table = "user_item_relations";
            $this->order = "user_id ASC";
        }

        public function checkItem($user_id,$item_id){
            $sql = sprintf("select * from user_item_relations where item_id='%d' and (user_id='%d' or guest_id='%s');",$item_id,$user_id,$user_id);
            $res = mysqli_query($this->conn,$sql);
            $row = mysqli_num_rows($res);
            if($row == 0){
                $result = 0;
                if(strpos($user_id,'g') !== false){
                    $column = "item_id,guest_id";
                }else{
                    $column = "item_id,user_id";
                }
                $sql = sprintf("insert into user_item_relations (%s) values ('%d','%s')",$column,$item_id,$user_id);
                $res =  mysqli_query($this->conn,$sql);
            }else{
                $result = 1;
                $sql = sprintf("delete from user_item_relations where item_id='%d' and (user_id='%d' or guest_id='%s');",$item_id,$user_id,$user_id);
                $res = mysqli_query($this->conn,$sql);
            }
            if(!$res){
                $result = false;
            }
            return $result;
        }
    }


?>
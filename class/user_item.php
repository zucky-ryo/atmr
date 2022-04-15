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
            
            $value = "";
            $ck_sql = sprintf("select id from items where img = (select img from items where id='%d');",$item_id);
            $ck_res = mysqli_query($this->conn,$ck_sql);
            $ck_row = mysqli_num_rows($ck_res);
            if($row == 0){
                $result = 0;
                if(strpos($user_id,'g') !== false){
                    $column = "item_id,guest_id";
                }else{
                    $column = "item_id,user_id";
                }
                for($i=0;$i<$ck_row;$i++){
                    $ck_arr = mysqli_fetch_assoc($ck_res);
                    $value .= sprintf("('%d','%s'),",$ck_arr['id'],$user_id);
                }
                $value = substr($value,0,-1);
                $sql = sprintf("insert into user_item_relations (%s) values %s",$column,$value);
                $res =  mysqli_query($this->conn,$sql);
            }else{
                $result = 1;
                for($i=0;$i<$ck_row;$i++){
                    $ck_arr = mysqli_fetch_assoc($ck_res);
                    if($value != ""){ $value .= " or "; }
                    $value .= sprintf("item_id='%d'",$ck_arr['id']);
                }
                $sql = sprintf("delete from user_item_relations where (%s) and (user_id='%d' or guest_id='%s');",$value,$user_id,$user_id);
                $res = mysqli_query($this->conn,$sql);
            }
            if(!$res){
                $result = 2;
            }
            return $result;
        }
    }


?>
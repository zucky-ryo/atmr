<?php
    require_once __DIR__.'/../class/database.php';

    class User extends Database{
        public $id;
        public $name;
        public $pass;
        public $upd;

        public function __construct(){
            $this->getConnect();
            $this->table = "users";
            $this->order = "name ASC";
        }

        public function getUser($id,$sw=0):void{
            $now = date('Y-m-d H:i:s');
            if($sw == 0){
                $upd_str = sprintf("update %s set update_at='%s' where id='%d';",$this->table,$now,$id);
            }elseif($sw == 1){
                $upd_str = sprintf("update %s set pass=concat(pass,'%d'),update_at='%s' where id='%d';",$this->table,$id,$now,$id);
            }
            mysqli_query($this->conn,$upd_str);
            $sql = sprintf("select * from %s where id='%d';",$this->table,$id);
            $res = mysqli_query($this->conn,$sql);
            $data = mysqli_fetch_assoc($res);
            $this->id   = $data['id'];
            $this->name = $data['name'];
            $this->pass = $data['pass'];
            $this->upd  = $data['update_at'];
        }

        public function insertGuest():void{
            $name = "guest_".date('YmdHis');
            $pass = date('YmdHis')."_";
            $ins_str = sprintf("insert into users (name,pass) values ('%s','%s')",$name,$pass);
            mysqli_query($this->conn,$ins_str);
            $id = mysqli_insert_id($this->conn);
            $this->getUser($id,1);
        }
    }


?>
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
                $upd_str = sprintf("update users set update_at='%s' where id='%d';",$now,$id);
            }elseif($sw == 1){
                $upd_str = sprintf("update users set pass=concat(pass,'%d'),update_at='%s' where id='%d';",$id,$now,$id);
            }
            mysqli_query($this->conn,$upd_str);
            $sql = sprintf("select * from users where id='%d';",$id);
            $res = mysqli_query($this->conn,$sql);
            $data = mysqli_fetch_assoc($res);
            $this->id   = $data['id'];
            $this->name = $data['name'];
            $this->pass = $data['pass'];
            $this->upd  = $data['update_at'];
        }

        public function insertGuest():void{
            $now = date('Y-m-d H:i:s');
            $name = "guest_".date('YmdHis');
            $pass = date('YmdHis')."_";
            $ins_str = sprintf("insert into users (name,pass,update_at) values ('%s','%s','%s')",$name,$pass,$now);
            mysqli_query($this->conn,$ins_str);
            $id = mysqli_insert_id($this->conn);
            $this->getUser($id,1);
        }

        public function login($id,$name,$pass):void{
            $sql = sprintf("select * from users where name='%s' and pass='%s';",$name,$pass);
            $res = mysqli_query($this->conn,$sql);
            $row = mysqli_num_rows($res);
            if($row == 0){
                $sql = sprintf("update users set name='%s',pass='%s' where id='%d';",$name,$pass,$id);
                $res = mysqli_query($this->conn,$sql);
                $this->getUser($id,0);
            }else{
                $sql = sprintf("delete from users where id='%d';",$id);
                $res = mysqli_query($this->conn,$sql);
                $user = mysqli_fetch_assoc($res);
                $this->getUser($user['id'],0);
            }
        }
    }


?>
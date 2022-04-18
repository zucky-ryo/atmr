<?php
    require_once __DIR__.'/../class/database.php';

    class Item extends Database{
        public $id;
        public $type;
        public $s_type;
        public $name;
        public $img;
        public $color;

        public function __construct(){
            $this->getConnect();
            $this->table = "items";
            $this->order = "name ASC, color ASC";
        }

        public function getItem($id):void{
            $sql = sprintf("select * from %s where id='%d';",$this->table,$id);
            $res = mysqli_query($this->conn,$sql);
            $data = mysqli_fetch_assoc($res);
            $this->id     = $data['id'];
            $this->type   = $data['type'];
            $this->s_type = $data['sub_type'];
            $this->name   = $data['name'];
            $this->img    = $data['img'];
            $this->color  = $data['color'];
        }

        public function getItems($user_id,$type,$s_type){
            if($s_type != ""){ $s_type = sprintf("and sub_type='%d'",$s_type); }
            $sql  = sprintf("select A.*,B.item_id as sw from items as A left join user_item_relations as B ");
            $sql .= sprintf("on A.id = B.item_id and (B.user_id = '%d' or B.guest_id = '%s') ",$user_id,$user_id);
            $sql .= sprintf("where type='%d' %s order by case when TRIM(kana) regexp '^[0-9]' then 1 when TRIM(kana) regexp '^[a-z]' then 2 else 3 end desc,replace(kana, 'ー', 'あ') ASC",$type,$s_type);
            $res = mysqli_query($this->conn,$sql);
            while($row = mysqli_fetch_assoc($res)){
                $items[] = $row;
            }
            return $items;
        }

    }


?>
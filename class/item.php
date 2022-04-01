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

        public function getFurniture(){
            return $this->getAllData("type=0");
        }
        
        public function getFurnitureA(){
            return $this->getAllData("type=0 and sub_type=0");
        }

        public function getFurnitureB(){
            return $this->getAllData("type=0 and sub_type=1");
        }

        public function getFurnitureC(){
            return $this->getAllData("type=0 and sub_type=2");
        }

        public function getFurnitureD(){
            return $this->getAllData("type=0 and sub_type=3");
        }

        public function getFurnitureE(){
            return $this->getAllData("type=0 and sub_type=4");
        }

        public function getFurnitureF(){
            return $this->getAllData("type=0 and sub_type=5");
        }

        public function getFashion(){
            return $this->getAllData("type=1");
        }
    
        public function getFashionA(){
            return $this->getAllData("type=1 and sub_type=0");
        }
    
        public function getFashionB(){
            return $this->getAllData("type=1 and sub_type=1");
        }
    
        public function getFashionC(){
            return $this->getAllData("type=1 and sub_type=2");
        }
    
        public function getFashionD(){
            return $this->getAllData("type=1 and sub_type=3");
        }
    
        public function getFashionE(){
            return $this->getAllData("type=1 and sub_type=4");
        }
    
        public function getFashionF(){
            return $this->getAllData("type=1 and sub_type=5");
        }
    
        public function getFashionG(){
            return $this->getAllData("type=1 and sub_type=6");
        }
    
        public function getFashionH(){
            return $this->getAllData("type=1 and sub_type=7");
        }
    
        public function getFashionI(){
            return $this->getAllData("type=1 and sub_type=8");
        }
    
        public function getFashionJ(){
            return $this->getAllData("type=1 and sub_type=9");
        }
    }



?>
<?php
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

        public function getFurniture($arr){
            foreach($arr as $val){
                if($val['type'] == 0){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
        
        public function getFurnitureA($arr){
            foreach($arr as $val){
                if($val['type'] == 0 && $val['sub_type'] == 0){
                    $datas[] = $val;
                }
            }
            return $datas;
        }

        public function getFurnitureB($arr){
            foreach($arr as $val){
                if($val['type'] == 0 && $val['sub_type'] == 1){
                    $datas[] = $val;
                }
            }
            return $datas;
        }

        public function getFurnitureC($arr){
            foreach($arr as $val){
                if($val['type'] == 0 && $val['sub_type'] == 2){
                    $datas[] = $val;
                }
            }
            return $datas;
        }

        public function getFurnitureD($arr){
            foreach($arr as $val){
                if($val['type'] == 0 && $val['sub_type'] == 3){
                    $datas[] = $val;
                }
            }
            return $datas;
        }

        public function getFurnitureE($arr){
            foreach($arr as $val){
                if($val['type'] == 0 && $val['sub_type'] == 4){
                    $datas[] = $val;
                }
            }
            return $datas;
        }

        public function getFurnitureF($arr){
            foreach($arr as $val){
                if($val['type'] == 0 && $val['sub_type'] == 5){
                    $datas[] = $val;
                }
            }
            return $datas;
        }

        public function getFashion($arr){
            foreach($arr as $val){
                if($val['type'] == 1){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
    
        public function getFashionA($arr){
            foreach($arr as $val){
                if($val['type'] == 1 && $val['sub_type'] == 0){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
    
        public function getFashionB($arr){
            foreach($arr as $val){
                if($val['type'] == 1 && $val['sub_type'] == 1){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
    
        public function getFashionC($arr){
            foreach($arr as $val){
                if($val['type'] == 1 && $val['sub_type'] == 2){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
    
        public function getFashionD($arr){
            foreach($arr as $val){
                if($val['type'] == 1 && $val['sub_type'] == 3){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
    
        public function getFashionE($arr){
            foreach($arr as $val){
                if($val['type'] == 1 && $val['sub_type'] == 4){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
    
        public function getFashionF($arr){
            foreach($arr as $val){
                if($val['type'] == 1 && $val['sub_type'] == 5){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
    
        public function getFashionG($arr){
            foreach($arr as $val){
                if($val['type'] == 1 && $val['sub_type'] == 6){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
    
        public function getFashionH($arr){
            foreach($arr as $val){
                if($val['type'] == 1 && $val['sub_type'] == 7){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
    
        public function getFashionI($arr){
            foreach($arr as $val){
                if($val['type'] == 1 && $val['sub_type'] == 8){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
    
        public function getFashionJ($arr){
            foreach($arr as $val){
                if($val['type'] == 1 && $val['sub_type'] == 9){
                    $datas[] = $val;
                }
            }
            return $datas;
        }
    }



?>
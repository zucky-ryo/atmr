<?php
    require_once __DIR__.'/../class/item.php';

    function getItem($type,$s_type){
        $item = new Item;
        if($type == "0"){
            if($s_type == ""){
                $arr = $item->getFurniture();
            }elseif($s_type == "0"){
                $arr = $item->getFurnitureA();
            }elseif($s_type == "1"){
                $arr = $item->getFurnitureB();
            }elseif($s_type == "2"){
                $arr = $item->getFurnitureC();
            }elseif($s_type == "3"){
                $arr = $item->getFurnitureD();
            }elseif($s_type == "4"){
                $arr = $item->getFurnitureE();
            }elseif($s_type == "5"){
                $arr = $item->getFurnitureF();
            }
        }elseif($type == "1"){
            if($s_type == ""){
                $arr = $item->getFashion();
            }elseif($s_type == "0"){
                $arr = $item->getFashionA();
            }elseif($s_type == "1"){
                $arr = $item->getFashionB();
            }elseif($s_type == "2"){
                $arr = $item->getFashionC();
            }elseif($s_type == "3"){
                $arr = $item->getFashionD();
            }elseif($s_type == "4"){
                $arr = $item->getFashionE();
            }elseif($s_type == "5"){
                $arr = $item->getFashionF();
            }elseif($s_type == "6"){
                $arr = $item->getFashionG();
            }elseif($s_type == "7"){
                $arr = $item->getFashionH();
            }elseif($s_type == "8"){
                $arr = $item->getFashionI();
            }elseif($s_type == "9"){
                $arr = $item->getFashionJ();
            }
        }
        return $arr;
    }


?>
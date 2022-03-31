<?php
    require_once __DIR__.'/../class/item.php';

    function getItem($type,$s_type){
        $item = new Item;
        $items = $item->getAllData();
        if($type == "0"){
            if($s_type == ""){
                $arr = $item->getFurniture($items);
            }elseif($s_type == "0"){
                $arr = $item->getFurnitureA($items);
            }elseif($s_type == "1"){
                $arr = $item->getFurnitureB($items);
            }elseif($s_type == "2"){
                $arr = $item->getFurnitureC($items);
            }elseif($s_type == "3"){
                $arr = $item->getFurnitureD($items);
            }elseif($s_type == "4"){
                $arr = $item->getFurnitureE($items);
            }elseif($s_type == "5"){
                $arr = $item->getFurnitureF($items);
            }
        }elseif($type == "1"){
            if($s_type == ""){
                $arr = $item->getFashion($items);
            }elseif($s_type == "0"){
                $arr = $item->getFashionA($items);
            }elseif($s_type == "1"){
                $arr = $item->getFashionB($items);
            }elseif($s_type == "2"){
                $arr = $item->getFashionC($items);
            }elseif($s_type == "3"){
                $arr = $item->getFashionD($items);
            }elseif($s_type == "4"){
                $arr = $item->getFashionE($items);
            }elseif($s_type == "5"){
                $arr = $item->getFashionF($items);
            }elseif($s_type == "6"){
                $arr = $item->getFashionG($items);
            }elseif($s_type == "7"){
                $arr = $item->getFashionH($items);
            }elseif($s_type == "8"){
                $arr = $item->getFashionI($items);
            }elseif($s_type == "9"){
                $arr = $item->getFashionJ($items);
            }
        }
        return $arr;
        return [];
    }


?>
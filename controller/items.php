<?php
    require_once __DIR__.'/../class/item.php';

    function getItems($user_id,$type,$s_type){
        $item = new Item;
        $items = $item->getItems($user_id,$type,$s_type);
        return $items;
    }


?>
<?php
    require_once './lib.php';

    $ins_str = sprintf("insert into items (type,sub_type,name,img,color) values ");

    $text = file_get_contents('../data/kagu.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(0,0,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/komono.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(0,1,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/kabekake.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(0,2,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/tenjo.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(0,3,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/ryori.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(0,4,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/mairukagu.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(0,5,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/tops.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(1,0,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/bottoms.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(1,1,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/onepiece.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(1,2,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/kaburimono.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(1,3,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/accesally.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(1,4,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/kutsusita.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(1,5,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/kutsu.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(1,6,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/bag.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(1,7,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/kasa.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(1,8,'%s','%s','%s'),",$val[0],$val[1],$val[2]);
    }

    $text = file_get_contents('../data/fassionsonota.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $val){
        $ins_str .= sprintf("(1,9,'%s','%s','%s')",$val[0],$val[1],$val[2]);
    }

    $ins_res = mysqli_query($conn,$ins_str);

?>
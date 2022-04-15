<?php
    require_once './lib.php';

    $before = "";

    $ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/kagu.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(0,0,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/komono.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(0,1,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/kabekake.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(0,2,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/tenjo.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(0,3,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/ryori.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(0,4,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/mairukagu.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(0,5,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/tops.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(1,0,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/bottoms.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(1,1,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/onepiece.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(1,2,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/kaburimono.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(1,3,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/accesally.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(1,4,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/kutsusita.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(1,5,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/kutsu.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(1,6,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/bag.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(1,7,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/kasa.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(1,8,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	$ins_str = sprintf("insert into items (type,sub_type,name,kana,img,color) values ");
    $text = file_get_contents('../data/text/fassionsonota.txt');
    $arr = json_decode(json_decode($text,true),true);
    foreach($arr as $key => $val){
        if($val['name'] == "" || ctype_space($val['name'])){ $val['name'] = $before; }
        $ins_str .= sprintf("(1,9,'%s','%s','%s','%s'),",$val['name'],mb_convert_kana(mb_convert_kana($val['name'],'kh'),"KVa"),$val['img'],$val['type']);
        $before = $val['name'];
    }
	$ins_str = substr($ins_str, 0, -1);
    $ins_res = mysqli_query($conn,$ins_str);
	if(!$ins_res){ echo "fail"; exit; }

	echo "success";

?>
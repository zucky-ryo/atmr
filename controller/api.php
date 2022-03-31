<?php
    require_once __DIR__.'/../controller/items.php';
    require_once __DIR__.'/../lib/master.php';

    $deb = "デバッグ";
    if($_GET['sw'] == "show_page"){
        $type = $_GET['type'];
        $title = $type_arr[$type];
        $s_type = $_GET['s_type'];
        $s_title = "全て";
        $items = getItem($type,$s_type);
        $menu_str = "type_".$type."_arr";
        $btn = "btn-outline-success";
        if($s_type == ""){ $btn = "btn-success"; }
        
        $html = "";
        $html .= sprintf("<div class='d-flex scroll_x mb-2'>");
        $html .= sprintf("<button type='button' class='mx-1 px-2 btn %s text-center' onclick='show_page(%d,``)'>全て</button>",$btn,$type);
        foreach($$menu_str as $key => $menu){
            $btn = "btn-outline-success";
            if($s_type == $key){ $btn = "btn-success"; $s_title = $$menu_str[$key]; }
            $html .= sprintf("<button type='button' class='mx-1 px-2 btn %s text-center' onclick='show_page(%d,%d)'>%s</button>",$btn,$type,$key,$menu);
        }
        $html .= sprintf("</div>");
        $html .= sprintf("<div class=''>");
        $html .= sprintf("<div class='row'>");
        $html .= sprintf("<div class='col-12'>");
        $html .= sprintf("<div class='d-flex bg-light'>");
        foreach($items as $item){
            // $html .= sprintf("<div class='col-xl-1 col-md-2 col-3 border border-white px-1'>");
            $html .= sprintf("<div class='border border-white px-1' style='width:20%%;'>");
            $html .= sprintf("<div class='py-1' style='font-size: 10px; font-weight: bold;'>%s</div>",$item['name']);
            $html .= sprintf("<div class='d-flex justify-content-center'><img data-src='%s' class='lazyload' width='80%%' height='100%%'></div>",$item['img'],$item['img']);
            $html .= sprintf("<div class='text-center mb-1' style='font-size: 10px;'>%s</div>",$item['color']);
            $html .= sprintf("</div>");
        }
        $html .= sprintf("</div>");
        $html .= sprintf("</div>");
        $html .= sprintf("</div>");
        $html .= sprintf("</div>");

        $json = ['html' => $html, 'title' => $title, 'sub_title' => $s_title];
    }

    $json['deb'] = $deb;
    echo json_encode($json);
    exit;

?>
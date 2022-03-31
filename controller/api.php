<?php
    require_once __DIR__.'/../controller/items.php';

    $deb = "デバッグ";
    if($_GET['sw'] == "show_page"){
        $type = $_GET['type'];
        $s_type = $_GET['s_type'];
        $items = getItem($type,$s_type);

        $html = "";
        $html .= sprintf("<div class=''>");
        $html .= sprintf("<div class='row'>");
        $html .= sprintf("<div class='col-2 bg-primary'></div>");
        $html .= sprintf("<div class='col-10'>");
        $html .= sprintf("<div class='row bg-light'>");
        foreach($items as $item){
            $html .= sprintf("<div class='col-3 border border-white'>");
            $html .= sprintf("<div class='py-1' style='font-size: 8px; font-weight: bold;'>%s</div>",$item['name']);
            $html .= sprintf("<div><img data-src='%s' class='lazyload' width='100%%'></div>",$item['img'],$item['img']);
            $html .= sprintf("<div class='text-center py-1' style='font-size: 8px;'>%s</div>",$item['color']);
            $html .= sprintf("</div>");
        }
        $html .= sprintf("</div>");
        $html .= sprintf("</div>");
        $html .= sprintf("</div>");
        $html .= sprintf("</div>");

        $json = ['html' => $html];
    }

    $json['deb'] = $deb;
    echo json_encode($json);
    exit;

?>
<?php
    require_once __DIR__.'/../controller/users.php';
    require_once __DIR__.'/../controller/items.php';
    require_once __DIR__.'/../lib/master.php';

    session_start();

    $deb = "デバッグ";

    if($_GET['sw'] == "ck_session"){
        $json = ck_session();
    }

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
        $html .= sprintf("<div class='bg-white py-1' style='position: fixed'>");
        $html .= sprintf("<div class='d-flex scroll_x mb-2 px-2'>");
        $html .= sprintf("<button type='button' class='mx-1 px-2 btn %s text-center' onclick='show_page(%d,``)'>全て</button>",$btn,$type);
        foreach($$menu_str as $key => $menu){
            $btn = "btn-outline-success";
            if($s_type == $key){ $btn = "btn-success"; $s_title = $$menu_str[$key]; }
            $html .= sprintf("<button type='button' class='mx-1 py-0 px-2 btn %s text-center' onclick='show_page(%d,%d)'>%s</button>",$btn,$type,$key,$menu);
        }
        $html .= sprintf("</div>");
        $html .= sprintf("<div class='d-flex scroll_x px-2'>");
        $arr = ["A","あ","か","さ","た","な","は","ま","や","ら","わ"];
        for($i=0;$i<11;$i++){
            $html .= sprintf("<button type='button' class='mx-1 px-2 btn btn btn-outline-dark text-center' onclick='main_scroll(%d)'>%s</button>",$i,$arr[$i]);
        }
        $html .= sprintf("</div>");
        $html .= sprintf("</div>");
        $html .= sprintf("<div class='px-1' style='padding-top: 90px;'>");
        $html .= sprintf("<div class=''>");
        $html .= sprintf("<div class=''>");
        $html .= sprintf("<div class='d-flex flex-wrap bg-light'>");
        $before = "";
        $mokuji = [
            "あ","い","う","え","お","ア","イ","ウ","エ","オ",
            "か","き","く","け","こ","カ","キ","ク","ケ","コ",
            "さ","し","す","せ","そ","サ","シ","ス","セ","ソ",
            "た","ち","つ","て","と","タ","チ","ツ","テ","ト",
            "な","に","ぬ","ね","の","ナ","ニ","ヌ","ネ","ノ",
            "は","ひ","ふ","へ","ほ","ハ","フ","ホ","へ","ホ",
            "ま","み","む","め","も","マ","ミ","ム","メ","モ",
            "や","ゆ","よ","ヤ","ユ","ヨ",
            "ら","り","る","れ","ろ","ラ","リ","ル","レ","ロ",
            "わ","を","ん","ワ","ヲ","ン"
        ];
        $mokuji_a = [
            "a","a","a","a","a","a","a","a","a","a",
            "k","k","k","k","k","k","k","k","k","k",
            "s","s","s","s","s","s","s","s","s","s",
            "t","t","t","t","t","t","t","t","t","t",
            "n","n","n","n","n","n","n","n","n","n",
            "h","h","h","h","h","h","h","h","h","h",
            "m","m","m","m","m","m","m","m","m","m",
            "y","y","y","y","y","y",
            "r","r","r","r","r","r","r","r","r","r",
            "w","w","w","w","w","w"
        ];
        foreach($items as $i => $item){
            if($before != $item['img']){
                if(array_search(mb_substr(trim($item['name']),0,1),$mokuji) === false){
                    if(!isset($moku['top'])){
                        $html .= sprintf("<div class='border border-white px-1' style='width: 20%%;' id='scroll'>");
                        $moku['top'] = true;
                    }else{
                        $html .= sprintf("<div class='border border-white px-1' style='width: 20%%;'>");
                    }
                }else{
                    $deb = "徹";
                    $key = array_search(mb_substr(trim($item['name']),0,1),$mokuji);
                    if(!isset($moku[$mokuji_a[$key]])){
                        $html .= sprintf("<div class='border border-white px-1' style='width: 20%%;' id='scroll_%s'>",$mokuji_a[$key]);
                        $moku[$mokuji_a[$key]] = true;
                    }else{
                        $html .= sprintf("<div class='border border-white px-1' style='width: 20%%;'>");
                    }
                }
                $html .= sprintf("<div class='py-1' style='font-size: 10px; font-weight: bold;'>%s</div>",$item['name']);
                $html .= sprintf("<div class='d-flex justify-content-center'><img data-src='%s' class='lazyload' width='80%%' height='100%%'></div>",$item['img'],$item['img']);
                $html .= sprintf("<div class='text-center mb-1' style='font-size: 10px;'>%s</div>",$item['color']);
                $html .= sprintf("</div>");
            }
            $before = $item['img'];
        }
        $html .= sprintf("</div>");
        $html .= sprintf("</div>");
        $html .= sprintf("</div>");
        $html .= sprintf("</div>");

        $json = ['deb' => $deb, 'html' => $html, 'title' => $title, 'sub_title' => $s_title];
        $_SESSION['type'] = $_GET['type'];
        $_SESSION['s_type'] = $_GET['s_type'];
    }

    $json['deb'] = $deb;
    echo json_encode($json, JSON_UNESCAPED_UNICODE);
    exit;

?>
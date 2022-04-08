<?php
    // mb_language("ja");
    // mb_internal_encoding("UTF-8");

    $conn = MySQLi_connect("localhost","atmr_user","tqVgK4RY.i/Cjr-T","animal_comp");
	MySQLi_Set_Charset($conn,"utf8");

    $str = sprintf("select * from items where id=11993");
    $res = mysqli_query($conn,$str);
    $item = mysqli_fetch_assoc($res);

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

    // $item['name'] = "あおいバラのリース";
    // var_dump($item['name']);
    var_dump(mb_substr(trim($item['name']),0,1));
    // var_dump(array_search(mb_substr($item['name'],0,1),$mokuji));
    // if(array_search(mb_substr($item['name'],0,1),$mokuji) === false){
    //     echo "最初";
    // }else{
    //     $key = array_search(mb_substr($item['name'],0,1),$mokuji);
    //     if(!isset($moku[$mokuji_a[$key]])){
    //         echo "次";
    //     }
    // }
?>
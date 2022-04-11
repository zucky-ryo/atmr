$(function() {
	$.ajaxSetup({ cache: false });
    ck_session();
});


function ck_session(){
    $.blockUI({message:'読み込み中',baseZ: 9999});
    $.ajax({
        type : "get",
        url  : "./controller/api.php",
        data : {
            'sw'     : "ck_session"
        },
        dataType : 'json',
        success : function(data){
            $.unblockUI();
            if(data['login']){
                $('#login_button').hide();
            }
            show_page(data['type'],data['s_type']);
        },
        error : function(err){
            $.unblockUI();
        }
    });
}

function login_modal(){
    $('#login_modal').modal('show');
}

function login(){
    const name = $('#user_name').val();
    const pass = $('#user_pass').val();
    $.blockUI({message:'読み込み中',baseZ: 9999});
    $.ajax({
        type : "post",
        url  : "./controller/api.php",
        data : {
            'sw'   : "login",
            'name' : name,
            'pass' : pass
        },
        dataType : 'json',
        success : function(data){
            $.unblockUI();
            $('#login_modal').modal('hide');
            show_page(data['type'],data['s_type']);
        },
        error : function(err){
            $.unblockUI();
        }
    });
}

function show_page(type,s_type){
    $.blockUI({message:'読み込み中',baseZ: 9999});
    $.ajax({
        type : "get",
        url  : "./controller/api.php",
        data : {
            'sw'     : "show_page",
            'type'   : type,
            's_type' : s_type
        },
        dataType : 'json',
        success : function(data){
            $.unblockUI();
            $('#main_div').html(data['html']);
            $('#page_title').text(data['title']);
            $('#page_sub_title').text(data['sub_title']);
            $("img.lazyload").lazyload();
            if($('#main_menu').is(':visible')) {
                $('#main_menu').collapse('hide');
            }
        },
        error : function(err){
            $.unblockUI();
        }
    });
}

function main_scroll(sw){
    if(sw == 0 && typeof $('#scroll').position() !== "undefined"){
        $(window).scrollTop($('#scroll').position().top - 145);
    }
    if(sw == 1 && typeof $('#scroll_a').position() !== "undefined"){
        $(window).scrollTop($('#scroll_a').position().top - 145);
    }
    if(sw == 2 && typeof $('#scroll_k').position() !== "undefined"){
        $(window).scrollTop($('#scroll_k').position().top - 145);
    }
    if(sw == 3 && typeof $('#scroll_s').position() !== "undefined"){
        $(window).scrollTop($('#scroll_s').position().top - 145);
    }
    if(sw == 4 && typeof $('#scroll_t').position() !== "undefined"){
        $(window).scrollTop($('#scroll_t').position().top - 145);
    }
    if(sw == 5 && typeof $('#scroll_n').position() !== "undefined"){
        $(window).scrollTop($('#scroll_n').position().top - 145);
    }
    if(sw == 6 && typeof $('#scroll_h').position() !== "undefined"){
        $(window).scrollTop($('#scroll_h').position().top - 145);
    }
    if(sw == 7 && typeof $('#scroll_m').position() !== "undefined"){
        $(window).scrollTop($('#scroll_m').position().top - 145);
    }
    if(sw == 8 && typeof $('#scroll_y').position() !== "undefined"){
        $(window).scrollTop($('#scroll_y').position().top - 145);
    }
    if(sw == 9 && typeof $('#scroll_r').position() !== "undefined"){
        $(window).scrollTop($('#scroll_r').position().top - 145);
    }
    if(sw == 10 && typeof $('#scroll_w').position() !== "undefined"){
        $(window).scrollTop($('#scroll_w').position().top - 145);
    }
}

function check_item($this,user_id,item_id){
    debugger
    $.blockUI({message:'読み込み中',baseZ: 9999});
    $.ajax({
        type : "post",
        url  : "./controller/api.php",
        data : {
            'sw'      : "check_item",
            'user_id' : user_id,
            'item_id' : item_id
        },
        dataType : 'json',
        success : function(data){
            $.unblockUI();
            if(data['res'] == 0){

            }else if(data['res'] == 1){

            }
        },
        error : function(err){
            $.unblockUI();
        }
    });
}

// ガチコンプからデータ取ってくるコード
function copy_wrap(){
    let item_arr = [];
    let arr = $('.items').children;
    let json = "";

    item_arr = [];
    arr = $('.items').children;
    arr.forEach(function(val,i){
        let sub_arr = val.children[0].children
        sub_arr.forEach(function(item,i){
            let a = new Object();
            a.name = item.children[0].children[0].textContent;
            a.img = item.children[0].children[1].src;
            if(item.children[0].children.length == 3){
                a.type = item.children[0].children[2].textContent;
            }else{
                a.type = item.children[0].children[3].textContent;
            }
            item_arr.push(a);
        })
    });
    json = JSON.stringify(item_arr);
    
}

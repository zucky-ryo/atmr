$(function() {
	$.ajaxSetup({ cache: false });
    show_page(0,1);
});

function show_page(type=0,s_type=""){
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
            $('#main_div').html(data['html']);
            lazyload();
        },
        error : function(err){
            
        }
    });
}

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

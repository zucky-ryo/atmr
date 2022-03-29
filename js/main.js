$(function() {
	$.ajaxSetup({ cache: false });
});

function copy_wrap(){
    $.ajax({
        url: 'https://ysds.github.io/acnh-gachi-complete/',
        cache: false,
        datatype: 'html',
        success: function(html){
            const h = $(html).find('#app');
            $('#copy_wrap').append(h);
        }
    });


    $('.items').children[0].children[0].children[0].children[0].children[0]
    $('.items').children[0].children[0].children[0].children[0].children[1]
    $('.items').children[0].children[0].children[0].children[0].children[2]

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

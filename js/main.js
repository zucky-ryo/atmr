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
    const arr = $('.items').children;
    arr.forEach(function(val,i){
        let a = new Object();
        a.name = val.children[0].children[0].children[0].children[0].textContent;
        a.img = val.children[0].children[0].children[0].children[1].src;
        if(val.children[0].children[0].children[0].children.length == 3){
            a.type = val.children[0].children[0].children[0].children[2].textContent;
        }else{
            a.s_img = val.children[0].children[0].children[0].children[2].src;
            a.type = val.children[0].children[0].children[0].children[3].textContent;
        }
        item_arr.push(a);
    });
    
}

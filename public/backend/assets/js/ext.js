/**
 * Created by lee on 15-9-4.
 */

/**
 * 删除
 */
$('.l-destroy').on('click', function() {
    //询问框
    var it=$(this);
    var json=it.attr('l-data-modal');
    var obj=eval("("+json+")");
    var target=obj.target;
    var _token=$("input[name='_token']").val();
    if(obj){
        layer.confirm('是否删除该条信息？', {
            btn: ['确定', '取消'], //按钮
            shade: 0.8
        }, function () {
            $.post(target,{_token:_token},function(result){
                console.log(result);
                if(result.errcode=='0'){
                    layer.msg(result.message, {icon: 1});
                    //console.log(parseInt($('.l-total').html()));
                    $('.l-total').html(parseInt($('.l-total').html())-1);
                    it.closest('tr').remove();
                }else{
                    layer.msg(result.message, {icon: 2});
                }
            },'json');
        }, function () {
            //layer.msg('么么哒', {shift: 6});
        });
    }
});

$('.l-layer').on('click', function(){
    var json=$(this).attr('l-data-modal');
    var obj=eval("("+json+")");
    var target=obj.target;
    var width=obj.width;
    var height=obj.height;
    var title=obj.title;
    if(!obj.width){
        width='65%';
    }
    if(!height){
        height="70%";
    }

    layer.open({
        type: 2,
        title: title,
        shadeClose: true,
        shade: 0.8,
        area: [width, height],
        content: target,
        cancel: function(index){
            /*layer.load(2, {
             shade: [0.2,'#fff'] //0.1透明度的白色背景
             });*/
            layer.close(index);
            location.reload();
        }
    });
    /*if(tops){
     $('.layui-layer-iframe').css('top',tops);
     }*/
});
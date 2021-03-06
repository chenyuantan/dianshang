<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="__PUBLIC__/static/admin/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script src="js/shopFrame.js" type="text/javascript"></script>
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.dataTables.bootstrap.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>品牌列表</title>
</head>

<body>
<div class="margin" id="page_style">
<div class="operation clearfix">
<button class="btn button_btn btn-danger" id="apple" type="button" onclick=""><i class="fa fa-trash-o"></i>&nbsp;删除</button>
<span class="submenu"><a href="javascript:void(0)" name="{:url('admin/shop/add_brand')}" class="btn button_btn bg-deep-blue" title="添加产品"><i class="fa  fa-edit"></i>&nbsp;添加品牌</a></span>
<div class="search  clearfix">
 <label class="label_name">品牌搜索：</label><input name="" type="text"  class="form-control col-xs-6"/><button class="btn button_btn bg-deep-blue " onclick=""  type="button"><i class="fa  fa-search"></i>&nbsp;搜索</button>
</div>
</div>
<!--列表展示-->
<div class="list_Exhibition margin-sx">
 <table class="table table_list table_striped table-bordered" id="sample-table">
  <thead list="apple">
  <tr>
  <th width="30"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
   <th width="100">产品编号</th>
   <th width="100">产品名称</th>
   <th width="100">品牌logo</th>
   <th width="120">品牌描述</th>
   <th width="100">品牌网址</th>
   <th width="100">品牌排序</th>
   <th width="150">是否展示</th>
   <th width="100">添加时间</th>
   <th width="100">操作</th>
   <th width="220"></th>
   </tr>   
  </thead>
  </table>

<div style="padding-left: 40%" align='centent' >{$data->render()}</div>

</body>
</html>
<script type="text/javascript">
//设置框架
 $(function() { 
  $("#page_style").frame({
    float : 'left',
    menu_nav:'.operation',
    color_btn:'.skin_select',
  });
});
$(document).ready(function(){
    var spotMax = 8;
  if($('#add_Carousel_figure .table tbody tr').size() >= spotMax) {$(obj).hide();}
  $("#add_Upload").on('click',function(){ 
       var cid =$('.images_Upload').each(function(i){ $(this).attr('id',"Uimages_Upload_"+i)});
       addSpot(this, spotMax, cid);
  });
});
function addSpot(obj, sm ,sid) {
    $("#Upload").append("<div class='images_Upload clearfix margin-bottom' id='"+sid+"'>"+
    "<span class='Upload_img'><input name='' type='file' /></span>"+
    "<a href='javascript:ovid()' class='operating delete_Upload'><i class='fa fa-remove'></i></a>"+
    "<a href='javascript:ovid()' class='operating' onclick='preview_img(this.id)'><i class='fa  fa-image'></i></a>"+
    "</div>&nbsp;")  
  .find(".delete_Upload").click(function(){
    if($('div.images_Upload').size()==1){
      layer.msg('请至少保留一张图片!',{icon:0,time:1000});     
      }
      else{
         $(this).parent().remove();
                 $('#add_Upload').show();
        }         
        
  });
  if($('.delete_Upload').size() >= sm) {$(obj).hide();layer.msg('当前为最大图片添加量!',{icon:0,time:1000});}}
var dataSet=[
{volist name='data' id='v'}
    ['<label><input type="checkbox" name="check[]" value="{$v["brand_id"]}" class="ace"><span class="lbl"></span></label>',
    '{$v["brand_id"]}', 
    '{$v["brand_name"]}',
    '<img src="{$v["brand_logo"]}" alt="" width="50" heigth="50">',
    '{$v["brand_desc"]}',
    '{$v["site_url"]}',
    '{$v["sort_order"]}',
    '{if condition="$v.is_show eq 0"}否{else /}是{/if}',
    '{$v["add_time"]}',
    '<span class="label label-success label-sm">上架</span>',
    '<a href="javascript:ovid()" onclick="picture_stop(this,"10001")" class="btn bg-green operation_btn">下架</a> <a href="{:url('admin/shop/update_brand',['brand_id'=>$v.brand_id])}" onclick="picture_edit(this,"123")" class="btn bg-deep-blue operation_btn">修改</a> <a href="{:url('admin/shop/brand_del',['brand_id'=>$v.brand_id])}" onclick="picture_del(this,'+10001+')" class="btn btn-danger operation_btn">删除</a>'],
    {/volist}];        
      jQuery(function($) {
        var oTable1 = $('#sample-table').dataTable( {
        "data": dataSet,
        "width":"100%", 
        "bLengthChange":false,
        "iDisplayLength": 20,
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
            "bStateSave": true,//状态保存
        "searching": false,
            "aoColumnDefs": [{"orderable":false,"aTargets":[0,8,9]}]
         });
                
        $('table th input:checkbox').on('click' , function(){
          var that = this;
          $(this).closest('table').find('tr > td:first-child input:checkbox')
          .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
          });
            
        });
      });

/***********图片查看**********/
function picture_img(ojb,id){
   layer.open({
        type: 1,
        title: '产品轮播图',
    maxmin: true, 
    shadeClose:false, //点击遮罩关闭层
        area : ['800px' , '400px'],
        content:$('#add_Carousel_figure'),
    btn:['提交','取消'],
   });
  }
  /*产品-删除*/
function picture_del(obj,id){
  layer.confirm('确认要删除吗？',{icon:0,},function(index){
    $(obj).parents("tr").remove();
    layer.msg('已删除!',{icon:1,time:1000});
  });
}
/*商品-停用*/
function picture_stop(obj,id){
  layer.confirm('确认要下架吗？',function(index){
    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn bg-gray operation_btn" onClick="picture_start(this,id)" href="javascript:;" title="上架">上架</a>');
    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
    $(obj).remove();
    layer.msg('已下架!',{icon: 5,time:1000});
  });
}

/*商品-启用*/
function picture_start(obj,id){
  layer.confirm('确认要上架吗？',function(index){
    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn bg-green operation_btn" onClick="picture_stop(this,id)" href="javascript:;" title="下架">下架</a>');
    $(obj).parents("tr").find(".radius").html('<span class="label label-success radius">已启用</span>');
    $(obj).remove();
    layer.msg('已上架!',{icon: 6,time:1000});
  });
}
/*********滚动事件*********/
$("#page_style").niceScroll({  
  cursorcolor:"#888888",  
  cursoropacitymax:1,  
  touchbehavior:false,  
  cursorwidth:"5px",  
  cursorborder:"0",  
  cursorborderradius:"5px"  
});

 $(document).ready(function(){
  var ReturnWindow=$('#contents', parent.document); 
  var width = ReturnWindow.css("width");
   $("#sample-table").css({"width":width-20+"px"});
    $('#sample-table').location.replace(location.href);
   });

$('#apple').click(function(){
  var id_array="";
   $("input[name='check[]']:checked").each(function(){
      id_array+=','+$(this).attr('value');
   })
   $.ajax({
     type: "POST",
     url: "{:url('admin/shop/brand_del')}",
     data: {'brand_id':id_array},
     dataType: "json",
     success: function(msg){
       if(msg.status==1){
        alert('删除成功');
        $("input[name='check[]']:checked").parents("tr").remove() 
        window.location.reload()
       }else{
        alert('删除失败');
       }
     }
  });
});

</script>

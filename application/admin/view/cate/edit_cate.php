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
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.dataTables.bootstrap.js"></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/laydate/laydate.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>修改产品</title>
</head>

<body>
<div class="margin">
<div class="add_style">
 <form action="{:url('admin/cate/cate_update')}" method="post">
  <input type="hidden" name="cate_id" value="{$data['cate_id']}"/>
 <ul>
  <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>分类名称：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="cate_name" type="text" value="{$data['cate_name']}"  class="col-xs-4"/></div></li>
  <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>分类描述：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="cate_desc" value="{$data['cate_desc']}" type="text" class="col-xs-4"/></div></li>
   <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>关&nbsp;键&nbsp;字：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="keywords" value="{$data['keywords']}" type="text" class="col-xs-4"/><em class="Prompt"> 请用","分隔关键字</em></div></li>
     <li class="clearfix">
      <div class="col-xs-4">
     <label class="label_name col-xs-3"><i>*</i>是否上架：&nbsp;&nbsp;</label> 
    <div class="Add_content col-xs-9">
    <label><input type="radio" name="is_show" value="0" class="ace" {if condition="$data['is_show'] eq 0"} 
            checked="checked"
          {/else}
            
          {/if}   ><span class="lbl">是</span></label>
    <label><input type="radio" name="is_show" value="1" {if condition="$data['is_show'] eq 1"} 
            checked="checked"
          {/else}
            
          {/if} class="ace"><span class="lbl">否</span></label>
    </div>   
    </div>
    </li>
   <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>&nbsp;&nbsp;&nbsp;&nbsp;排序：&nbsp;&nbsp;&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="sort_order" value="{$data['sort_order']}" type="text"  class="col-xs-4"/></div></li>
    </li>
    <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>菜单等级：&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <div class="Add_content col-xs-11">
     <select name="parent_id" id="">
          <option value="0" {:$data['parent_id']==0?'selected':''}>一级分类</option>
          {volist name="type" id="vo"}
          <option value="{$vo.cate_id}" {:$data['parent_id']==$vo['cate_id']?'selected':''}>{:str_repeat('　',$vo['level'])}{$vo.cate_name}</option>
          {/volist}
    </select>
  </div></li>
 </ul>
 <div class="Button_operation btn_width">
    <input type="submit" class="btn button_btn bg-orange" value="保存修改">
    <input type="submit" class="btn button_btn bg-gray" value="取消修改">
 </form>
</div>
</div>
</body>
</html>
  
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="/book/Public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/book/Public/admin/css/admin.css">
    <script src="/book/Public/admin/js/jquery.min.1.11.3.js"></script>
    <script src="/book/Public/admin/js/pintuer.js"></script>
</head>
<body>
<div style="height:10px;background-color: #FFFFA5;"></div>
<form method="post" action="" id="listform">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder">书本列表</strong> </div>
        <div class="padding border-bottom">


        </div>
        <table class="table table-hover text-center">
            <tr>
                <th width="10%" style="text-align:left; padding-left:20px;">ID</th>
                <th width="20%">书本名称</th>
                <th width="30%">书本图片</th>
                <th width="10%">书本章节</th>
                <th width="30%">操作</th>
            </tr>

                <?php if(is_array($arr)): foreach($arr as $key=>$value): ?><tr>
                    <td><?php echo ($value['id']); ?></td>
                    <td ><?php echo ($value['bookname']); ?></td>
                    <td ><img src="/book/upload/bookimage/<?php echo ($value['bookimage']); ?>" width="180" height="100" alt=""/> </td>
                    <td ><?php echo ($value['page']); ?></td>
                    <td style="line-height: 50px;"><div class="button-group"  >
                        <a style="margin-right:10px;border-radius: 4px;height:35px;line-height:0px;" class="button border-main icon-plus-square-o" href="<?php echo U('Admin/Index/booksadd','',false);?>?id=<?php echo ($value['id']); ?>"> 添加章节</a>
                        <a style="margin-right:20px;border-radius: 4px;height:35px;line-height:0px;" class="button border-main" href="<?php echo U('Admin/Index/booksselect','',false);?>?id=<?php echo ($value['id']); ?>&bookname=<?php echo ($value['bookname']); ?>"><span class="icon-edit"></span>查看章节</a>
                        <a style="margin-right:20px;border-radius: 4px;height:35px;line-height:0px;" class="button border-main" href="/book/Admin/Index/adminupdate?roleid=<?php echo ($value['id']); ?>"><span class="icon-edit"></span>编辑</a>
                        <a style="border-radius: 4px;height:35px;line-height:0px;" class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo ($value['id']); ?>)"><span class="icon-trash-o"></span>删除</a>

                    </div></td>
                </tr><?php endforeach; endif; ?>
                <tr>


                </tr>
                <tr>
                    <td colspan="8"> <?php echo ($pageinfo); ?>      </td>
                </tr>
        </table>
    </div>
</form>
<script type="text/javascript">
  function del(id){
      if(confirm('确定要删除吗')){
          location.href="<?php echo U('admin/admin/admindelete','',false);?>?id="+id;
      }
  }

</script>
</body>
</html>
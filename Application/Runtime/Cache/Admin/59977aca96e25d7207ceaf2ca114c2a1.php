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
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>&nbsp;&nbsp;添加章节</strong></div>
    <div class="body-content" style="margin-left: 30px;">
        <form method="post" class="form-x" action="/book/Admin/Index/booksadd" enctype="multipart/form-data">

            <div class="form-group">
                <div class="label">
                    <label>书本名称：</label>
                </div>
                <div class="field">
                    <input style="width:200px;" type="text" class="input w50" name="bookname" value="<?php echo ($arr[0]['bookname']); ?>" readonly/>
                    <input type="hidden" name="pid" value="<?php echo ($arr[0]['id']); ?>"/>
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>章节名称：</label>
                </div>
                <div class="field">
                    <input style="width:200px;" type="text" class="input w50" name="booksname" value=""  placeholder="输入章节名称" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>章节图片：</label>
                </div>
                <div class="field">
                    <input style="width:200px;" type="file" class="input w50" name="booksimage" value="" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>音频文件全称：</label>
                </div>
                <div class="field">
                    <input style="width:200px;" type="text" class="input w50" name="audio" value=""  placeholder="请输入音频文件全称" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>时长：</label>
                </div>
                <div class="field">
                    <input style="width:200px;" type="text" class="input w50" name="timel" value=""  placeholder="请输入时长" />
                    <div class="tips">xx:xx</div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button height="100" class="button bg-main icon-check-square-o" type="submit" > 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
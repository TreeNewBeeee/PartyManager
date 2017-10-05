<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>

<html>
<head>
    <title>首页</title>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="stylesheet" type="text/css" href="../layui/css/layui.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="../layui/lay/modules/laydate.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/bootstrap-treeview.min.js"></script>

    <style type="text/css">

	.d-info{
		margin-top: 10px;
		width: 400px;
	}
		.d-info .fo-item{
			width: 100%;
		}
		.d-info .info-sub{
			margin-top: 20px;
		}
		.new-form{
			width: 400px;
		}

    </style>

</head>

<body>
<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $authorityCode = $_SESSION['authorityCode'];
} else {
    echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
}

?>
	<div class="new-wrap">
		<div class="top-title">
			<p>
				<span class="icon-comm">定</span>
				<span class="top-t">定期任务-发布页</span>
			</p>
		</div>

    <div id="content">
        <form action="uploadFixedMission.php" method="post" enctype="multipart/form-data" class="layui-form new-form clearfix">
        	<div class="d-info clearfix">
        		<div class="fo-item">
						<label for="" class="layui-form-label">发布人</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" name="publisher" value="<?php echo $username ?>" readonly="readonly">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">任务名称</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" name="title">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">任务内容</label>
					<div class="layui-input-inline">
						<!--<input type="text" class="layui-input" name="details">-->
							<textarea name="details" rows="" cols="" class="layui-textarea"></textarea>
					</div>
				</div>				
				<!--<div class="fo-item">
						<label for="" class="layui-form-label">分值下限</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" name="zoneMin">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">分值上限</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" name="zoneMax">
					</div>
				</div>				-->
				<div class="fo-item">
						<label for="" class="layui-form-label">完成时限</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" name="timeLimit">
					</div>
				</div>
            <div class="fo-item">
				<label for="" class="layui-form-label posifile">相关文件</label>
                <div class="layui-input-inline">
                    <input type="file" name="file" id="file"/>
                </div>
            </div>
            </div>
               <div class="info-sub">
					<input type="submit" value="修改"  name="submit"/>
				</div>
        </form>
    </div>

</div>

</body>
<script type="text/javascript">
			layui.use("form",function(){
        var $ = layui.jquery, form = layui.form();
        var laydate = layui.laydate;

	form.on("checkbox",function(data){
		data.elem.checked=!data.elem.checked;
	})
	var start = {
            istoday: false,
            choose: function (datas) {
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            },
            format: 'YYYY/MM/DD', //日期格式
        };
        var end = {
            istoday: false,
            choose: function (datas) {
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        		$(".inp-date").click(function(){
			start.elem=this;
			laydate(start);
		})
	})
</script>
</html>
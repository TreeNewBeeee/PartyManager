<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">
    .top-title{
	padding: 0;
}
    </style>
</head>
<body>

<?php

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
    }

    $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取任务类型
    $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位
?>
	<div class="new-wrap">
<div id="container" class="layui-form">

    <div id="content">
    		<div class="top-title">
			<p>
				<span class="icon-comm">查</span>
				<span class="top-t"><?php echo $branch?>-<?php echo $type?></span>
			</p>
		</div>


        <!--<div class="col-md-12">
            <div class="row">

                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
                </button>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>编辑
                </button>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
                </button>

            </div>
        </div>-->

        <div class="row memberTable new-martop">
            <div class="col-md-12">
                <table class="table" align="center">
                    <tr class="thhead">
                        <th width="5%">选择</th>
                        <th width="5%">序号</th>
                        <th width="40%">任务名称</th>
                        <th width="10%">发布时间</th>
                        <th width="10%">完成时限</th>
                        <th width="10%">得分</th>
                        <th width="20%">状态</th>
                    </tr>

                    <?php
                    require_once 'db_login.php';
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) die($conn->connect_error);
                    mysqli_set_charset($conn, 'utf8');

                    $query = "SELECT * FROM `missionlog` WHERE `branch` = '".$branch."' AND `type` = '".$type."'";
                    $result = $conn->query($query);

                    if (!$result) die($conn->connect_error);
                    $index = 1;
                  
                    while ($rows = $result->fetch_array()){

                        echo <<<SHOWTABLE
                        <tr class="ttd">
                            <td style="text-align:center">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="" lay-skin="primary">
                                    </label>
                                </div>
                            </td>
                            <td style="text-align:center">$index</td>
                            <td><a href = "missionViewer.php?title={$rows['title']}&branch={$branch}">{$rows['title']}</a></td>
                            <td style="text-align:center">{$rows['timeLimit']}</td>
                            <td style="text-align:center">{$rows['timeLimit']}</td>
                            <td style="text-align:center">{$rows['score']}</td>
                            <td style="text-align:center">{$rows['status']}</td>
                        </tr>

SHOWTABLE;



                        $index++;

                    }
                    $result->close();
                    $conn->close();


                    ?>


                </table>

            </div>
        </div>
    </div>
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
            }
        };
        var end = {
            istoday: false,
            choose: function (datas) {
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
	})
</script>
</html>
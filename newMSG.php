<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
	<script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">
    </style>
</head>
<body>
	<div class="new-wrap">
		<div class="top-title">
			<p>
				<span class="icon-comm">新</span>
				<span class="top-t">新消息列表</span>
			</p>
		</div>

    <div id="content" class="member new-martop">
        <div class="memberTable">
            <div class="">
                <table class="table">
                    <tr class="thhead">
                        <th width="5%">序号</th>
                        <th width="*">消息</th>
                        <th width="15%">时间</th>
                        <th width="10%">处理</th>
                    </tr>
                    <?php
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        $authorityCode = $_SESSION['authorityCode'];
                        $branch = $_GET['branch'];
                        require_once './db_login.php';
                        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                        if ($conn->connect_error) die($conn->connect_error);
                        mysqli_set_charset($conn, 'utf8');

                        if ($authorityCode == 1) {
                            // 党委秘书
                            $index = 1;
                            $query = "select * from `msg` WHERE `status` = '已上传' AND `processing` = '未处理'";
                            $result = $conn->query($query);
                            while ($rows = $result->fetch_array()) {
                                echo <<<LIST
                                <tr class="ttd">
                                    <td>{$index}</td>
                                    <td>{$rows['branch']}已上传相关文档，请处理。任务：{$rows['title']}；类型：{$rows['type']}</td>
                                    <td>{$rows['date']}&nbsp;{$rows['time']}</td>
                                    <td><a href="read.php?branch={$rows['branch']}&title={$rows['title']}&type={$rows['type']}&status=已上传">处理该消息</a></td>
                                </tr>

LIST;
                                $index++;

                            }
                            $result->close();
                            $conn->close();


                        } elseif ($authorityCode == 20) {
                            // 各支部党务助理
                            $index = 1;
                            $query = "select * from `msg` WHERE `status` = '已发布' AND `processing` = '未处理' AND `branch` = '" . $branch . "'";
                            $result = $conn->query($query);
                            while ($rows = $result->fetch_array()) {
                                echo <<<LIST
                                <tr class="ttd">
                                    <td>{$index}</td>
                                    <td>党委秘书已发布新{$rows['type']}，请处理。任务：{$rows['title']}</td>
                                    <td>{$rows['date']}&nbsp;{$rows['time']}</td>
                                    <td><a href="read.php?branch={$rows['branch']}&title={$rows['title']}&type={$rows['type']}&status=已发布">处理该消息</a></td>
                                </tr>

LIST;
                                $index++;

                            }
                            $query = "select * from `msg` WHERE `status` = '已打分' AND `processing` = '未处理' AND `branch` = '" . $branch . "'";
                            $result = $conn->query($query);
                            while ($rows = $result->fetch_array()) {
                                echo <<<LIST
                                <tr class="ttd">
                                    <td>{$index}</td>
                                    <td>党委秘书已对{$rows['type']}打分。任务：{$rows['title']}</td>
                                    <td>{$rows['date']}&nbsp;{$rows['time']}</td>
                                    <td><a href="read.php?branch={$rows['branch']}&title={$rows['title']}&type={$rows['type']}&status=已打分">处理该消息</a></td>
                                </tr>

LIST;
                                $index++;

                            }
                            $result->close();
                            $conn->close();

                        }


                    }


                    echo "<script> top.topFrame.location.href='homepage_sub/top.php';</script>";   // 刷新top.php


                    ?>


                </table>

            </div>
        </div>
    </div>
</div>

</body>
</html>
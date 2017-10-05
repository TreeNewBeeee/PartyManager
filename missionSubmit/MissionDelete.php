<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-06-19
 * Time: 22:50
 */
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">


    </style>
</head>
<body>
	<div class="new-wrap">




        <?php

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $authorityCode = $_SESSION['authorityCode'];
        } else {
            echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
        }

        $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取任务类型

        switch ($type){
            case '定期任务':
                echo <<<Jump
                   	<div class="top-title">
			<p>
				<span class="icon-comm">删</span>
				<span class="top-t">删除定期任务</span>
			</p>
		</div>
Jump;
                break;

            case '抢接任务':
                echo <<<Jump
                  	<div class="top-title">
			<p>
				<span class="icon-comm">删</span>
				<span class="top-t">删除抢接任务</span>
			</p>
		</div>
Jump;
                break;

            case '指定任务':
                echo <<<Jump
                  	<div class="top-title">
			<p>
				<span class="icon-comm">删</span>
				<span class="top-t">删除指定任务</span>
			</p>
		</div>
Jump;
                break;

            case '亮点工作':
                echo <<<Jump
                  	<div class="top-title">
			<p>
				<span class="icon-comm">删</span>
				<span class="top-t">删除亮点工作</span>
			</p>
		</div>
Jump;
                break;
        }
        ?>
<div id="container">
<div id="content" class="member new-martop">
        <div class="row memberTable">
            <div class="col-md-12">

                <table class="table" align="center">
                    <tr class="thhead">
                        <th width="30%">任务名称</th>
                        <th width="60%">任务描述</th>
                        <th  width="10%">操作</th>
                    </tr>
                    <?php
                    require_once '../db_login.php';
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) die($conn->connect_error);
                    mysqli_set_charset($conn, 'utf8');
                    switch ($type){
                        case '定期任务':
                            $query = "SELECT * FROM `fixedmission` WHERE 1 ORDER BY `id` DESC";
                            $result = $conn->query($query);
                            if (!$result) die($conn->connect_error);
                            while ($rows = $result->fetch_array()){
                                echo <<<TASKLIST
                                <tr class="ttd">
                                    <td>{$rows['title']}</td>
                                    <td>{$rows['details']}</td>
                                    <td><a href="./handleDelete.php?type=定期任务&title={$rows['title']}&details={$rows['details']}" onclick="return confirm('确定删除吗？')";>删除</a></td>
                                </tr>
TASKLIST;

                            }

                            break;
                        case '抢接任务':
                            $query = "SELECT * FROM `rushmission` WHERE 1 ORDER BY `id` DESC";
                            $result = $conn->query($query);
                            if (!$result) die($conn->connect_error);
                            while ($rows = $result->fetch_array()){
                                echo <<<TASKLIST
                                <tr class="ttd">
                                    <td>{$rows['title']}</td>
                                    <td>{$rows['details']}</td>
                                    <td><a href="./handleDelete.php?type=抢接任务&title={$rows['title']}&details={$rows['details']}" onclick="return confirm('确定删除吗？')";>删除</a></td>
                                </tr>
TASKLIST;

                            }
                            break;
                        case '指定任务':
                            $query = "SELECT * FROM `assignmission` WHERE 1 ORDER BY `id` DESC";
                            $result = $conn->query($query);
                            if (!$result) die($conn->connect_error);
                            while ($rows = $result->fetch_array()){
                                echo <<<TASKLIST
                                <tr class="ttd">
                                    <td>{$rows['title']}</td>
                                    <td>{$rows['details']}</td>
                                    <td><a href="./handleDelete.php?type=指定任务&title={$rows['title']}&details={$rows['details']}" onclick="return confirm('确定删除吗？')";>删除</a></td>
                                </tr>
TASKLIST;

                            }
                            break;
                        case '亮点工作':
                            $query = "SELECT * FROM `shiningmission` WHERE 1 ORDER BY `id` DESC";
                            $result = $conn->query($query);
                            if (!$result) die($conn->connect_error);
                            while ($rows = $result->fetch_array()){
                                echo <<<TASKLIST
                                <tr class="ttd">
                                    <td>{$rows['title']}</td>
                                    <td>{$rows['details']}</td>
                                    <td><a href="./handleDelete.php?type=亮点工作&title={$rows['title']}&details={$rows['details']}" onclick="return confirm('确定删除吗？')";>删除</a></td>
                                </tr>
TASKLIST;

                            }
                            break;
                    }




                    ?>


                </table>

            </div>
        </div>            </div>
        </div>

</div>

</body>
</html>

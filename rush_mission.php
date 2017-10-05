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
.top-title{
	padding: 0;
}

    </style>
</head>
<body>
	<div class="new-wrap">
<div id="container">

    <div id="content" class="member">

        <?php

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $authorityCode = $_SESSION['authorityCode'];
        } else {
            echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
        }

        $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取任务类型

        require_once './db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "SELECT * FROM `person` WHERE `name`='" . $username . "' ";
        $result = $conn->query($query);
        if (!$result) die($conn->connect_error);
        $rows = $result->fetch_array();

        $branch = $rows['branch'];
        $authorityCode = $rows['authorityCode'];


        ?>
			<div class="top-title">
			<p>
				<span class="icon-comm">费</span>
				<span class="top-t"><?php echo $type ?></span>
			</p>
		</div>

        <div class="col-md-12">
            <div class="row">
            	<div class="addbtn">
            	
                <?php
                    if ($authorityCode <= 1){
                        echo <<<PRINT_BUTTON
                        	
                        	                        <span type="button" class="btn btn-default addBtn">
                            <i class="icon-add"></i><a href="./missionSubmit/rushMissionSubmit.php">新增</a>
                        </span>
                                                	                        <span type="button" class="btn btn-default addBtn">
                            <i class="icon-add icon-dele"></i><a href="./missionSubmit/MissionDelete.php?type=抢接任务">删除</a>
                        </span>


PRINT_BUTTON;

                    }
                ?>

                <?php
                if ($_SESSION['authorityCode'] <= 20){
                    echo <<<PRINT_BUTTON
                    	 <span type="button" class="btn btn-default addBtn">
                            <i class="icon-add icon-renw"></i><a href="missionList.php?type=抢接任务&branch={$branch}">我的任务</a>
                      </span>
PRINT_BUTTON;

                }
                ?>


                <!--                <button type="button" class="btn btn-default">-->
                <!--                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>编辑-->
                <!--                </button>-->
                <!--                <button type="button" class="btn btn-default">-->
                <!--                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除-->
                <!--                </button>-->

            </div>
            </div>
        </div>

        <div class="row memberTable">
            <div class="col-md-12">


                <table class="table" align="center">
                    <tr class="thhead">
                        <th width="10%">序号</th>
                        <th width="60%">任务名称</th>
                        <th width="15%">任务个数</th>
                        <th width="15%">剩余任务个数</th>
                    </tr>

                    <?php
                    require_once './db_login.php';
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) die($conn->connect_error);
                    mysqli_set_charset($conn, 'utf8');

//                    $query = "SELECT * FROM `rushmission` WHERE `leftnum` != 0 ORDER BY `rushmission`.`id` DESC";
                    $query = "SELECT * FROM `rushmission` WHERE 1  ORDER BY `rushmission`.`id` DESC";
                    $result = $conn->query($query);
                    if (!$result) die($conn->connect_error);

                    $index = 1;
                    while ($mission = $result->fetch_array()){
                        echo <<<TABLE
                    <tr class="ttd">
                        <td>$index</td>
                        <td><a href = "missionGrab.php?branch={$branch}&title={$mission['title']}">{$mission['title']}</a></td>
                        <td>{$mission['num']}</td>
                        <td>{$mission['leftnum']}</td>
                        
                        
                    </tr>

TABLE;
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
</html>
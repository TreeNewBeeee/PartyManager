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
      <script src="./js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">

        #content {
            float: center;
            margin-left: 20px;
            margin-right: 20px;
        }

       
        table {

           
            border-collapse: separate;
            *border-collapse: collapse; /* IE7 and lower */
            border-spacing: 0;
        }


        td {
            
            text-align: center;
           

        }

    </style>
</head>
<body>
	<div class="new-wrap">
		<div class="top-title">
			<p>
				<span class="icon-comm">通</span>
				<span class="top-t">通知</span>
			</p>
		</div>
<div id="container">
    <div id="content" class="member">
        <div class="col-md-12">
            <div class="row">
                <?php
                $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位

//                echo $branch;
                ?>

                <div class="addbtn">
                	<span class="btn addBtn">
                    <i class="icon-add"></i><a href="person_create.php?branch=<?php echo $branch?>&type=党员">新增</a>
                </span>
                </div>
				

            </div>
        </div>

        <div class="row memberTable">
            <div class="col-md-12">
                <table class="table" align="center">
                    <tr class="thhead">
                        <th width="5%">序号</th>
                        <th width="10%">姓名</th>
                        <th width="20%">申请入党时间</th>
                        <th width="20%">列为积极分子时间</th>
                        <th width="20%">列为发展对象时间</th>
                        <th width="20%">备注</th>
                    </tr>
                    <?php

                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                    } else {
                        echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
                    }

                    $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位

                    require_once 'db_login.php';
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) die($conn->connect_error);
                    mysqli_set_charset($conn, 'utf8');

                    $query = "select * FROM person WHERE `branch` = '" . $branch . "' AND `type` = '党员'";
                    $result = $conn->query($query);
                    if (!$result) die($conn->connect_error);

                    $index = 1;
                    while ($rows = $result->fetch_array()) {
                        echo <<<TABLE
                        <tr class="ttd">
                        <td>$index</td>
                        <td class='td-name'><a href="person_detail.php?name={$rows['name']}&type=党员&branch={$branch}">{$rows['name']}</a></td>
                        <td>{$rows['applicationTime']}</td>
                        <td>{$rows['activistTime']}</td>
                        <td>{$rows['developmentTime']}</td>
                        <td>{$rows['remark']}</td>
                        
                    </tr>

TABLE;
                        $index++;
                    }


                    //                    echo $branch;
                    ?>

                </table>

            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
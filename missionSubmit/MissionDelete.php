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
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    <!-- Required Javascript -->
    <script src="./js/jquery-3.1.1.js"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">


        #content {
            float:center;
            margin-left: 20px;
            margin-right: 20px;
        }



        table {


            border-collapse: separate;
            *border-collapse: collapse; /* IE7 and lower */
            border-spacing: 0;
        }

        tbody tr:hover {

            background: linear-gradient(#fff,#ffdcb9);

        }


        th {

            padding: 10px;
            text-align: center;
            background-color: #FF9999;
            background: -ms-linear-gradient(top, #fff,  #ffdcb9);        /* IE 10 */
            background:-moz-linear-gradient(top,#b8c4cb,#f6f6f8);/*火狐*/
            background:-webkit-gradient(linear, 0% 0%, 0% 100%,from(#b8c4cb), to(#f6f6f8));/*谷歌*/
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#ffdcb9));      /* Safari 4-5, Chrome 1-9*/
            background: -webkit-linear-gradient(top, #fff, #ffdcb9);   /*Safari5.1 Chrome 10+*/
            background: -o-linear-gradient(top, #fff, #ffdcb9);  /*Opera 11.10+*/
        }

        td {

            text-align: center;


        }

        th:first-child {

            border-radius: 6px 0 0 0;

        }

        th:last-child {

            border-radius: 0 6px 0 0;

        }

        tr:last-child td:first-child {

            border-radius: 0 0 0 6px;

        }

        tr:last-child td:last-child {

            border-radius: 0 0 6px 0;

        }

        a:link {
            color:#FF0000;
            text-decoration:underline;
        }
        a:visited {
            color:#00FF00;
            text-decoration:none;
        }
        a:hover {
            color:#000000;
            text-decoration:none;
        }
        a:active {
            color:#FFFFFF;
            text-decoration:none;
        }


    </style>
</head>
<body>

<div id="container">

    <div id="content">

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
                   <h3><i class="fa fa-calendar"></i>&nbsp;删除定期任务</h3>
Jump;
                break;

            case '抢接任务':
                echo <<<Jump
                   <h3><i class="fa fa-send"></i>&nbsp;删除抢接任务</h3>
Jump;
                break;

            case '指定任务':
                echo <<<Jump
                   <h3><i class="fa fa-send"></i>&nbsp;删除指定任务</h3>
Jump;
                break;

            case '亮点工作':
                echo <<<Jump
                   <h3><i class="fa fa-star"></i>&nbsp;删除亮点工作</h3>
Jump;
                break;
        }
        ?>

        <div class="row">
            <div class="col-md-12">
                <hr>
                <table class="table table-hover" align="center">
                    <tr class="warning">
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
                                <tr>
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
                                <tr>
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
                                <tr>
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
                                <tr>
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
        </div>
    </div>
</div>

</body>
</html>

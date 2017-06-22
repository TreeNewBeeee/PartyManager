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
            float: center;
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
            color: #FF0000;
            text-decoration: underline;
        }

        /*a:visited {*/
            /*color: #00FF00;*/
            /*text-decoration: none;*/
        /*}*/

        a:hover {
            color: #000000;
            text-decoration: none;
        }

        a:active {
            color: #FFFFFF;
            text-decoration: none;
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

        <h3><i class="fa fa-hand-paper-o"></i>&nbsp;<?php echo $type ?></h3>
        <hr>
        <div class="col-md-12">
            <div class="row">
                <?php
                    if ($authorityCode <= 1){
                        echo <<<PRINT_BUTTON
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a
                                        href="./missionSubmit/rushMissionSubmit.php">&nbsp;新增</a>
                            </button>
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span><a href="./missionSubmit/MissionDelete.php?type=抢接任务">删除</a>
                            </button>

PRINT_BUTTON;

                    }
                ?>

                <?php
                if ($_SESSION['authorityCode'] <= 20){
                    echo <<<PRINT_BUTTON
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                            
                            <a href="missionList.php?type=抢接任务&branch={$branch}">&nbsp;我的任务</a>
                        </button> 
                        

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

        <div class="row">
            <div class="col-md-12">
                <hr>

                <table class="table table-condensed" align="center">
                    <tr class="warning">
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

</body>
</html>
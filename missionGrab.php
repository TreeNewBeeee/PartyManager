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
            margin-left: 50px;
            margin-right: 20px;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            font: 14px Verdana, Arial, Geneva, sans-serif;
            color: #404040;
            background: #fff;
        }

        img {
            border-style: none;
        }

        .box {
            position: relative;
            float: left;
        }

        input.uploadFile {
            position: absolute;
            right: 0px;
            top: 0px;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer;
            width: 276px;
            height: 36px;
            overflow: hidden;
        }

        input.textbox {
            float: left;
            padding: 5px;
            color: #999;
            height: 24px;
            line-height: 24px;
            border: 1px #ccc solid;
            width: 200px;
            margin-right: 4px;
        }

        a.link {
            float: left;
            display: inline-block;
            padding: 4px 16px;
            color: #fff;
            font: 14px "Microsoft YaHei", Verdana, Geneva, sans-serif;
            cursor: pointer;
            background-color: #ff9933;
            line-height: 28px;
            text-decoration: none;
        }

        .button {
            color: #fef4e9;
            border: solid 1px #da7c0c;
            background: #f78d1d;
            background: -webkit-gradient(linear, left top, left bottom, from(#faa51a), to(#f47a20));
            background: -moz-linear-gradient(top, #faa51a, #f47a20);
            /*filter:  progid:DXImageTransform.Microsoft.gradient(start Colorstr='#faa51a', end Colorstr='#f47a20');*/
            display: inline-block;
            outline: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font: 14px/100% Arial, Helvetica, sans-serif;
            padding: .5em 2em .55em;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .3);
            -webkit-border-radius: .5em;
            -moz-border-radius: .5em;
            border-radius: .5em;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
        }

        .button:hover {
            background: #f47c20;
            background: -webkit-gradient(linear, left top, left bottom, from(#f88e11), to(#f06015));
            background: -moz-linear-gradient(top, #f88e11, #f06015);
            /*filter:  progid:DXImageTransform.Microsoft.gradient(start Colorstr='#f88e11', end Colorstr='#f06015');*/
            text-decoration: none;
        }

        .button:active {
            color: #fcd3a5;
            background: -webkit-gradient(linear, left top, left bottom, from(#f47a20), to(#faa51a));
            background: -moz-linear-gradient(top, #f47a20, #faa51a);
            /*filter:  progid:DXImageTransform.Microsoft.gradient(start Colorstr='#f47a20', end Colorstr='#faa51a');*/
            position: relative;
            top: 1px;
        }

        .file input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
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

$title = isset($_GET['title']) ? $_GET['title'] : NULL;    // 获取任务名称
$branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取支部名称

require_once './db_login.php';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($conn->connect_error) die($conn->connect_error);
mysqli_set_charset($conn, 'utf8');

//echo $title;
$query = "SELECT * FROM `rushmission` WHERE `title`='" . $title . "'";
$result = $conn->query($query);
if (!$result) die($conn->connect_error);
$rows = $result->fetch_array();

//$result->close();
//$conn->close();

?>
<div id="container">

    <div id="content">
<!--        <form action="" method="post" enctype="multipart/form-data">-->
            <h2><i class="fa fa-wpforms"></i>&nbsp;查看任务</h2>
            <hr>
            <div class="row">
                <div class="col-xs-4">
                    <p>发布人：<input type="text" name="publisher" value="<?php echo $rows['publisher'] ?>"></p>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-4">
                    任务名称：<input type="text" name="title" value="<?php echo $title ?>" readonly="readonly">

                </div>

            </div>
            <br>

            <div class="row">
                <div class="col-xs-8">
                    <div style="float: left;">
                        相关文件：
                    </div>
                    <div class="box">

<!--                        <input type="text" name="file" value="--><?php //echo iconv('UTF-8//IGNORE', 'UTF-8//IGNORE', $rows['annix']) ?><!--" readonly="readonly">-->
                        <a href="./Files/<?php echo iconv('UTF-8//IGNORE', 'UTF-8//IGNORE', $rows['annix']) ?>"><?php echo $rows['annix'] ?></a>


                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-xs-10">
                    任务内容：<input type="text" name="details" maxlength="70" size="70" style="height: 50px"
                                value="<?php echo $rows['details'] ?>" readonly="readonly">
                </div>
            </div>
            <br>


            <div class="row">
                <div class="col-xs-4">
                    完成时限：<?php echo $rows['timeLimit'] ?>
                </div>
                <div class="col-xs-8">
                    <input type="hidden" name="branch" value="">
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-xs-4">
                    抢接记录：
                </div>
                <br>
                <br>
                <div class="col-md-10">
                    <table class="table">
                        <tr class="warning">
                            <th width="10%">序号</th>
                            <th width="60%">抢接单位</th>
                            <th width="15%">抢接时间</th>
                            <th width="15%">任务状态</th>
                        </tr>
                        <?php
                        $index = 1;
                        $query = "select * from `missionlog` WHERE `title` = '".$title."' and `type` = '抢接任务'";
                        $result = $conn->query($query);
                        while ($grabed = $result->fetch_array()){
                            echo <<<TABLE
                                <td>$index</td>
                                <td>{$grabed['branch']}</td>
                                <td>{$grabed['publishTime']}</td>
                                <td>{$grabed['status']}</td>
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

        <?php
            if ($authorityCode <= 20 and $rows['leftnum'] > 0){
                echo <<<GRAB
                <div style="margin:0 auto;width:200px;">
                    <a href="handleGrab.php?branch={$branch}&title={$title}"><button class="button orange">抢接该任务</button></a>
                </div>

GRAB;

            }

        ?>





<!--        </form>-->








    </div>

</div>

</body>
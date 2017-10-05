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
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
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

$query = "SELECT * FROM `missionlog` WHERE `title`='" . $title . "' AND `branch`='" . $branch . "' ";
$result = $conn->query($query);
if (!$result) die($conn->connect_error);
$rows = $result->fetch_array();

?>
<div id="container">

    <div id="content">
        <form action="scoreTheMission.php?title=<?php echo $rows['title'] ?>&branch=<?php echo $branch ?>"
              method="post">
            <h2><i class="fa fa-wpforms"></i>&nbsp;查看任务</h2>
            <hr>
            <div class="row">
                <div class="col-xs-4">
                    <p>发布人：<?php echo $rows['publisher'] ?></p>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-4">
                    任务名称：<input type="text" name="title" value="<?php echo $rows['title'] ?>" readonly="readonly">

                </div>

            </div>
            <br>

            <div class="row">
                <div class="col-xs-8">
                    <div style="float: left;">
                        相关文件：
                    </div>
                    <div class="box">


                        <a href="./Files/<?php echo iconv('UTF-8//IGNORE', 'UTF-8//IGNORE', $rows['annix']) ?>"><?php echo $rows['annix'] ?></a>


                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-xs-10">
                    任务内容：<input type="text" name="rwnr" maxlength="70" size="70" style="height: 50px"
                                value="<?php echo $rows['details'] ?>" readonly="readonly">
                </div>
            </div>
            <br>
            <div class="row">


                <?php
                if ($rows['status'] == '已上传' && ($authorityCode <= 1)) {
                    echo <<<SCORE
                            <div class="col-xs-8">
                                得分：<input type="text" name="score" value="{$rows['score']}">
                            </div>
                    
                            <div class="col-xs-4"> 
                                  <button class="button orange" type="submit">党委秘书赋分</button>
                            </div><br><br><br>

SCORE;

                }



                $result->close();
                $conn->close();
                ?>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-4">
                    完成时限：<?php echo $rows['timeLimit'] ?>
                </div>
                <div class="col-xs-8">
                </div>
            </div>
            <br>
            <!--<div class="row">
                <div class="col-xs-8">
                    <div style="float: left;">
                        查看附件：
                    </div>
                    <div class="box">

                        <a href="./Files/<?php /*echo iconv('UTF-8//IGNORE', 'UTF-8//IGNORE', $rows['annixSubmit']) */?>">浏览支部上传附件</a>

                    </div>
                </div>
                <div class="col-xs-8">
                </div>
            </div>
            <br>-->

        </form>



        <?php
/*        require_once './db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "SELECT * FROM `person` WHERE `name`='" . $username . "' AND `branch`='" . $branch . "' ";
        $result = $conn->query($query);
        if (!$result) die($conn->connect_error);
        $person = $result->fetch_array();

        if ($rows['status'] == '已发布' && $person['authorityCode'] <= 20) {

            echo <<<UPDATE
                    <form action="updateFile.php?title={$title}&branch={$branch}" method="post" enctype="multipart/form-data">
                        <br><br>
            
            
                        <div class="row">
                            <div class="col-xs-8">
                                <div style="float: left;">
                                    上传附件：
                                </div>
                                <div class="box">
                                    <input type="file" name="file" id="file"/>
                                </div>
            
                                <input type="hidden" name="flag" value="update"/>
            
                            </div>
                            <div class="col-xs-4">
                                <button class="button orange" type="submit">支部上传</button>
                            </div>
            
                    </form>

UPDATE;

        }

        $result->close();
        $conn->close();
        */?>

    </div>

</div>

</body>
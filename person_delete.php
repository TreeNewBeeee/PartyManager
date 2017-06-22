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
            margin-left: 50px;
            margin-right: 20px;
        }

        .button {
            color: #fef4e9;
            border: solid 1px #da7c0c;
            background: #f78d1d;
            background: -webkit-gradient(linear, left top, left bottom, from(#faa51a), to(#f47a20));
            background: -moz-linear-gradient(top,  #faa51a,  #f47a20);
            /*filter:  progid:DXImageTransform.Microsoft.gradient(start Colorstr='#faa51a', end Colorstr='#f47a20');*/
            display: inline-block;
            outline: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font: 14px/100% Arial, Helvetica, sans-serif;
            padding: .5em 2em .55em;
            text-shadow: 0 1px 1px rgba(0,0,0,.3);
            -webkit-border-radius: .5em;
            -moz-border-radius: .5em;
            border-radius: .5em;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            box-shadow: 0 1px 2px rgba(0,0,0,.2);
        }
        .button:hover {
            background: #f47c20;
            background: -webkit-gradient(linear, left top, left bottom, from(#f88e11),to(#f06015));
            background: -moz-linear-gradient(top,  #f88e11,  #f06015);
            /*filter:  progid:DXImageTransform.Microsoft.gradient(start Colorstr='#f88e11', end Colorstr='#f06015');*/
            text-decoration: none;
        }
        .button:active {
            color: #fcd3a5;
            background: -webkit-gradient(linear, left top, left bottom, from(#f47a20),to(#faa51a));
            background: -moz-linear-gradient(top,  #f47a20,  #faa51a);
            /*filter:  progid:DXImageTransform.Microsoft.gradient(start Colorstr='#f47a20', end Colorstr='#faa51a');*/
            position: relative;
            top: 1px;
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

    $name = isset($_GET['name']) ? $_GET['name'] : NULL;    // 获取姓名



?>
<div id="container">

    <div id="content">
        <h3><i class="fa fa-close"></i>&nbsp;信息删除</h3>

        <hr>

        <br>

        <div class="row">
            <form action="" method="post">
                <div style="margin:0 auto;width:350px;">
                    姓名：<input type="text" name="name" value="<?php echo $name?>">
                </div>
                <br>
                <div style="margin:0 auto;width:200px;">
                    <br><button class="button orange">提交</button>
                </div>
            </form>
        </div>
    </div>
    <?php
        $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取类别
        $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取支部
        if (isset($_POST['name'])){
            require_once 'db_login.php';
            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
            if ($conn->connect_error) die($conn->connect_error);
            mysqli_set_charset($conn, 'utf8');

            $query = "DELETE FROM `person` WHERE `person`.`name` = '".$_POST['name']."' ";
            $conn->query($query);
            $conn->close();

//            echo $type.'+++';
//            echo $branch;
            switch ($type){
                case '党员':
                    echo "<script> window.location.href='./member.php?branch=".$branch."';</script>";
                    break;
                case '预备党员':
                    echo "<script> window.location.href='./pre_member.php?branch=".$branch."';</script>";
                    break;
                case '发展对象':
                    echo "<script> window.location.href='./develop_member.php?branch=".$branch."';</script>";
                    break;
                case '积极分子':
                    echo "<script> window.location.href='./active_member.php?branch=".$branch."';</script>";
                    break;
                case '申请入党':
                    echo "<script> window.location.href='./application_member.php?branch=".$branch."';</script>";
                    break;
            }


        }

    ?>
</div>

</body>
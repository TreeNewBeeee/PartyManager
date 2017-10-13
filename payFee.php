<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-10-05
 * Time: 21:31
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
    <link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>

    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">

    </style>
</head>

<body>
<div class="new-wrap">
    <div class="top-title">
        <p>
            <span class="icon-comm">录</span>
            <span class="top-t">实缴录入</span>
        </p>
    </div>
    <div id="container" class="new-martop">
        <div id="content">
            <div class="row">
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                } else {
                    echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";

                }
                $branch = $_GET['branch'];
                $name = $_GET['name'];
                $payYear = $_GET['year'];
                $payMonth = $_GET['month'];

                ?>

                <form action="#" method="post" class="layui-form new-form">
                    <div class="d-info clearfix">
                        <div class="fo-item">
                            <label for="" class="layui-form-label">姓名</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="name"
                                       value="<?php echo $name ?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">党支部名称</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="branch"
                                       value="<?php echo $branch ?>">
                            </div>
                        </div>

                        <div class="fo-item">
                                <label for="" class="layui-form-label">实缴</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="paid">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">缴费年</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="payYear"
                                       value="<?php echo $payYear ?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">缴费月</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="payMonth"
                                       value="<?php echo $payMonth ?>">
                            </div>
                        </div>


                    </div>

                    <div class="info-sub">
                        <input type="submit" value="提交"/>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php
    if (isset($_POST['paid'])){
        require_once 'db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        echo $_POST['paid'],$_POST['name'],$_POST['branch'],$_POST['payYear'],$_POST['payMonth'];

        $query = "UPDATE `payment` SET `paid`='".$_POST['paid']."',`isPaid`= 1 
                WHERE `name` = '".$_POST['name']."' AND `branch` = '".$_POST['branch']."'
                AND `pay_year` = '".$_POST['payYear']."' AND `pay_month` = '".$_POST['payMonth']."'";

        $conn->query($query);
        $conn->close();

        echo "<script> window.location.href='./feeinfo_new.php?branch={$branch}';</script>";
    }
?>


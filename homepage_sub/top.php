<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-treeview.css" rel="stylesheet">
    <!-- Required Javascript -->
    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap-treeview.min.js"></script>

    <style type="text/css">
        
       #header{
            padding-top: 27px ;
            text-align: right;

       }

        .headerimg {
            background-image: url('../images/background.jpg');
            background-size: 100% ;
            background-repeat:no-repeat;
            background-attachment:fixed; 

        }

        table {

            border-collapse: separate;
            border-spacing: 10px 5px;
        }

        th {
            height: 40px;
            width: 400px;
            border: 1px solid gray;
            padding: 10px;
        }

        td {
            height: 280px;
            width: 400px;
            border: 1px solid gray;
            padding: 10px;
        }

        .breadcrumb {
            padding: 8px 135px;
            list-style: none;
            background-color: transparent;
            border-radius: 2px;
    </style>
</head>
<?php
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $authorityCode = $_SESSION['authorityCode'];
    require_once '../db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');

    $query = "select * from `person` WHERE `name` = '".$username."'";
    $result = $conn->query($query);
    $row = $result->fetch_array();
    $branch = $row['branch'];



}
?>
<body>

<div id="container">

    <div id="header" class="headerimg">
        <ol class="breadcrumb">
            <li><a href="../person_detail.php?name=<?php echo $username ?>" target="mainFrame"><?php echo $username ?></a> &nbsp;&nbsp;欢迎您</li>
            <?php
//            if ($authorityCode == 1 or $authorityCode == 0){     // 此行仅供测试使用
            if ($authorityCode == 1){
                // 党委秘书：定期任务/指定任务/亮点工作/抢接任务已上传时提醒
                $query = "select * from `msg` WHERE `status` = '已上传' AND `processing` = '未处理'";
                $result = $conn->query($query);
                $msgNum = $result->num_rows;

            }elseif($authorityCode == 20){
                // 各支部党务助理：已发布/已打分/已驳回时提醒
                $query = "select * from `msg` WHERE (`status` = '已打分' OR `status` = '已驳回' OR `status` = '已发布') AND `branch` = '".$branch."' AND `processing` = '未处理'";
                $result = $conn->query($query);
                $msgNum = $result->num_rows;
            }else{
                $msgNum = 0;
            }


            ?>
            <li>
                <a href="../newMSG.php?branch=<?php echo $branch?>" target="mainFrame">新消息 <span class="badge"><?php echo $msgNum?></span></a>
            </li>
            <li><a href="fp_middle.php" target="mainFrame">主页</a></li>
            <li><a href="../help.html" target="mainFrame">帮助</a></li>
            <li><a href="../index.php" target="_parent">退出</a></li>
        </ol>
    </div>



</body>

</html>
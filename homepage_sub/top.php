<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-treeview.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="../js/jquery-3.1.1.js"></script>-->
    <script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/bootstrap-treeview.min.js"></script>

    <style type="text/css">
        

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
            /*padding: 8px 135px;*/
            list-style: none;
            background-color: transparent;
            border-radius: 2px;
            }
          .head-title{
		    font-size: 28px;
		    color: #FFFFFF;
		    text-shadow: 0 1px 1px #AE0000;
          }
          
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
	
    <div id="header" class="headerimg clearfix">
		<div class="header-l">

    			技保中心党建管理执行考核系统

		</div>
       	<div class="header-r">
       		 <ul>
            <li><a href="../person_detail.php?name=<?php echo $username ?>" target="mainFrame"><i class="icon-user"></i><?php echo $username ?></a> &nbsp;&nbsp;欢迎您</li>
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
                <a href="../newMSG.php?branch=<?php echo $branch?>" target="mainFrame"><i class="icon-new"></i>新消息 <span class="badge new-badge"><?php echo $msgNum?></span></a>
            </li>
            <li><a href="../help.html" target="mainFrame"><i class="icon-help"></i>帮助</a></li>
            <li><a href="../changeKey.php" target="mainFrame"><i class="icon-cPwd"></i>修改密码</a></li>
            <li><a href="../index.php" target="_parent"><i class="icon-out"></i>退出</a></li>
        </ul>
       	</div>
    </div>



</body>

</html>
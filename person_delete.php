<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/bootstrap-treeview.min.js"></script>

    <style type="text/css">

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
	<div class="new-wrap">
			<div class="top-title">
			<p>
				<span class="icon-comm">删</span>
				<span class="top-t">信息删除</span>
			</p>
		</div>
    <div id="content">
        <div class="row">
            <form action="" method="post" class="layui-form new-form clearfix">
            		<div class="dele-name">
            			<span class="name">姓名</span>
            			<span class="name-con"><?php echo $name?></span>
            		</div>
					<input type="submit" value="提交" class="btn dele-name"/>
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
</html>
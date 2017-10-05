<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-06-26
 * Time: 23:22
 */
?>

<?php
session_start();
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $authorityCode = $_SESSION['authorityCode'];
    require_once './db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');


}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>修改密码</title>
    <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
   	<link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
      <script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>
	<style type="text/css">
	.d-info{
		margin-top: 10px;
		width: 400px;
	}
		.d-info .fo-item{
			width: 100%;
		}
		.d-info .info-sub{
			margin-top: 20px;
		}
		.new-form{
			width: 400px;
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

?>
	<div class="new-wrap">
		<div class="top-title">
			<p>
				<span class="icon-comm">修</span>
				<span class="top-t">修改密码</span>
			</p>
		</div>

    <div id="content">
        <form action="#" method="post" enctype="multipart/form-data" class="layui-form new-form">
            	<div class="d-info clearfix">
        	
        	    <div class="fo-item">
						<label for="" class="layui-form-label">原始密码</label>
					<div class="layui-input-inline">
						<input type="password" class="layui-input" name="originKey">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">新密码</label>
					<div class="layui-input-inline">
						<input type="password" class="layui-input" name="newKey">
					</div>
				</div>
				 <div class="fo-item">
						<label for="" class="layui-form-label">再次输入</label>
					<div class="layui-input-inline">
						<input type="password" class="layui-input" name="repeatNewKey">
					</div>
				</div>
				</div>
       
                <div class="info-sub">
					<input type="submit" value="修改"  name="submit"/>
				</div>
        </form>
    </div>

</div>

<?php
if (isset($_POST['originKey'])){

//    echo $_POST['originKey'];
    $originKey = isset($_POST['originKey']) ? $_POST['originKey'] : null;
    $newKey = isset($_POST['newKey']) ? $_POST['newKey'] : null;
    $repeatNewKey = isset($_POST['repeatNewKey']) ? $_POST['repeatNewKey'] : null;
//    echo $originKey;

    $query = "SELECT * FROM `person` WHERE `name` = '".$username."' AND `password` = '".$originKey."'";
    $result = $conn->query($query);
    $rows = $result->num_rows;
    if ($rows != 0){
        if ($newKey == $repeatNewKey){
            $query = "UPDATE `person` SET `password` = '".$newKey."' WHERE `name` = '".$username."'";
            $conn->query($query);
            echo "<script>alert('密码修改成功');location.href='#';</script>";
        }else{
            echo "<script>alert('密码不一致，请重新输入');location.href='#';</script>";
        }
    }else{
        echo "<script>alert('原始密码输入错误');location.href='#';</script>";
    }

}


?>

</body>



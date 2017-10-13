<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../layui/css/layui.css"/>
        	
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>	
        <script src="../js/jquery-1.7.1.js"></script>
        <script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
        	
        <title></title>
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
.fo-item label{
	width: 130px;
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

$branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位

?>
	<div class="new-wrap">
		<div class="top-title">
			<p>
				<span class="icon-comm">删</span>
				<span class="top-t">删除年初计划-<?php echo $branch?></span>
			</p>
		</div>
    <div id="container">
       <div id="content">
        <div class="row">

            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data" class="layui-form new-form clearfix">
<div class="d-info clearfix">	
                    	<div class="fo-item">                        	
                             <label for="year" class="layui-form-label">年份</label>
                             <div class="layui-input-inline">
                             	
                              <input type="text" class="layui-input" id="year" name="year" placeholder="请填写四位年份如：<?php echo date("Y") ?>">
                             </div>
                        </div>
             <div class="info-sub">
					<input type="submit" value="上传"  name="submit"/>
				</div>
				</div>
                </form>
            </div>


        </div>


    </div>


</div>

</body>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-04-27
 * Time: 01:11
 */
// TODO：未添加权限

if (isset($_POST['year'])){
    require_once '../db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');

    $query = "SELECT * FROM `plans` WHERE `branch` = '".$branch."' AND `year` = '".$_POST['year']."' AND `type` = '年初计划'";
    $result = $conn->query($query);
    $row = $result->fetch_array();
    $filename = $row['fileName'];

    // 删除文件
    if (empty($filename)) {
        $file = "../Files/".$filename."";
        if (!unlink($file))
        {
            echo ("Error deleting $file");
        }
        else
        {
            echo ("Deleted $file");
        }
    }

    // 更新数据库

    $query = "DELETE FROM `plans` WHERE `branch` = '".$branch."' AND `year` = '".$_POST['year']."' AND `type` = '年初计划'";
    $conn->query($query);
    $conn->close();

    echo <<<JUMP
            <script language="JavaScript">
                   alert("删除成功");
                   self.location='preYearPlanTable.php?branch={$branch}';     
            </script>
JUMP;

}

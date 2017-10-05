<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>年初计划</title>
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

$branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位

?>

<div class="container">


    <div class="row">

        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <h2>删除年初计划-<?php echo $branch?></h2>
                <hr/>
            </div>

        </div>

        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="year">年份</label>
                                <input type="text" class="form-control" id="year" name="year" placeholder="请填写四位年份如：<?php echo date("Y") ?>">
                            </div>
                        </div>
                    </div>




                    <button type="submit" class="btn btn-default">删除</button>
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

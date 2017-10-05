<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">


       .task{
       	margin-top: 10px;
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
$type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取任务类型
//$branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取支部名称

require_once './db_login.php';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($conn->connect_error) die($conn->connect_error);
mysqli_set_charset($conn, 'utf8');

$query = "SELECT * FROM `".$type."` WHERE `title`='" . $title . "'";
$result = $conn->query($query);
if (!$result) die($conn->connect_error);
$rows = $result->fetch_array();

?>
	<div class="new-wrap">
						<div class="top-title">
			<p>
				<span class="icon-comm">查</span>
				<span class="top-t">查看任务</span>
			</p>
		</div>

    <div id="content" class="task">
        <form action="scoreTheMission.php?title=<?php echo $rows['title'] ?>&branch=<?php echo $branch ?>"
              method="post">
              <table class="table table-type-1">
              	<tbody class="view-task">
              		<tr class="no-topB">
              			<th width="10%">发布人</th>
              			<td><?php echo $rows['publisher'] ?></td>
              		</tr>
              		<tr>
              			<th width="10%">任务名称</th>
              			<td><?php echo $rows['title'] ?></td>
              		</tr>
              		<tr>
              			<th width="10%">相关文件</th>
              			<td><a href="./Files/<?php echo iconv('UTF-8//IGNORE', 'UTF-8//IGNORE', $rows['annix']) ?>"><?php echo $rows['annix'] ?></a></td>
              		</tr>
              		<tr>
              			<th width="10%">任务内容</th>
              			<td><div class="view-con">
              				<?php echo $rows['details'] ?>
              			</div></td>
              		</tr>              		
              		<tr>
              			<th width="10%">完成时限</th>
              			<td><?php echo $rows['timeLimit'] ?></td>
              		</tr>
              	</tbody>
              </table>
            <!--<div class="row">
                <div class="col-xs-12">
						
                    <div class="view-task clearfix"><div class="view-title">发布人</div><div class="view-con"><?php echo $rows['publisher'] ?></div></div>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12">
                    <div class="view-task clearfix"><div class="view-title">任务名称</div><div class="view-con"><?php echo $rows['title'] ?></div></div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="view-task clearfix"><div class="view-title">相关文件</div><div class="view-con"><a href="./Files/<?php echo iconv('UTF-8//IGNORE', 'UTF-8//IGNORE', $rows['annix']) ?>"><?php echo $rows['annix'] ?></a></div></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="view-task clearfix"><div class="view-title">任务内容</div><div class="view-con"><?php echo $rows['details'] ?></div></div>
            </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="view-task clearfix"><div class="view-title">完成时限</div><div class="view-con"><?php echo $rows['timeLimit'] ?></div></div>
                </div>
            </div>
            <br>-->



        </form>





    </div>

</div>

</body>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-treeview.css" rel="stylesheet">
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

//echo $title;
$query = "SELECT * FROM `rushmission` WHERE `title`='" . $title . "'";
$result = $conn->query($query);
if (!$result) die($conn->connect_error);
$rows = $result->fetch_array();

//$result->close();
//$conn->close();

?>
	<div class="new-wrap">
						<div class="top-title">
			<p class="no-marT">
				<span class="icon-comm">查</span>
				<span class="top-t">查看任务</span>
			</p>
		</div>

    <div id="content" class="member">
<!--        <form action="" method="post" enctype="multipart/form-data">-->
              <table class="table table-type-1 table-type-2">
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
                <div class="col-xs-4">
                    <p>发布人：<input type="text" name="publisher" value="<?php echo $rows['publisher'] ?>"></p>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-4">
                    任务名称：<input type="text" name="title" value="<?php echo $title ?>" readonly="readonly">

                </div>

            </div>
            <br>

            <div class="row">
                <div class="col-xs-8">
                    <div style="float: left;">
                        相关文件：
                    </div>
                    <div class="box">

<!--                        <input type="text" name="file" value="--><?php //echo iconv('UTF-8//IGNORE', 'UTF-8//IGNORE', $rows['annix']) ?><!--" readonly="readonly">-->
                        <!--<a href="./Files/<?php echo iconv('UTF-8//IGNORE', 'UTF-8//IGNORE', $rows['annix']) ?>"><?php echo $rows['annix'] ?></a>


                    </div>
                </div>
            </div>
            <br>
            <br>-->
            <!--<div class="row">
                <div class="col-xs-10">
                    任务内容：<input type="text" name="details" maxlength="70" size="70" style="height: 50px"
                                value="<?php echo $rows['details'] ?>" readonly="readonly">
                </div>
            </div>
            <br>


            <div class="row">
                <div class="col-xs-4">
                    完成时限：<?php echo $rows['timeLimit'] ?>
                </div>
                <div class="col-xs-8">
                    <input type="hidden" name="branch" value="">
                </div>
            </div>
            <br>-->

            <div class="row memberTable newmember">
                <div class="basic-info">
					<p>
                    	抢接记录：
					</p>
                </div>
                <div class="">
                    <table class="table">
                        <tr class="thhead">
                            <th width="10%">序号</th>
                            <th width="60%">抢接单位</th>
                            <th width="15%">抢接时间</th>
                            <th width="15%">任务状态</th>
                        </tr>
                        <?php
                        $index = 1;
                        $query = "select * from `missionlog` WHERE `title` = '".$title."' and `type` = '抢接任务'";
                        $result = $conn->query($query);
                        while ($grabed = $result->fetch_array()){
                            echo <<<TABLE
                           	<tr class="ttd">
                                <td>$index</td>
                                <td>{$grabed['branch']}</td>
                                <td>{$grabed['publishTime']}</td>
                                <td>{$grabed['status']}</td>
                            </tr>
TABLE;
                            $index++;

                        }
                        $result->close();
                        $conn->close();

                        ?>

                    </table>
                </div>
            </div>

        <?php
            if ($authorityCode <= 20 and $rows['leftnum'] > 0){
                echo <<<GRAB
                <div style="margin:0 auto;width:200px;">
                    <a href="handleGrab.php?branch={$branch}&title={$title}"><button class="button zhibubtn">抢接该任务</button></a>
                </div>

GRAB;

            }

        ?>





<!--        </form>-->








    </div>

</div>

</body>
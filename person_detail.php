<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script src="./js/bootstrap-treeview.min.js"></script>

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
    $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取类别
    $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取支部
    require_once 'db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');

    $query = "select * FROM person WHERE `name` = '" . $name . "'";
    $result = $conn->query($query);
    if (!$result) die($conn->connect_error);

    $person = $result->fetch_array();

?>

	<div class="new-wrap">
		<div class="top-title">
			<p>
				<span class="icon-comm">人</span>
				<span class="top-t">人员信息</span>
			</p>
		</div>
    <div id="content" class="member">
        <div class="col-md-12">
            <div class="row">
                <div class="addbtn">
                	<span class="btn addBtn">
                  <a href="person_edit.php?name=<?php echo $name?>&type=<?php echo $type?>&branch=<?php echo $branch?>">编辑</a> </span>
                
                                	<span class="btn addBtn">
                  <a href="person_delete.php?name=<?php echo $name?>&type=<?php echo $type?>&branch=<?php echo $branch?>">删除</a>
                </span>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

				<div class="basic-info"><p>基本信息:</p></div>
                
                <table class="table basic-table" align="center">
                    <tr>
                        <th class="">姓名</th>
                        <td><?php echo $person['name'] ?></td>
                        <th class="">性别</th>
                        <td><?php echo $person['gen'] ?></td>
                        <th class="">籍贯</th>
                        <td><?php echo $person['native'] ?></td>
                        <td rowspan="6" colspan="2" class="head-img"><img src="images/photos/<?php echo $person['name'] ?>.png" alt="<?php echo $person['name'] ?>.png"/></td>
                    </tr>



                    <tr>
                        <th class="">出生年月</th>
                        <td><?php echo $person['birth'] ?></td>
                        <th class="">户口所在</th>
                        <td><?php echo $person['household'] ?></td>
                        <th class="">政治面貌</th>
                        <td><?php echo $person['type'] ?></td>
                    </tr>
                    <tr>
                        <th class="">入职时间</th>
                        <td><?php echo $person['workTime'] ?></td>
                        <th class="">部门岗位</th>
                        <td><?php echo $person['sector'] ?></td>
                        <th class="">职务</th>
                        <td><?php echo $person['position'] ?></td>
                    </tr>
                    <tr>
                        <th class="">职称</th>
                        <td><?php echo $person['techTitle'] ?></td>
                        <th class="">学历</th>
                        <td><?php echo $person['eduBackground'] ?></td>
                        <th class="">毕业院校</th>
                        <td><?php echo $person['school'] ?></td>
                    </tr>
                    <tr>
                        <th class="">所学专业</th>
                        <td><?php echo $person['major'] ?></td>
                        <th class="">毕业时间</th>
                        <td><?php echo $person['graduationTime'] ?></td>
                        <th class=""></th>
                        <td></td>
                    </tr>
                    <tr class="tr-bottom">
                        <th class="">身份证号</th>
                        <td><?php echo $person['idCard'] ?></td>
                        <th class="">手机号码</th>
                        <td><?php echo $person['cell'] ?></td>
                        <th class=""></th>
                        <td></td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-12">

				<div class="basic-info"><p>党籍信息:</p></div>

                        <table class="table basic-table" align="center">
                            <tr>
                                <th class="">人员状态</th>
                                <td><?php echo $person['type'] ?></td>
                                <th class="">申请入党日期</th>
                                <td><?php echo $person['applicationTime'] ?></td>
                                <th class="">列为积极分子日期</th>
                                <td class="bd-right"><?php echo $person['activistTime'] ?></td>
                            </tr>
                            <tr>
                                <th class="">列为发展对象日期</th>
                                <td><?php echo $person['developmentTime'] ?></td>
                                <th class="">培养联系人</th>
                                <td><?php echo $person['trainner'] ?></td>
                                <th class="">所在党支部</th>
                                <td class="bd-right"><?php echo $person['branch'] ?></td>
                            </tr>
                            <tr>
                                <th class="">入党介绍人</th>
                                <td><?php echo $person['introducer'] ?></td>
                                <th class="">支部大会通过时间</th>
                                <td><?php echo $person['agreeTime'] ?></td>
                                <th class="">上级批准时间（预备）</th>
                                <td class="bd-right"><?php echo $person['probationaryTime'] ?></td>
                            </tr>
                            <tr class="tr-bottom">
                                <th class="">进入空管局党委时间</th>
                                <td><?php echo $person['workTime'] ?></td>
                                <th class="">预备转正日期</th>
                                <td><?php echo $person['preregularTime'] ?></td>
                                <th class="">上级批准时间（转正）</th>
                                <td class="bd-right"><?php echo $person['regularTime'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>

</html>
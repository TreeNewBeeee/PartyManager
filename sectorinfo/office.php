<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <link rel="stylesheet" href="./../fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-treeview.css" rel="stylesheet">
   	<link rel="stylesheet" type="text/css" href="../css/main.css"/>
    	
    <!-- Required Javascript -->
    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap-treeview.min.js"></script>




</head>



<body>
	<div class="new-wrap">
	
<?php
/*if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
}*/

$branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位

?>
		<div class="top-title">
			<p>
				<span class="icon-comm">党</span>
				<span class="top-t">党支部概述</span>
			</p>
		</div>
<div id="container" class="member">

    <div class="col-xs-12">

        <div class="row">
            <div class="col-md-12 text-r margtb">
                <a class="btn new-add" href="./programCreate.php?branch=<?php echo $branch?>&type=重点项目" role="button">新增支部重点项目</a>
                <a class="btn new-add" href="./programCreate.php?branch=<?php echo $branch?>&type=荣誉" role="button">新增支部荣誉</a>
            </div>

        </div>


        <br>

        <div class="col-md-12">
            <div class="row">

                <table class="table table-type-1" >
                    <tr class="no-topB">
                        <th>支部各类人员</th>
                        <td>党支部书记、党支部组织委员、党支部宣传委员、党支部保密委员、党支部青年委员</td>
                    </tr>

                    <?php
                    require_once '../db_login.php';
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) die($conn->connect_error);
                    mysqli_set_charset($conn, 'utf8');

                    $query = "SELECT * FROM `person` WHERE `branch` LIKE '".$branch."' ";
                    $result = $conn->query($query);
                    $totleNum = $result->num_rows;    // 总人数
                    $numP = [0,0,0];
                    $edu = [0,0,0];

                    $percentage[3] = [0,0,0];
                    while ($row = $result->fetch_array()){
                        $birth = $row['birth'];
                        $birthYear = (int)substr($birth,0,4);
                        $diff = (int)date("Y") - $birthYear;
                        if ($row['type'] == "党员" and $diff <= 35){
                            $numP[0] = $numP[0] + 1;
                        }elseif ($row['type'] == "党员" and $diff > 35 and $diff <= 45){
                            $numP[1] = $numP[1] + 1;
                        }elseif ($row['type'] == "党员" and $diff > 45 and $diff <= 59){
                            $numP[2] = $numP[2] + 1;
                        }

                        if ($row['eduBackground'] == "博士"){
                            $edu[0] = $edu[0] + 1;
                        }elseif ($row['eduBackground'] == "研究生"){
                            $edu[1] = $edu[1] + 1;
                        }

                    }
                    $edu[2] = $totleNum - $edu[0] - $edu[1];

                    $percentage[0] = round($numP[0]*100/$totleNum,2);
                    $percentage[1] = round($numP[1]*100/$totleNum,2);
                    $percentage[2] = round($numP[2]*100/$totleNum,2);

                    $p_edu[0] = round($edu[0]*100/$totleNum,2);
                    $p_edu[1] = round($edu[1]*100/$totleNum,2);
                    $p_edu[2] = round($edu[2]*100/$totleNum,2);

                    echo <<<TABLE
                        <tr>
                            <th class="">支部党员年龄结构</th>
                            <td>35岁以下党员{$numP[0]}人，占比{$percentage[0]}%。36至45岁党员{$numP[1]}人，占比{$percentage[1]}%。46至59岁党员{$numP[2]}人，占比{$percentage[2]}%</td>
                        </tr>
                        
                        <tr>
                            <th class="">指定任务</th>
                            <td>大专及本科{$edu[2]}人，占比{$p_edu[2]}%。硕士研究生{$edu[1]}人，占比{$p_edu[1]}%。博士{$edu[0]}人，占比{$p_edu[0]}%</td>
                        </tr>
                        
                        <tr>
                            <th class="">支部近年重点项目</th>
                            <td>
                                <ul>

TABLE;

                    $result->close();

                    $query = "SELECT * FROM `program` WHERE `branch` LIKE '".$branch."' AND `type` = '项目' ";
                    $result = $conn->query($query);

                    while ($row = $result->fetch_array()){
                        echo <<<LIST
                            <li>{$row['name']}</li>
                            

LIST;


                    }
                    echo <<<LISTEND
                            </ul>
                        </td>
                    </tr>

                    <tr>
                    <th class="">支部今年所获荣誉</th>
                        <td>
                            <ul>
LISTEND;

                    $result->close();

                    $query = "SELECT * FROM `program` WHERE `branch` LIKE '".$branch."' AND `type` = '荣誉' ";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_array()){
                        echo <<<LIST
                            <li>{$row['name']}</li>
                            

LIST;
                    }

                    echo <<<LISTEND
                            </ul>
                        </td>
                    </tr>

                    
LISTEND;

                    ?>








                </table>
            </div>
        </div>

    </div>
</div>
</div>

</body>
</html>
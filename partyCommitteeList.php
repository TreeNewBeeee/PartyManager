<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="./js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>
    <style type="text/css"></style>

</head>

<body>

	<div class="new-wrap">
<div id="container">

    <div id="">
    			<div class="top-title">
			<p>
				<span class="icon-comm">评</span>
				<span class="top-t">党委评价</span>
			</p>
		</div>
            <div class="memberTable new-martop">
            <div class="col-md-12">
                <table class="table" align="center">
                    <tr class="thhead">
                        <th width="30%">姓名</th>
                        <th width="30%">职务</th>
                        <th width="40%">详情</th>
                    </tr>

        <?php

            $flag=[0,0,0,0,0];
            $leader=[0,0,0,0,0];
            $arr =[0,0,0,0,0];
            $arr_authorCode = [0,0,0,0,0];


            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $authorityCode = $_SESSION['authorityCode'];
            } else {
                echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
            }

            $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取任务类型

            require_once './db_login.php';
            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
            if ($conn->connect_error) die($conn->connect_error);
            mysqli_set_charset($conn, 'utf8');

            $query = "SELECT * FROM person WHERE `authorityCode` >= '10' AND `authorityCode` <= '14'";
            $result = $conn->query($query);

            if (!$result) die($conn->connect_error);

            while ($rows = $result->fetch_array()){
                switch($rows['authorityCode']){

                    case"10":
                      $leader[0] = $rows['name'];
                      $arr_authorCode[0] = 10;
                      break;
                    case"11":
                      $leader[1] = $rows['name'];
                      $arr_authorCode[1] = 11;
                      break;
                    case"12":
                      $leader[2] = $rows['name'];
                      $arr_authorCode[2] = 12;
                      break;
                    case"13":
                      $leader[3] = $rows['name'];
                      $arr_authorCode[3] = 13;
                      break;
                    case"14":
                      $leader[4] = $rows['name'];
                      $arr_authorCode[4] = 14;
                      break;



                }

            }

            switch($authorityCode) {


                case "10":
                    $flag[0] = 1;
                    break;
                case "11":
                    $flag[1] = 1;
                    break;
                case "12":
                    $flag[2] = 1;
                    break;
                case "13":
                    $flag[3] = 1;
                    break;
                case "14":
                    $flag[4] = 1;
                    break;
            }

            foreach($flag as $key=>$value){

                if($value == 1)
                {
                   $arr[$key] = "href=partyCommitteeBranchList.php?name={$leader[$key]}&authorityCode={$arr_authorCode[$key]}";
                }
                else
                {
                   $arr[$key] = "href=partyCommitteeList.php";
                }
            }



                echo <<<SHOWTABLE

                
                    <tr class="ttd">
                        <td>$leader[0]</td>
                        <td>中心主任</td>
                        <td><a $arr[0]>查看</a></td>     
                    </tr>
                    <tr class="ttd">
                        <td>$leader[1]</td>
                        <td>中心副书记</td>
                        <td><a $arr[1]>查看</a></td>
                    </tr>
                    <tr class="ttd">
                        <td>$leader[2]</td>
                        <td>中心副主任</td>
                        <td><a $arr[2]>查看</a></td>
                    </tr>
                    <tr class="ttd">
                        <td>$leader[3]</td>
                        <td>中心副主任</td>
                        <td><a $arr[3]>查看</a></td>
                    </tr>
                    <tr class="ttd">
                        <td>$leader[4]</td>
                        <td>中心副主任</td>
                        <td><a $arr[4]>查看</a></td>
                    </tr>
                </table>
SHOWTABLE;

                 ?>

            </div>
        </div>
    </div>
    </div>
</div>

</body>
</html>
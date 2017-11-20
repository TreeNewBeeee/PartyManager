<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css"/>	
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

  
</head>

<body>
	<div class="new-wrap">
	



    <div id="content">


        <?php

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $authorityCode = $_SESSION['authorityCode'];
        } else {
            echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
        }

        $var_authorCode = isset($_GET['authorityCode']) ? $_GET['authorityCode'] : NULL;    // 获取领导编码
        $name = isset($_GET['name']) ? $_GET['name'] : NULL;    // 获取领导姓名


        $branchSecretary = ["孙莹涛", "叶庆康", "王涛", "王璐", "李牧", "付鹏亮", "张翼起", "王琰琳", "韩西胜", "孙晓勇"];

        $index = 0;

        $line1 = 5;
        $row1 = 10;

        $flag = 0;

        $arr_authorCode = [0, 0, 0, 0, 0];
        $leader = [0, 0, 0, 0, 0];

        $year = date("Y");

        $partyCommitteeScore = array_fill(0, $line1, array_fill(0, $row1, 0));

        foreach ($branchSecretary as $secretary) {

            require_once './db_login.php';
            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
            if ($conn->connect_error) die($conn->connect_error);
            mysqli_set_charset($conn, 'utf8');

            $query1 = "SELECT * FROM person WHERE `authorityCode` >= '10' AND `authorityCode` <= '14'";
            $result = $conn->query($query1);

            if (!$result) die($conn->connect_error);

            while ($rows = $result->fetch_array()) {
                switch ($rows['authorityCode']) {

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

            $query = "SELECT * FROM `partycommitteescore` WHERE `branchSecretary` LIKE '" . $secretary . "' AND `evaluateTime` = '" . $year . "' ";

            $result = $conn->query($query);
            if (!$result) die($conn->connect_error);

            while ($rows = $result->fetch_array()) {

                //提取并存储各领导的打分情况

                if (isset($rows['totalScore'])) {
                    foreach ($leader as $key => $value) {
                        //将领导姓名转化为对应编码

                        if ($value == $rows['name']) {
                            switch ($arr_authorCode[$key]) {
                                case "10":
                                    $partyCommitteeScore[0][$index] = $rows['totalScore'];
                                    break;
                                case "11":
                                    $partyCommitteeScore[1][$index] = $rows['totalScore'];
                                    break;
                                case "12":
                                    $partyCommitteeScore[2][$index] = $rows['totalScore'];
                                    break;
                                case "13":
                                    $partyCommitteeScore[3][$index] = $rows['totalScore'];
                                    break;
                                case "14":
                                    $partyCommitteeScore[4][$index] = $rows['totalScore'];
                                    break;

                            }
                        }

                    }

                }


            }

            $index++;


        }

        //不同领导对应存储分数的不同行，提取对应行

        switch ($var_authorCode) {
            case "10":
                $flag = 0;
                break;
            case "11":
                $flag = 1;
                break;
            case "12":
                $flag = 2;
                break;
            case "13":
                $flag = 3;
                break;
            case "14":
                $flag = 4;
                break;


        }

        ?>


		<div class="top-title" style="padding:0">
			<p>
				<span class="icon-comm">评</span>
				<span class="top-t"><?php echo $name ?>-评价列表</span>
			</p>
		</div>
        <div class="row memberTable new-martop">
            <div class="col-md-12">


                <table class="table" align="center">
                    <tr class="thhead">
                        <th width="30%">支部名称</th>
                        <th width="30%">总分</th>
                        <th width="40%">详情</th>
                    </tr>
                    <tr class="ttd">
                        <td>机关党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][0] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=孙莹涛&branch=机关党支部&name=<?php echo $name ?>">评分</a>
                        </td>
                    </tr>
                    <tr class="ttd">
                        <td>通信室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][1] ?></td>
                        <td>
                            <a href="partyCommitteeScore.php?branchSecretary=叶庆康&branch=通信室党支部&name=<?php echo $name ?>">评分</a>
                        </td>
                    </tr>
                    <tr class="ttd">
                        <td>通信运行室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][2] ?></td>
                        <td>
                            <a href="partyCommitteeScore.php?branchSecretary=王涛&branch=通信运行室党支部&name=<?php echo $name ?>">评分</a>
                        </td>
                    </tr>
                    <tr class="ttd">
                        <td>自动化数据室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][3] ?></td>
                        <td>
                            <a href="partyCommitteeScore.php?branchSecretary=王璐&branch=自动化数据室党支部&name=<?php echo $name ?>">评分</a>
                        </td>
                    </tr>
                    <tr class="ttd">
                        <td>雷达室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][4] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=李牧&branch=雷达室党支部&name=<?php echo $name ?>">评分</a>
                        </td>
                    </tr>
                    <tr class="ttd">
                        <td>导航室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][5] ?></td>
                        <td>
                            <a href="partyCommitteeScore.php?branchSecretary=付鹏亮&branch=导航室党支部&name=<?php echo $name ?>">评分</a>
                        </td>
                    </tr>
                    <tr class="ttd">
                        <td>航路导航室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][6] ?></td>
                        <td>
                            <a href="partyCommitteeScore.php?branchSecretary=张翼起&branch=航路导航室党支部&name=<?php echo $name ?>">评分</a>
                        </td>
                    </tr>
                    <tr class="ttd">
                        <td>供电室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][7] ?></td>
                        <td>
                            <a href="partyCommitteeScore.php?branchSecretary=王琰琳&branch=供电室党支部&name=<?php echo $name ?>">评分</a>
                        </td>
                    </tr>
                    <tr class="ttd">
                        <td>维修室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][8] ?></td>
                        <td>
                            <a href="partyCommitteeScore.php?branchSecretary=韩西胜&branch=维修室党支部&name=<?php echo $name ?>">评分</a>
                        </td>
                    </tr>
                    <tr class="ttd">
                        <td>现场车队党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][9] ?></td>
                        <td>
                            <a href="partyCommitteeScore.php?branchSecretary=孙晓勇&branch=现场车队党支部&name=<?php echo $name ?>">评分</a>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>

</body>
</html>
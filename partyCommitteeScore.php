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
	<style type="text/css">
		.memberTable .table tr.ttd:hover{
			background: none;
		}
		.layui-input:focus{
			outline: none;
			border:1px solid #D54343!important;
		}
		.layui-input{
			padding: 0 6px;
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

    $element1Score = 0;
    $element2Score = 0;
    $element3Score = 0;
    $element4Score = 0;
    $element5Score = 0;
    $totalScore = 0;
    $suggestion = 0;

    $name = isset($_GET['name']) ? $_GET['name'] : NULL;    // 获取领导姓名
    $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取被评价支部名称 
    $branchSecretary = isset($_GET['branchSecretary']) ? $_GET['branchSecretary'] : NULL;    // 获取被评价人姓名 
   
    require_once './db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');

    $query1 = "SELECT * FROM `partycommitteescore` WHERE `name` = '".$username."' AND `branchSecretary` = '".$branchSecretary."' ";

    $result = $conn->query($query1);
    if (!$result) die($conn->connect_error);

    
    if ($result->num_rows == 0){
       $var = 0;    
    }
    else{
       $var = 1;   //若领导已为该支部打分，置位

    }


    while ($rows = $result->fetch_array()){

        //提取并存储分项得分
        $element1Score += $rows['element1Score'];   
        $element2Score += $rows['element2Score'];
        $element3Score += $rows['element3Score'];
        $element4Score += $rows['element4Score'];
        $element5Score += $rows['element5Score'];
        $totalScore += $rows['totalScore'];
        $suggestion = $rows['suggestion'];

    }


   

?>
	<div class="new-wrap">


    <div id="content">
		<div class="top-title" style="padding:0">
			<p>
				<span class="icon-comm">评</span>
				<span class="top-t"><?php echo $name?>--<?php echo $branch?>&nbsp;评价页面</span>
			</p>
		</div>

        <div class="row memberTable new-martop">
            <div class="col-md-12">
                <form action="" method="post" class="layui-form new-form clearfix">

                <table class="table" align="center">
                
                    <tr class="thhead">
                        <th width="15%">考核要素</th>                     
                        <th width="15%">分值</th>  
                        <th width="55%">考核标准</th>
                        <th width="15%">得分</th>      
                    </tr>
                    <tr class="ttd">
                        <td rowspan="3">计划、组织协调能力</td>
                        <td>15-20分</td>
                        <td>计划切实可行，组织协调、高效、有序</td>
                        <?php
                            if($var == 1){
                            echo <<<GRAB
                            <td rowspan="3"><input type="text" class="layui-input" name="score1" style="height: 95px" placeholder="$element1Score" ></td>
GRAB;
                            }
                            else{
                            echo <<<GRAB
                            <td rowspan="3"><input type="text" class="layui-input" name="score1" style="height: 90px" ></td>
GRAB;
                           }
                        ?>
                    </tr>
                    <tr class="ttd">
                        <td>5-15分</td>
                        <td>支部运行有序，定期检查整改或改进，基本无过失发生</td>   
                    </tr>
                    <tr class="ttd">
                        <td>0-5分</td>
                        <td>支部分工不明确，缺乏计划，未定期检查或整改，多次发生有意或无意过失</td>    
                    </tr>
                    <tr class="ttd">
                        <td rowspan="3">决策能力和影响力</td>
                        <td>15-20分</td>
                        <td>支部班子工作决策果断且准确，极少出现失误，个人威信很高</td>
                        <?php
                            if($var == 1){
                            echo <<<GRAB
                            <td rowspan="3"><input type="text" class="layui-input" name="score2" style="height: 90px" placeholder="$element2Score" ></td>
GRAB;
                            }
                            else{
                            echo <<<GRAB
                            <td rowspan="3"><input type="text" class="layui-input" name="score2" style="height: 90px" ></td>
GRAB;
                           }
                        ?>
                    </tr>
                    <tr class="ttd">
                        <td>5-15分</td>
                        <td>决策方向基本正确，失误极少，且拥有一定威信</td>  
                    </tr>
                    <tr class="ttd">
                        <td>0-5分</td>
                        <td>缺乏正确的决策，多次出现失误，影响力无法协助工作开展</td>    
                    </tr>
                    <tr class="ttd">
                        <td rowspan="3">发现问题和解决问题的能力</td>
                        <td>15-20分</td>
                        <td>善于发现和解决支部的深层或隐性问题，能防微杜渐</td>
                        <?php
                            if($var == 1){
                            echo <<<GRAB
                            <td rowspan="3"><input type="text" class="layui-input" name="score3" style="height: 90px" placeholder="$element3Score" ></td>
GRAB;
                            }
                            else{
                            echo <<<GRAB
                            <td rowspan="3"><input type="text" class="layui-input" name="score3" style="height: 90px" ></td>
GRAB;
                           }
                        ?>
                    </tr>
                    <tr class="ttd">
                        <td>5-15分</td>
                        <td>能够发现和解决一般疑难问题，及时处理突发事件</td>  
                    </tr>
                    <tr class="ttd">
                        <td>0-5分</td>
                        <td>发现和解决问题的能力不足，无法有效地处理突发事件</td>    
                    </tr>
                    <tr class="ttd">
                        <td rowspan="3">团队塑造和整合能力</td>
                        <td>15-20分</td>
                        <td>善于整合和激发员工的积极性和潜力，形成高效团队</td>
                        <?php
                           if($var == 1){
                            echo <<<GRAB
                            <td rowspan="3"><input type="text" class="layui-input" name="score4" style="height: 90px" placeholder="$element4Score" ></td>
GRAB;
                            }
                            else{
                            echo <<<GRAB
                            <td rowspan="3"><input type="text" class="layui-input" name="score4" style="height: 90px" ></td>
GRAB;
                           }
                        ?>
                    </tr>
                    <tr class="ttd">
                        <td>5-15分</td>
                        <td>能够使组织成员具备团队意识，为工作目标而协作</td>  
                    </tr>
                    <tr class="ttd">
                        <td>0-5分</td>
                        <td>团队塑造能力不足，团队合力有待提高</td>    
                    </tr>
                    <tr class="ttd">
                        <td rowspan="3">推动和组织学习的能力</td>
                        <td>15-20分</td>
                        <td>积极大力推动支部的学习和建设，职工思想觉悟和业务能力得到有效提升</td>
                        <?php
                           if($var == 1){
                            echo <<<GRAB
                            <td rowspan="3"><input type="text" class="layui-input" name="score5" style="height: 90px" placeholder="$element5Score" ></td>
GRAB;
                            }
                            else{
                            echo <<<GRAB
                            <td rowspan="3"><input type="text" class="layui-input" name="score5" style="height: 90px" ></td>
GRAB;
                           }
                        ?>
                    </tr>
                    <tr class="ttd">
                        <td>5-15分</td>
                        <td>能较好推动支部的学习和建设，职工思想觉悟和业务能力略有提升</td>  
                    </tr>
                    <tr class="ttd">
                        <td>0-5分</td>
                        <td>支部的学习和建设乏力</td>    
                    </tr>
                    <tr class="ttd">
                        <td rowspan="4">考核人的意见和建议：</td>
                        <?php
                            if($var == 1){
                            echo <<<GRAB
                            <td rowspan="4" colspan="3"><input type="text" class="layui-input" name="suggestion" maxlength="200" style="width: 90% ;height: 60px" placeholder="$suggestion"></td>  
GRAB;
                            }
                            else{
                            echo <<<GRAB
                            <td rowspan="4" colspan="3"><input type="text" class="layui-input" name="suggestion" maxlength="200" style="width: 90% ;height: 60px"></td>    
GRAB;
                           }
                        ?>
                        
                    </tr>
                </table>
				<div class="info-sub">
					<input type="submit" value="提交">
				</div>
                </form>

            </div>
        </div>
    </div>
</div>


<?php

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";

    }

    $year = date("Y");


    //$name = !empty($_POST['name'])?$_POST['name']:NULL;
    $score1 = !empty($_POST['score1'])?$_POST['score1']:NULL;
    $score2 = !empty($_POST['score2'])?$_POST['score2']:NULL;
    $score3 = !empty($_POST['score3'])?$_POST['score3']:NULL;
    $score4 = !empty($_POST['score4'])?$_POST['score4']:NULL;
    $score5 = !empty($_POST['score5'])?$_POST['score5']:NULL;
    $suggestion = !empty($_POST['suggestion'])?$_POST['suggestion']:NULL;
    $totalScore = ($score1 + $score2 + $score3 +$score4 +$score5);

    if (isset($score1)){
        require_once 'db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');
        
      //   $query = "INSERT INTO `partycommitteescore` VALUES ('3', '1','2','3','4','5','6','7','100')";


        $query = "INSERT INTO `partycommitteescore` (`id`, `name`, `branchSecretary`, `element1Score`, 
            `element2Score`, `element3Score`, `element4Score`, `element5Score`, `totalScore`, `suggestion`,`evaluateTime`)
             VALUES ('1', '" . $username . "', '" . $branchSecretary . "',
             '" . $score1 . "', '" . $score2 . "', '" . $score3 . "', '" . $score4 . "', '" . $score5 . "', 
             '" . $totalScore . "', '". $suggestion ."','". $year ."')";
        $conn->query($query);
        $conn->close();
    }


?>

</body>

</html>
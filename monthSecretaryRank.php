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

</style>
</head>  
<body>

<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
}

?> 
	<div class="new-wrap">
				<div class="top-title">
			<p>
				<span class="icon-comm">月</span>
				<span class="top-t">月度党支部书记排名</span>
			</p>
		</div>
<div id="container"> 
   
  <div id="content" class="member">
  
    <div class="col-md-12">
     <div class="row">
            			<div class="addbtn">
                	<span class="btn addBtn">
                    <a href="">否决</a>
                </span>
                </div>
     </div>
    </div >
      <div class="row">
      	<div class="measure">
      		<p class="head-title">
      			计算公式（此为理论计算公式，目前采用直接累加方式）：
      		</p>
      		<p>
      			 月度得分=月定期任务得分*60%*否决项权值(0/1)+月不定期任务得分*40%+亮点任务得分*20%
      		</p>
      	</div>
      </div>
      <div class="row memberTable">

        <div class="col-md-12">

          <table class="table" align="center">
            <tr class="thhead">
              <th>姓名</th>
              <th>一月</th>
              <th>二月</th>
              <th>三月</th>
              <th>四月</th>
              <th>五月</th>
              <th>六月</th>
              <th>七月</th>
              <th>八月</th>
              <th>九月</th>
              <th>十月</th>
              <th>十一月</th>
              <th>十二月</th>
            </tr>

            <?php
                    $branchList = ["机关党支部","通信室党支部","通信运行室党支部","自动化数据室党支部",
                        "雷达室党支部","导航室党支部","航路导航室党支部","供电室党支部","维修室党支部","现场车队党支部"];

                    $index = 0;

                    $line1 = 12;
                    $row1 = 10;
                    
                    $finalScore = array_fill(0,$line1,array_fill(0,$row1,array()));
                         
                    foreach ($branchList as $branch){

                        require_once './db_login.php';
                        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                        if ($conn->connect_error) die($conn->connect_error);
                        mysqli_set_charset($conn, 'utf8');

                        $query = "SELECT * FROM `missionlog` WHERE `status` LIKE '已打分' AND `branch` LIKE '".$branch."' "; 
                        $result = $conn->query($query);
                        if (!$result) die($conn->connect_error);

                        $score = [0,0,0,0,0,0,0,0,0,0,0,0];
                        

                        while ($rows = $result->fetch_array()){
                            $finishTime = $rows['timeLimit'];
                            $missionYear = substr($finishTime,0,4);   // 提起年份
                            $missionMonth = substr($finishTime,5,2);  // 提取月份
                            if (strcmp($missionYear,date("Y")) == 0){        // 只处理本年数据
                                switch ($missionMonth){
                                    case "01":
                                        $score[0] = $score[0] + $rows['score'];
                                        break;
                                    case "02":
                                        $score[1] = $score[1] + $rows['score'];
                                        break;
                                    case "03":
                                        $score[2] = $score[2] + $rows['score'];
                                        break;
                                    case "04":
                                        $score[3] = $score[3] + $rows['score'];
                                        break;
                                    case "05":
                                        $score[4] = $score[4] + $rows['score'];
                                        break;
                                    case "06":
                                        $score[5] = $score[5] + $rows['score'];
                                        break;
                                    case "07":
                                        $score[6] = $score[6] + $rows['score'];
                                        break;
                                    case "08":
                                        $score[7] = $score[7] + $rows['score'];
                                        break;
                                    case "09":
                                        $score[8] = $score[8] + $rows['score'];
                                        break;
                                    case "10":
                                        $score[9] = $score[9] + $rows['score'];
                                        break;
                                    case "11":
                                        $score[10] = $score[10] + $rows['score'];
                                        break;
                                    case "12":
                                        $score[11] = $score[11] + $rows['score'];
                                        break;
                                }
                            } 
                        }

                        //存储所有党支部当年十二个月每月的分数

                        for($i=0;$i<12;$i++){
                           
                           $finalScore[$i][$index] = $score[$i];
                           

                        }
    
                                       
                        $index++;
                        
                        
                    }
                     
                     
                    $finalScore1 = $finalScore;

                    //对每月各支部的分数进行降序排列

                    for($j=0;$j<12;$j++){

                         rsort($finalScore1[$j]);

                     }
                    

                    $line1 = 12;
                    $row1 = 10;
                    $rank = array_fill(0,$line1,array_fill(0,$row1,array()));

                      
                    //返回各支部名次

                    for($k=0;$k<12;$k++){
                        $m = 0; 
                        foreach ($finalScore[$k] as $v){
                              $tmp = array_search($v, $finalScore1[$k]);
                              $rank[$k][$m] = $tmp+1;
                              $m++;  
                        }
                    }
                    //print_r($rank);

                    echo <<<TABLE
                    <tr class="ttd">
                        <td>孙莹涛</td>
                        <td>第{$rank[0][0]}名</td>
                        <td>第{$rank[1][0]}名</td>
                        <td>第{$rank[2][0]}名</td>
                        <td>第{$rank[3][0]}名</td>
                        <td>第{$rank[4][0]}名</td>
                        <td>第{$rank[5][0]}名</td>
                        <td>第{$rank[6][0]}名</td>
                        <td>第{$rank[7][0]}名</td>
                        <td>第{$rank[8][0]}名</td>
                        <td>第{$rank[9][0]}名</td>
                        <td>第{$rank[10][0]}名</td>
                        <td>第{$rank[11][0]}名</td>
                    </tr>

                    <tr class="ttd">
                        <td>叶庆康</td>
                        <td>第{$rank[0][1]}名</td>
                        <td>第{$rank[1][1]}名</td>
                        <td>第{$rank[2][1]}名</td>
                        <td>第{$rank[3][1]}名</td>
                        <td>第{$rank[4][1]}名</td>
                        <td>第{$rank[5][1]}名</td>
                        <td>第{$rank[6][1]}名</td>
                        <td>第{$rank[7][1]}名</td>
                        <td>第{$rank[8][1]}名</td>
                        <td>第{$rank[9][1]}名</td>
                        <td>第{$rank[10][1]}名</td>
                        <td>第{$rank[11][1]}名</td>
                    </tr>

                    <tr class="ttd">
                        <td>王涛</td>
                        <td>第{$rank[0][2]}名</td>
                        <td>第{$rank[1][2]}名</td>
                        <td>第{$rank[2][2]}名</td>
                        <td>第{$rank[3][2]}名</td>
                        <td>第{$rank[4][2]}名</td>
                        <td>第{$rank[5][2]}名</td>
                        <td>第{$rank[6][2]}名</td>
                        <td>第{$rank[7][2]}名</td>
                        <td>第{$rank[8][2]}名</td>
                        <td>第{$rank[9][2]}名</td>
                        <td>第{$rank[10][2]}名</td>
                        <td>第{$rank[11][2]}名</td>
                    </tr>

                    <tr class="ttd">
                        <td>王璐</td>
                        <td>第{$rank[0][3]}名</td>
                        <td>第{$rank[1][3]}名</td>
                        <td>第{$rank[2][3]}名</td>
                        <td>第{$rank[3][3]}名</td>
                        <td>第{$rank[4][3]}名</td>
                        <td>第{$rank[5][3]}名</td>
                        <td>第{$rank[6][3]}名</td>
                        <td>第{$rank[7][3]}名</td>
                        <td>第{$rank[8][3]}名</td>
                        <td>第{$rank[9][3]}名</td>
                        <td>第{$rank[10][3]}名</td>
                        <td>第{$rank[11][3]}名</td>
                    </tr>

                    <tr class="ttd">
                        <td>李牧</td>
                        <td>第{$rank[0][4]}名</td>
                        <td>第{$rank[1][4]}名</td>
                        <td>第{$rank[2][4]}名</td>
                        <td>第{$rank[3][4]}名</td>
                        <td>第{$rank[4][4]}名</td>
                        <td>第{$rank[5][4]}名</td>
                        <td>第{$rank[6][4]}名</td>
                        <td>第{$rank[7][4]}名</td>
                        <td>第{$rank[8][4]}名</td>
                        <td>第{$rank[9][4]}名</td>
                        <td>第{$rank[10][4]}名</td>
                        <td>第{$rank[11][4]}名</td>
                    </tr>

                    <tr class="ttd">
                        <td>付鹏亮</td>
                        <td>第{$rank[0][5]}名</td>
                        <td>第{$rank[1][5]}名</td>
                        <td>第{$rank[2][5]}名</td>
                        <td>第{$rank[3][5]}名</td>
                        <td>第{$rank[4][5]}名</td>
                        <td>第{$rank[5][5]}名</td>
                        <td>第{$rank[6][5]}名</td>
                        <td>第{$rank[7][5]}名</td>
                        <td>第{$rank[8][5]}名</td>
                        <td>第{$rank[9][5]}名</td>
                        <td>第{$rank[10][5]}名</td>
                        <td>第{$rank[11][5]}名</td>
                    </tr>

                    <tr class="ttd">
                        <td>张翼起</td>
                        <td>第{$rank[0][6]}名</td>
                        <td>第{$rank[1][6]}名</td>
                        <td>第{$rank[2][6]}名</td>
                        <td>第{$rank[3][6]}名</td>
                        <td>第{$rank[4][6]}名</td>
                        <td>第{$rank[5][6]}名</td>
                        <td>第{$rank[6][6]}名</td>
                        <td>第{$rank[7][6]}名</td>
                        <td>第{$rank[8][6]}名</td>
                        <td>第{$rank[9][6]}名</td>
                        <td>第{$rank[10][6]}名</td>
                        <td>第{$rank[11][6]}名</td>
                    </tr>

                    <tr class="ttd">
                        <td>王琰琳</td>
                        <td>第{$rank[0][7]}名</td>
                        <td>第{$rank[1][7]}名</td>
                        <td>第{$rank[2][7]}名</td>
                        <td>第{$rank[3][7]}名</td>
                        <td>第{$rank[4][7]}名</td>
                        <td>第{$rank[5][7]}名</td>
                        <td>第{$rank[6][7]}名</td>
                        <td>第{$rank[7][7]}名</td>
                        <td>第{$rank[8][7]}名</td>
                        <td>第{$rank[9][7]}名</td>
                        <td>第{$rank[10][7]}名</td>
                        <td>第{$rank[11][7]}名</td>
                    </tr>

                    <tr class="ttd">
                        <td>韩西胜</td>
                        <td>第{$rank[0][8]}名</td>
                        <td>第{$rank[1][8]}名</td>
                        <td>第{$rank[2][8]}名</td>
                        <td>第{$rank[3][8]}名</td>
                        <td>第{$rank[4][8]}名</td>
                        <td>第{$rank[5][8]}名</td>
                        <td>第{$rank[6][8]}名</td>
                        <td>第{$rank[7][8]}名</td>
                        <td>第{$rank[8][8]}名</td>
                        <td>第{$rank[9][8]}名</td>
                        <td>第{$rank[10][8]}名</td>
                        <td>第{$rank[11][8]}名</td>
                    </tr>

                    <tr class="ttd">
                        <td>孙晓勇</td>
                        <td>第{$rank[0][9]}名</td>
                        <td>第{$rank[1][9]}名</td>
                        <td>第{$rank[2][9]}名</td>
                        <td>第{$rank[3][9]}名</td>
                        <td>第{$rank[4][9]}名</td>
                        <td>第{$rank[5][9]}名</td>
                        <td>第{$rank[6][9]}名</td>
                        <td>第{$rank[7][9]}名</td>
                        <td>第{$rank[8][9]}名</td>
                        <td>第{$rank[9][9]}名</td>
                        <td>第{$rank[10][9]}名</td>
                        <td>第{$rank[11][9]}名</td>    
                    </tr>
TABLE;
              ?>

          </table>
        </div>
      </div>
  </div>
  </div>

</div>

</body>

</html>
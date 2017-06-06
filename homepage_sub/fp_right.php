<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<?php session_start(); ?>
<html>
<head>
    
    <title>首页</title>
  <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
  <link href="../css/bootstrap.css" rel="stylesheet">
  <link href="../css/bootstrap-treeview.css" rel="stylesheet">
  <!-- Required Javascript -->
  <script src="../js/jquery-3.1.1.js"></script>
  <script src="../js/bootstrap-treeview.min.js"></script>

  <style type="text/css">  

  #header {
    text-align: right;
    padding-top: 27px;
  }

  .headerimg{
    background-image: url('../images/background.jpg');
    height: 63px;
    width: 1360px;
  }

  table{
   
    border-collapse: separate;
    border-spacing: 10px 5px;
  }

  th{
    height: 40px;
    width: 400px;
    border: 1px solid gray;
    padding: 10px;
  }
  td{
    height: 280px;
    width: 400px;
    border: 1px solid gray;
    padding: 10px;
  }

  .breadcrumb {
    padding: 8px 135px;
    list-style: none;
    background-color: transparent;
    border-radius: 2px;
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
?>



              <?php

                    $index = 0;

                    $i = 0;
                    $j = 0;
                    $k = 0;
                    $n = 0;

                    $line1 = 12;
                    $row1 = 10;

                    //获取当前月份

                    $a = date("m");
                    $b = (int)$a-1;
                    

                    //存储名次和对应支部名称的数组

                    $rankMonth = array_fill(0,$line1,array_fill(0,$row1,array()));
                    $branchRankMonth = [0,0,0,0,0,0,0,0,0,0];

                    $rankYear = [0,0,0,0,0,0,0,0,0,0];
                    $branchRankYear = [0,0,0,0,0,0,0,0,0,0];

                    $totalScore = [0,0,0,0,0,0,0,0,0,0];
                    $finalScore = array_fill(0,$line1,array_fill(0,$row1,array()));

                    $branchList = ["机关党支部","通信室党支部","通信运行室党支部","自动化数据室党支部",
                        "雷达室党支部","导航室党支部","航路导航室党支部","供电室党支部","维修室党支部","现场车队党支部"];
                   

                    $branchName = ["机关党支部","通信室党支部","通信运行室党支部","自动化数据室党支部",
                        "雷达室党支部","导航室党支部","航路导航室党支部","供电室党支部","维修室党支部","现场车队党支部"];
                    
                   
                         
                    foreach ($branchList as $branch){

                        require_once './../db_login.php';
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

                        //存储所有党支部当年每月的分数

                        for($tmp=0;$tmp<12;$tmp++){
                           
                           $finalScore[$tmp][$index] = $score[$tmp];       

                        }

                        $scoreYear = array_sum($score);   // TODO：年度算法后期可能更新

                        $totalScore[$index] = $scoreYear; 
                                       
                        $index++;
                        
                        
                    }
                     
                    //对每月各支部的分数进行降序排列

                    $finalScore1 = $finalScore;
                    //print_r($finalScore);

                    for($tmp=0;$tmp<12;$tmp++){

                         rsort($finalScore1[$tmp]);

                     }
                    
                      
                    //返回各支部每月名次

                    for($tmp=0;$tmp<12;$tmp++){
                        $m = 0; 
                        foreach ($finalScore[$tmp] as $v){
                              $rank = array_search($v, $finalScore1[$tmp]);
                              $rankMonth[$tmp][$m] = $rank + 1;
                              $m++;  
                        }
                    }
                   // print_r($rankMonth);

                    //获取当月各支部名称排序

                    asort($rankMonth[$b]);

                    foreach ($rankMonth[$b] as $key => $value){
   
                        $branchRankMonth[$j] = $branchName[$key];
                        $j++;
                    }

                    //获取当月各支部名次

                    sort($rankMonth[$b]);

                    //计算年度各支部成绩排序

                    $totalScore1 = $totalScore;

                    rsort($totalScore1);
                   
                    //获取年度各支部名次

                    foreach ($totalScore as $v){
                      
                        $rankYear[$i] = array_search($v, $totalScore1);
                        $i++;
                    }

                    //获取年度各支部名称排序

                    asort($rankYear);

                    foreach ($rankYear as $key => $value){
                         
                        $branchRankYear[$n] = $branchName[$key];
                        $n++;
                    }

                    //确定年度名次

                    sort($rankYear);

                    foreach ($rankYear as $v){
                         
                        $rankYear[$k] = $v+1;
                        $k++;
                        
                    }

                    
 
             ?>

                      <hr>
                      <p align="center"><strong>本月排名</strong></p>

                      <ul type="none">
                        <li><?php echo $rankMonth[$b][0].". ".$branchRankMonth[0] ?></li>
                        <li><?php echo $rankMonth[$b][1].". ".$branchRankMonth[1] ?></li>
                        <li><?php echo $rankMonth[$b][2].". ".$branchRankMonth[2] ?></li>
                        <li><?php echo $rankMonth[$b][3].". ".$branchRankMonth[3] ?></li>
                        <li><?php echo $rankMonth[$b][4].". ".$branchRankMonth[4] ?></li>
                        <li><?php echo $rankMonth[$b][5].". ".$branchRankMonth[5] ?></li>
                        <li><?php echo $rankMonth[$b][6].". ".$branchRankMonth[6] ?></li>
                        <li><?php echo $rankMonth[$b][7].". ".$branchRankMonth[7] ?></li>
                        <li><?php echo $rankMonth[$b][8].". ".$branchRankMonth[8] ?></li>
                        <li><?php echo $rankMonth[$b][9].". ".$branchRankMonth[9] ?></li>
                      </ul>
                      <hr>
                      <p align="center"><strong>本年排名</strong></p>
                      <ul type="none">
                        <li><?php echo $rankYear[0].". ".$branchRankYear[0] ?></li>
                        <li><?php echo $rankYear[1].". ".$branchRankYear[1] ?></li>
                        <li><?php echo $rankYear[2].". ".$branchRankYear[2] ?></li>
                        <li><?php echo $rankYear[3].". ".$branchRankYear[3] ?></li>
                        <li><?php echo $rankYear[4].". ".$branchRankYear[4] ?></li>
                        <li><?php echo $rankYear[5].". ".$branchRankYear[5] ?></li>
                        <li><?php echo $rankYear[6].". ".$branchRankYear[6] ?></li>
                        <li><?php echo $rankYear[7].". ".$branchRankYear[7] ?></li>
                        <li><?php echo $rankYear[8].". ".$branchRankYear[8] ?></li>
                        <li><?php echo $rankYear[9].". ".$branchRankYear[9] ?></li>
                      </ul>

     

                                               

</body>
</html>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <link rel="stylesheet" href="./../fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    <!-- Required Javascript -->
    <script src="./js/jquery-3.1.1.js"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">


        #content {
            float:center;
            margin-left: 20px;
            margin-right: 20px;
        }



        table {

           
            border-collapse: separate;
            *border-collapse: collapse; /* IE7 and lower */
            border-spacing: 0;
        }

        tbody tr:hover {

           background: linear-gradient(#fff,#ffdcb9);

        }


        th {
            
            padding: 10px;
            text-align: center;
            background-color: #FF9999;
            background: -ms-linear-gradient(top, #fff,  #ffdcb9);        /* IE 10 */
            background:-moz-linear-gradient(top,#b8c4cb,#f6f6f8);/*火狐*/ 
            background:-webkit-gradient(linear, 0% 0%, 0% 100%,from(#b8c4cb), to(#f6f6f8));/*谷歌*/ 
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#ffdcb9));      /* Safari 4-5, Chrome 1-9*/
            background: -webkit-linear-gradient(top, #fff, #ffdcb9);   /*Safari5.1 Chrome 10+*/
            background: -o-linear-gradient(top, #fff, #ffdcb9);  /*Opera 11.10+*/
        }

        td {
            
            text-align: center;
           

        }
          
        th:first-child {  
          
             border-radius: 6px 0 0 0;  
          
        }  
          
        th:last-child {  
          
             border-radius: 0 6px 0 0;  
          
        }  
          
        tr:last-child td:first-child {  
          
             border-radius: 0 0 0 6px;  
          
        }  
          
        tr:last-child td:last-child {  
          
             border-radius: 0 0 6px 0;  
          
        }  

        a:link {
            color:#FF0000;
            text-decoration:underline;
        }
        a:visited {
            color:#00FF00;
            text-decoration:none;
        }
        a:hover {
            color:#000000;
            text-decoration:none;
        }
        a:active {
            color:#FFFFFF;
            text-decoration:none;
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

<div id="container">

    <div id="content">

        <h3><i class="fa fa-calculator"></i>&nbsp;不定期任务得分</h3>
        <hr>


        <div class="row">
            <div class="col-md-12">

                <table class="table table-condensed" align="center">
                    <tr class="warning">
                        <th class="active">党支部名称</th>
                        <th class="active">一月</th>
                        <th class="active">二月</th>
                        <th class="active">三月</th>
                        <th class="active">四月</th>
                        <th class="active">五月</th>
                        <th class="active">六月</th>
                        <th class="active">七月</th>
                        <th class="active">八月</th>
                        <th class="active">九月</th>
                        <th class="active">十月</th>
                        <th class="active">十一月</th>
                        <th class="active">十二月</th>
                        <th class="active">年度</th>
                    </tr>

                    <?php
                    $branchList = ["机关党支部","通信室党支部","通信运行室党支部","自动化数据室党支部",
                        "雷达室党支部","导航室党支部","航路导航室党支部","供电室党支部","维修室党支部","现场车队党支部"];
                    foreach ($branchList as $branch){

                        require_once '../db_login.php';
                        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                        if ($conn->connect_error) die($conn->connect_error);
                        mysqli_set_charset($conn, 'utf8');

                        $query = "SELECT * FROM `missionlog` WHERE (`type` LIKE '抢接任务' OR `type` LIKE '指定任务')
                                  AND `status` LIKE '已打分' AND `branch` LIKE '".$branch."' ";
                        $result = $conn->query($query);
                        if (!$result) die($conn->connect_error);

                        $score = [0,0,0,0,0,0,0,0,0,0,0,0,0];
//                        $index = 0;

                        while ($rows = $result->fetch_array()){
                            $finishTime = $rows['finishTime'];
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
                        $scoreYear = array_sum($score);   // TODO：年度算法后期可能更新
                        $score[12] = $scoreYear;
                        echo <<<TABLE
                            <tr>

                                <td>{$branch}</td>
                                <td>{$score[0]}</td>
                                <td>{$score[1]}</td>
                                <td>{$score[2]}</td>
                                <td>{$score[3]}</td>
                                <td>{$score[4]}</td>
                                <td>{$score[5]}</td>
                                <td>{$score[6]}</td>
                                <td>{$score[7]}</td>
                                <td>{$score[8]}</td>
                                <td>{$score[9]}</td>
                                <td>{$score[10]}</td>
                                <td>{$score[11]}</td>
                                <td>{$score[12]}</td>
                            </tr>

TABLE;

                    }

                    ?>







                </table>
            </div>
        </div>
    </div>
</div>

</body>

</html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
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

<div id="container">

    <div id="content"> 
        

        <?php

            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $authorityCode = $_SESSION['authorityCode'];
            } else {
                echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
            }

            $name = isset($_GET['name']) ? $_GET['name'] : NULL;    // 获取领导姓名


            $branchSecretary = ["孙莹涛","叶庆康","王涛","王璐","李牧","付鹏亮","张翼起","王琰琳","韩西胜","孙晓勇"];

            $index = 0;

            $line1 = 5;
            $row1 = 10;

            $flag;

            $year = date("Y");

            $partyCommitteeScore = array_fill(0,$line1,array_fill(0,$row1,0)); 

            foreach($branchSecretary as $secretary){

                require_once './db_login.php';
                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                if ($conn->connect_error) die($conn->connect_error);
                mysqli_set_charset($conn, 'utf8');

                $query = "SELECT * FROM `partycommitteescore` WHERE `branchSecretary` LIKE '".$secretary."' AND `evaluateTime` = '".$year."' ";

                $result = $conn->query($query);
                if (!$result) die($conn->connect_error);

                while ($rows = $result->fetch_array()){
                    $leaderName = $rows['name'];

                    //提取并存储各领导的打分情况

                    if (isset($rows['totalScore']))
                    {
                        switch ($leaderName){
                        case "王忠义":
                            $partyCommitteeScore[0][$index] = $rows['totalScore'];
                            break;
                        case "胡兴宇":
                            $partyCommitteeScore[1][$index] = $rows['totalScore'];
                            break;
                        case "牟小光":
                            $partyCommitteeScore[2][$index] = $rows['totalScore'];
                            break;
                        case "文奇":
                            $partyCommitteeScore[3][$index] = $rows['totalScore'];
                            break;
                        case "尚德佳":
                            $partyCommitteeScore[4][$index] = $rows['totalScore'];
                            break;

                    }

                       

                }
                  
                //echo $partyCommitteeScore[$index1];
                
            }
            $index++;


        }
                    //不同领导对应存储分数的不同行，提取对应行
                    switch ($name)
                    {
                        case "王忠义":
                            $flag = 0;
                            break;
                        case "胡兴宇":
                            $flag = 1;
                            break;
                        case "牟小光":
                            $flag = 2;
                            break;
                        case "文奇":
                            $flag = 3;
                            break;
                        case "尚德佳":
                            $flag = 4;
                            break;

                    }

      
        ?>

        <h3><i class="fa fa-user"></i>&nbsp;<?php echo $name?>-评价列表</h3>

        <div class="row">
            <div class="col-md-12">
                <hr>

                <table class="table table-condensed" align="center">
                    <tr class="warning">
                        <th width="30%">支部名称</th>
                        <th width="30%">总分</th>
                        <th width="40%">详情</th>
                    </tr>
                    <tr>
                        <td>机关党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][0] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=孙莹涛&branch=机关党支部&name=<?php echo $name?>">评分</a></td>
                    </tr>
                    <tr>
                        <td>通信室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][1] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=王涛&branch=通信室党支部&name=<?php echo $name?>">评分</a></td>
                    </tr>
                    <tr>
                        <td>通信运行室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][2] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=叶庆康&branch=通信运行室党支部&name=<?php echo $name?>">评分</a></td>
                    </tr>
                    <tr>
                        <td>自动化数据室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][3] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=王璐&branch=自动化数据室党支部&name=<?php echo $name?>">评分</a></td>
                    </tr>
                    <tr>
                        <td>雷达室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][4] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=李牧&branch=雷达室党支部&name=<?php echo $name?>">评分</a></td>
                    </tr>
                    <tr>
                        <td>导航室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][5] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=付鹏亮&branch=导航室党支部&name=<?php echo $name?>">评分</a></td>
                    </tr>
                    <tr>
                        <td>航路导航室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][6] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=张翼起&branch=航路导航室党支部&name=<?php echo $name?>">评分</a></td>
                    </tr>
                    <tr>
                        <td>供电室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][7] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=王琰琳&branch=供电室党支部&name=<?php echo $name?>">评分</a></td>
                    </tr>
                    <tr>
                        <td>维修室党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][8] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=韩西胜&branch=维修室党支部&name=<?php echo $name?>">评分</a></td>
                    </tr>
                    <tr>
                        <td>现场车队党支部</td>
                        <td><?php echo $partyCommitteeScore[$flag][9] ?></td>
                        <td><a href="partyCommitteeScore.php?branchSecretary=孙晓勇&branch=现场车队党支部&name=<?php echo $name?>">评分</a></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>

</body>
</html>
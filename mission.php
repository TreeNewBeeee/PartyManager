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

            $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取任务类型

            switch ($type){
                 case '定期任务':
                 echo <<<Jump
                   <h3><i class="fa fa-calendar"></i>&nbsp;定期任务</h3>
Jump;
                   break;

                 case '抢接任务':

                   break;

                 case '指定任务':
                   echo <<<Jump
                   <h3><i class="fa fa-send"></i>&nbsp;指定任务</h3>
Jump;
                   break;

                 case '亮点工作':
                   echo <<<Jump
                   <h3><i class="fa fa-star"></i>&nbsp;亮点工作</h3>
Jump;
                   break;
            }
        ?>

        <hr>
        <div class="col-md-12">
            <div class="row">
                <?php
                switch ($type){
                    case '定期任务':
                        if ($authorityCode <= 1){
                            echo <<<Jump
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="./missionSubmit/fixedMissionSubmit.php">新增</a>
                                </button>
Jump;
                        }


                        break;
                    case '抢接任务':

                        break;
                    case '指定任务':
                        if ($authorityCode <= 1){
                            echo <<<Jump
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="./missionSubmit/assignMissionSubmit.php">新增</a>
                                </button>
Jump;
                        }

                        break;
                    case '亮点工作':
                        if ($authorityCode < 1 or $authorityCode == 20){
                            echo <<<Jump
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="./missionSubmit/shinningMissionSubmit.php">新增</a>
                                </button>
Jump;
                        }

                        break;
                }

                ?>

                <!--<button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>编辑
                </button>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
                </button>-->

            </div>
        </div >

        <div class="row">
            <div class="col-md-12">
                <hr>

                <table class="table table-condensed" align="center">
                    <tr class="warning">
                        <th width="40%">完成党支部</th>
                        <th  width="30%">详情</th>
                    </tr>
                    <tr>

                        <td>机关党支部</td>
                        <td><a href="missionList.php?branch=机关党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr>

                        <td>通信室党支部</td>
                        <td><a href="missionList.php?branch=通信室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr>

                        <td>通信运行室党支部</td>
                        <td><a href="missionList.php?branch=通信运行室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr>

                        <td>自动化数据室党支部</td>
                        <td><a href="missionList.php?branch=自动化数据室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr>

                        <td>雷达室党支部</td>
                        <td><a href="missionList.php?branch=雷达室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr>

                        <td>导航室党支部</td>
                        <td><a href="missionList.php?branch=导航室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr>

                        <td>航路导航室党支部</td>
                        <td><a href="missionList.php?branch=航路导航室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr>

                        <td>供电室党支部</td>
                        <td><a href="missionList.php?branch=供电室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr>

                        <td>维修室党支部</td>
                        <td><a href="missionList.php?branch=维修室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr>

                        <td>现场车队党支部</td>
                        <td><a href="missionList.php?branch=现场车队党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>

</body>
</html>
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

.top-title{
	padding: 0;
}


    </style>
</head>
<body>
	<div class="new-wrap">
<div id="container">

    <div id="content" class="member">

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
                   <div class="top-title">
			<p>
				<span class="icon-comm">定</span>
				<span class="top-t">定期任务</span>
			</p>
		</div>
Jump;
                   break;

                 case '抢接任务':

                   break;

                 case '指定任务':
                   echo <<<Jump
                                     <div class="top-title">
			<p>
				<span class="icon-comm">指</span>
				<span class="top-t">指定任务</span>
			</p>
		</div>
Jump;
                   break;

                 case '亮点工作':
                   echo <<<Jump
                   <div class="top-title">
			<p>
				<span class="icon-comm">亮</span>
				<span class="top-t">亮点工作</span>
			</p>
		</div>
Jump;
                   break;
            }
        ?>


        <div class="">
            <div class="col-xs-12">
            	<div class="addbtn">
                <?php
                switch ($type){
                    case '定期任务':
                        if ($authorityCode <= 1){
                            echo <<<Jump
                            	                        <span type="button" class="btn btn-default addBtn">
                            <i class="icon-add"></i><a href="./missionSubmit/fixedMissionSubmit.php">新增</a>
                        </span>
                                                	                        <span type="button" class="btn btn-default addBtn">
                            <i class="icon-add icon-dele"></i><a href="./missionSubmit/MissionDelete.php?type=定期任务">删除</a>
                        </span>
Jump;
                        }


                        break;
                    case '抢接任务':

                        break;
                    case '指定任务':
                        if ($authorityCode <= 1){
                            echo <<<Jump
                        <span type="button" class="btn btn-default addBtn">
                            <i class="icon-add"></i><a href="./missionSubmit/assignMissionSubmit.php">新增</a>
                        </span>
                                                	                        <span type="button" class="btn btn-default addBtn">
                            <i class="icon-add icon-dele"></i><a href="./missionSubmit/MissionDelete.php?type=指定任务">删除</a>
                        </span>
Jump;
                        }

                        break;
                    case '亮点工作':
                        if ($authorityCode < 1 or $authorityCode == 20){
                            echo <<<Jump
                         <span type="button" class="btn btn-default addBtn">
                            <i class="icon-add"></i><a href="./missionSubmit/shinningMissionSubmit.php">新增</a>
                        </span>
                         <span type="button" class="btn btn-default addBtn">
                            <i class="icon-add icon-dele"></i><a href="./missionSubmit/MissionDelete.php?type=亮点工作">删除</a>
                        </span>
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
            </div>
        </div >

        <div class="row memberTable">
            <div class="col-xs-12">


                <table class="table" align="center">
                    <tr class="thhead">
                        <th width="40%">完成党支部</th>
                        <th  width="30%">详情</th>
                    </tr>
                    <tr class="ttd">

                        <td>机关党支部</td>
                        <td><a href="missionList.php?branch=机关党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr  class="ttd">

                        <td>通信室党支部</td>
                        <td><a href="missionList.php?branch=通信室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr  class="ttd">

                        <td>通信运行室党支部</td>
                        <td><a href="missionList.php?branch=通信运行室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr  class="ttd">

                        <td>自动化数据室党支部</td>
                        <td><a href="missionList.php?branch=自动化数据室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr  class="ttd">

                        <td>雷达室党支部</td>
                        <td><a href="missionList.php?branch=雷达室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr  class="ttd">

                        <td>导航室党支部</td>
                        <td><a href="missionList.php?branch=导航室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr  class="ttd">

                        <td>航路导航室党支部</td>
                        <td><a href="missionList.php?branch=航路导航室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr  class="ttd">

                        <td>供电室党支部</td>
                        <td><a href="missionList.php?branch=供电室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr  class="ttd">

                        <td>维修室党支部</td>
                        <td><a href="missionList.php?branch=维修室党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                    <tr  class="ttd">

                        <td>现场车队党支部</td>
                        <td><a href="missionList.php?branch=现场车队党支部&type=<?php echo $type?>">查看</a></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    </div>
</div>


</body>
</html>
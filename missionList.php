<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    <!-- Required Javascript -->
    <script src="./js/jquery-3.1.1.js"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">



        #content {
            float: center;
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
    </style>
</head>
<body>

<?php

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
    }

    $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取任务类型
    $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位
?>

<div id="container">

    <div id="content">

        <h3><?php echo $branch?>-<?php echo $type?></h3>
        <!--<div class="col-md-12">
            <div class="row">

                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
                </button>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>编辑
                </button>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
                </button>

            </div>
        </div>-->

        <div class="row">
            <div class="col-md-12">
                <hr>
                <table class="table table-condensed" align="center">
                    <tr class="warning">
                        <th width="5%">选择</th>
                        <th width="5%">序号</th>
                        <th width="40%">任务名称</th>
                        <th width="10%">发布时间</th>
                        <th width="10%">完成时限</th>
                        <th width="10%">得分</th>
                        <th width="20%">状态</th>
                    </tr>

                    <?php
                    require_once 'db_login.php';
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) die($conn->connect_error);
                    mysqli_set_charset($conn, 'utf8');

                    $query = "SELECT * FROM `missionlog` WHERE `branch` = '".$branch."' AND `type` = '".$type."'";
                    $result = $conn->query($query);

                    if (!$result) die($conn->connect_error);
                    $index = 1;
                  
                    while ($rows = $result->fetch_array()){

                        echo <<<SHOWTABLE
                        <tr>
                            <td style="text-align:center">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                    </label>
                                </div>
                            </td>
                            <td style="text-align:center">$index</td>
                            <td><a href = "missionViewer.php?title={$rows['title']}&branch={$branch}">{$rows['title']}</a></td>
                            <td style="text-align:center">{$rows['publishTime']}</td>
                            <td style="text-align:center">{$rows['timeLimit']}</td>
                            <td style="text-align:center">{$rows['score']}</td>
                            <td style="text-align:center">{$rows['status']}</td>
                        </tr>

SHOWTABLE;



                        $index++;

                    }
                    $result->close();
                    $conn->close();


                    ?>


                </table>

            </div>
        </div>
    </div>
</div>

</body>
</html>
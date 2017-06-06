<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
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

<div id="container">

    <div id="content">

        <h3><i class="fa fa-cny"></i>&nbsp;党费信息</h3>
        <div class="col-md-12">
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
        </div>

        <?php
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            } else {
                echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
            }

            $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位
            require_once 'db_login.php';
            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
            if ($conn->connect_error) die($conn->connect_error);
            mysqli_set_charset($conn, 'utf8');

            $query = "select * FROM payment WHERE `branch` = '" . $branch . "'";   // TODO：目前不具备查询功能
            $result = $conn->query($query);
            if (!$result) die($conn->connect_error);



        ?>

        <div class="row">
            <div class="col-md-12">
                <hr>
                <p>党费收缴表</p>

                <table class="table table-condensed" align="center">
                    <tr>
                        <th class="warning" width="20%">党支部名称</th>
                        <td width="20%"><?php echo $branch?></td>
                        <th class="warning" width="15%">收缴时间</th>
                        <td width="15%">TODO the code</td>
                        <th class="warning" width="15%">收缴人</th>
                        <td width="15%">常诚</td>
                    </tr>
                </table>
                <div class="row">
                    <hr>
                    <div class="col-md-12">
                        <table class="table table-condensed" align="center">
                            <tr class="warning">
                                <th width="15%">选择</th>
                                <th width="15%">序号</th>
                                <th width="15%">姓名</th>
                                <th width="20%">应缴金额（元）</th>
                                <th width="20%">实缴金额（元）</th>
                                <th width="15%">备注</th>
                            </tr>

                            <?php
                                $index = 1;
                                while ($rows = $result->fetch_array()){
                                echo <<<TABLE
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                </label>
                                            </div>
                                        </td>
                                        <td>$index</td>
                                        <td>{$rows['name']}</td>
                                        <td>{$rows['request']}</td>
                                        <td>{$rows['paid']}</td>
                                        <td>{$rows['remark']}</td>
                                    </tr>

TABLE;
                                    $index++;
                                }

                            ?>



                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
</body>

</html>
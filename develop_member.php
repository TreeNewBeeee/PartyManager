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

        <h3><i class="fa fa-id-badge"></i>&nbsp;发展对象</h3>
        <hr>
        <div class="col-md-12">
            <div class="row">
                <?php
                $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位

                ?>

                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="person_create.php?branch=<?php echo $branch?>&type=发展对象">新增</a>
                </button>


            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr>

                <table class="table table-condensed" align="center">
                    <tr class="warning">
                        <th width="5%">序号</th>
                        <th width="10%">姓名</th>
                        <th width="20%">申请入党时间</th>
                        <th width="20%">列为积极分子时间</th>
                        <th width="20%">列为发展对象时间</th>
                        <th width="20%">备注</th>
                    </tr>
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

                    $query = "select * FROM person WHERE `branch` = '" . $branch . "' AND `type` = '发展对象'";
                    $result = $conn->query($query);
                    if (!$result) die($conn->connect_error);

                    $index = 1;
                    while ($rows = $result->fetch_array()) {
                        echo <<<TABLE
                        <tr>
                        <td>$index</td>
                        <td><a href = "person_detail.php?name={$rows['name']}&type=发展对象&branch={$branch}">{$rows['name']}</a></td>
                        <td>{$rows['applicationTime']}</td>
                        <td>{$rows['activistTime']}</td>
                        <td>{$rows['developmentTime']}</td>
                        <td>{$rows['remark']}</td>
                        
                    </tr>

TABLE;
                        $index++;
                    }

                    $result->close();
                    $conn->close();


                    //                    echo $branch;
                    ?>

                </table>

            </div>
        </div>
    </div>
</div>

</body>
</html>
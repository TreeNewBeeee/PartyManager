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
<?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
    }

    $name = isset($_GET['name']) ? $_GET['name'] : NULL;    // 获取姓名
    $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取类别
    $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取支部
    require_once 'db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');

    $query = "select * FROM person WHERE `name` = '" . $name . "'";
    $result = $conn->query($query);
    if (!$result) die($conn->connect_error);

    $person = $result->fetch_array();

?>

<div id="container">

    <div id="content">

        <h3><i class="fa fa-file-text"></i>&nbsp;人员信息</h3>
        <hr>
        <div class="col-md-12">
            <div class="row">

                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><a href="person_edit.php?name=<?php echo $name?>&type=<?php echo $type?>&branch=<?php echo $branch?>">编辑</a>
                </button>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span><a href="person_delete.php?name=<?php echo $name?>&type=<?php echo $type?>&branch=<?php echo $branch?>">删除</a>
                </button>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr>
                <p><i class="fa fa-edit"></i>&nbsp;基本信息</p>
                <table class="table table-condensed" align="center">
                    <tr>
                        <th class="warning">姓名</th>
                        <td><?php echo $person['name'] ?></td>
                        <th class="warning">性别</th>
                        <td><?php echo $person['gen'] ?></td>
                        <th class="warning">籍贯</th>
                        <td><?php echo $person['native'] ?></td>
                        <td rowspan="6" colspan="2"><img src="images/photos/<?php echo $person['name'] ?>.png" alt="<?php echo $person['name'] ?>.png"/></td>
                    </tr>



                    <tr>
                        <th class="warning">出生年月</th>
                        <td><?php echo $person['birth'] ?></td>
                        <th class="warning">户口所在</th>
                        <td><?php echo $person['household'] ?></td>
                        <th class="warning">政治面貌</th>
                        <td><?php echo $person['type'] ?></td>
                    </tr>
                    <tr>
                        <th class="warning">入职时间</th>
                        <td><?php echo $person['workTime'] ?></td>
                        <th class="warning">部门岗位</th>
                        <td><?php echo $person['sector'] ?></td>
                        <th class="warning">职务</th>
                        <td><?php echo $person['position'] ?></td>
                    </tr>
                    <tr>
                        <th class="warning">职称</th>
                        <td><?php echo $person['techTitle'] ?></td>
                        <th class="warning">学历</th>
                        <td><?php echo $person['eduBackground'] ?></td>
                        <th class="warning">毕业院校</th>
                        <td><?php echo $person['school'] ?></td>
                    </tr>
                    <tr>
                        <th class="warning">所学专业</th>
                        <td><?php echo $person['major'] ?></td>
                        <th class="warning">毕业时间</th>
                        <td><?php echo $person['graduationTime'] ?></td>
                        <th class="warning"></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th class="warning">身份证号</th>
                        <td><?php echo $person['idCard'] ?></td>
                        <th class="warning">手机号码</th>
                        <td><?php echo $person['cell'] ?></td>
                        <th class="warning"></th>
                        <td></td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <p>党籍信息</p>
                        <table class="table table-condensed" align="center">
                            <tr>
                                <th class="warning">人员状态</th>
                                <td><?php echo $person['type'] ?></td>
                                <th class="warning">申请入党日期</th>
                                <td><?php echo $person['applicationTime'] ?></td>
                                <th class="warning">列为积极分子日期</th>
                                <td><?php echo $person['activistTime'] ?></td>
                            </tr>
                            <tr>
                                <th class="warning">列为发展对象日期</th>
                                <td><?php echo $person['developmentTime'] ?></td>
                                <th class="warning">培养联系人</th>
                                <td><?php echo $person['trainner'] ?></td>
                                <th class="warning">所在党支部</th>
                                <td><?php echo $person['branch'] ?></td>
                            </tr>
                            <tr>
                                <th class="warning">入党介绍人</th>
                                <td><?php echo $person['introducer'] ?></td>
                                <th class="warning">支部大会通过时间</th>
                                <td><?php echo $person['agreeTime'] ?></td>
                                <th class="warning">上级批准时间（预备）</th>
                                <td><?php echo $person['probationaryTime'] ?></td>
                            </tr>
                            <tr>
                                <th class="warning">进入空管局党委时间</th>
                                <td><?php echo $person['workTime'] ?></td>
                                <th class="warning">预备转正日期</th>
                                <td><?php echo $person['preregularTime'] ?></td>
                                <th class="warning">上级批准时间（转正）</th>
                                <td><?php echo $person['regularTime'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>

</html>
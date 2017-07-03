<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-07-03
 * Time: 18:37
 */
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-treeview.css" rel="stylesheet">
    <!-- Required Javascript -->
    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap-treeview.min.js"></script>

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

            background: linear-gradient(#fff, #ffdcb9);

        }

        th {

            padding: 10px;
            text-align: center;
            background-color: #FF9999;
            background: -ms-linear-gradient(top, #fff, #ffdcb9); /* IE 10 */
            background: -moz-linear-gradient(top, #b8c4cb, #f6f6f8); /*火狐*/
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#b8c4cb), to(#f6f6f8)); /*谷歌*/
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#ffdcb9)); /* Safari 4-5, Chrome 1-9*/
            background: -webkit-linear-gradient(top, #fff, #ffdcb9); /*Safari5.1 Chrome 10+*/
            background: -o-linear-gradient(top, #fff, #ffdcb9); /*Opera 11.10+*/
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
            color: #FF0000;
            text-decoration: underline;
        }

        a:visited {
            color: #00FF00;
            text-decoration: none;
        }

        a:hover {
            color: #000000;
            text-decoration: none;
        }

        a:active {
            color: #FFFFFF;
            text-decoration: none;
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


        ?>


        <div class="row">
            <div class="col-md-12">

                <form action="#" method="post" enctype="multipart/form-data">
                    <h3><i class="fa fa-print"></i>&nbsp;工会宣传指标-编辑页</h3>
                    <br>

                    <?php
                    require_once '../db_login.php';
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) die($conn->connect_error);
                    mysqli_set_charset($conn, 'utf8');

                    $query = "SELECT * FROM `sectors` WHERE `uppersector` = '技术保障中心'";
                    $result = $conn->query($query);
                    $index = 0;
                    while ($rows = $result->fetch_array()) {
                        $sector[$index] = $rows['name'];
                        $index++;
                        echo <<<SECTORTASK
                        <div class="row">
                            <div class="col-xs-4 col-md-offset-2">
                                {$rows['name']}：
                            </div>
                            <div class="col-xs-4">
                                <input type="text" name="{$rows['name']}">&nbsp;&nbsp;篇
                            </div>
                            
    
                        </div>
                        <br/>
SECTORTASK;

                    }
                    $result->close();

                    ?>
                    <div>
                        <input type="hidden" name="isPost" value="true">
                    </div>

                    <div style="margin:0 auto;width:200px;">

                        <button class="button orange" type="submit" name="submit" value="submit">提交</button>
                    </div>
                </form>

                <?php
                //                var_dump($sector) ;
                //                echo count($sector);
                if (isset($_POST['isPost'])){
                    for ($i = 0;$i < count($sector);$i++){
//                    echo $_POST["$sector[$i]"];
//                        echo $i.$sector[$i]."==";
                        $query = "UPDATE `sectors` SET `unionpropagandatask` = '".$_POST["$sector[$i]"]."' WHERE `name` = '".$sector[$i]."'";
                        $conn->query($query);
                    }

                    $conn->close();
                    echo "<script> window.location.href='./union.php';</script>";
                }

                ?>

            </div>
        </div>
    </div>
</div>

</body>
</html>

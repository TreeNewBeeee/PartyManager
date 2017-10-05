<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-09-11
 * Time: 23:26
 */
?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
    <?php session_start(); ?>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/main.css"/>
        <title>三鹰选拔</title>
        <style type="text/css">

        </style>
    </head>

    <body>
    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
    }

//    $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位
    $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取类型

    ?>
    <div class="new-wrap">
        <div class="top-title">
            <p>
                <span class="icon-comm">年</span>
                <span class="top-t">三鹰选拔-<?php echo $type?></span>
            </p>
        </div>

        <div class="">

            <?php
            require_once '../db_login.php';
            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
            if ($conn->connect_error) die($conn->connect_error);
            mysqli_set_charset($conn, 'utf8');
            $year = date("Y");

//            $query = "select * from `person` WHERE `name` = '".$_SESSION['username']."'";
//            $result = $conn->query($query);
//            $row = $result->fetch_array();
            if ($_SESSION['authorityCode'] <= 1){
                echo <<<PRINT
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <a class="btn btn-default" href="./eaglesAdd.php?type={$type}" role="button">新增</a>
                        
                        
                    </div>
        
                </div>

PRINT;

            }

            ?>


            <div class="memberTable new-martop">
                <div class="col-md-12">
                    <table class="table">
                        <tr class="thhead">
                            <th width="10%" class="text-center">序号</th>
                            <th width="15%" class="text-center">姓名</th>
                            <th width="15%" class="text-center">总分</th>
                            <th class="text-center">玫瑰图</th>
                        </tr>
                        <?php
                        require_once '../db_login.php';
                        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                        if ($conn->connect_error) die($conn->connect_error);
                        mysqli_set_charset($conn, 'utf8');

                        $query = "SELECT * FROM `eagles` WHERE `year` = '".$year."' AND `type` = '".$type."' ORDER BY `eagles`.`total` DESC";
                        $result = $conn->query($query);

                        $index = 1;
                        while ($row = $result->fetch_array()){
                            echo <<<PRINTTABLE
                            <tr class="ttd">
                                <td class="text-center">{$index}</td>
                                <td class="text-center">{$row['name']}</td>
                                <td class="text-center">{$row['total']}</td>
                                <td class="text-center"><a class="" href="javascript:window.open ('./spiderView.php?name={$row['name']}&type={$type}', 'newwindow', 'height=420, width=600, top=200, left=200, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no')" role="button">查看</a> </td>
                            </tr>

PRINTTABLE;
                            $index++;

                        }

                        ?>




                    </table>
                </div>

            </div>



        </div>
    </div>

    </body>
    </html>




<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-04-27
 * Time: 01:11
 */
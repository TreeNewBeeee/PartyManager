<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-10-15
 * Time: 16:09
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
    <title>法规学习</title>
    <style type="text/css">

    </style>
</head>

<body>
<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $authorityCode = $_SESSION['authorityCode'];
} else {
    echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
}


?>
<div class="new-wrap">
    <div class="top-title">
        <p>
            <span class="icon-comm">法</span>
            <span class="top-t">法规学习</span>
        </p>
    </div>

    <div id="content" class="member">

        <?php
        require_once '../db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        if ($authorityCode <= 1){
            echo <<<PRINT
                <div class="addbtn">
                        <span type="button" class="btn btn-default addBtn">
                            <i class="icon-add"></i><a href="./submitItem.php?type=法规学习">新增</a>
                        </span>
                         
               </div>

PRINT;

        }

        ?>


        <div class="row memberTable new-martop">
            <div class="col-md-12">
                <table class="table">
                    <tr class="thhead">
                        <th width="10%" class="text-center">序号</th>
                        <th width="80%" class="text-center">标题</th>
                        <th class="text-center">下载</th>
                    </tr>
                    <?php
                    require_once '../db_login.php';
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) die($conn->connect_error);
                    mysqli_set_charset($conn, 'utf8');

                    $query = "select * from `anticorruption` WHERE `type` = '法规学习' ORDER BY `ID` DESC";
                    $result = $conn->query($query);
                    // TODO: 未完成根据时间限制查看
                    $index = 1;
                    while ($row = $result->fetch_array()){
                        echo <<<PRINTTABLE
                            <tr class="ttd">
                                <td class="text-center">{$index}</td>
                                <td class="text-center">{$row['name']}</td>
                                <td class="text-center"><a class="" href="../Files/{$row['file']}" role="button">查看</a> </td>
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



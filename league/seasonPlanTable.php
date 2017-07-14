<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-07-12
 * Time: 22:18
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title></title>
</head>

<body>
<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
}

$branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位

?>
<div class="container">


    <div class="row">

        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <h3>季度计划-<?php echo $branch ?></h3>
                <hr>
            </div>

        </div>

        <?php
        require_once '../db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "select * from `person` WHERE `name` = '" . $_SESSION['username'] . "'";
        $result = $conn->query($query);
        $row = $result->fetch_array();
        if ($row['branch'] == $branch) {
            echo <<<PRINT
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <a class="btn btn-default" href="seasonPlanCreate.php?branch={$branch}" role="button">新增</a>
                        <a class="btn btn-default" href="seasonPlanDelete.php?branch={$branch}" role="button">删除</a>
                        
                    </div>
        
                </div>

PRINT;

        }

        ?>

        <br>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-condensed">
                    <tr>
                        <th width="10%" class="text-center">序号</th>
                        <th width="15%" class="text-center">年份</th>
                        <th width="15%" class="text-center">季度</th>
                        <th class="text-center">下载</th>
                    </tr>
                    <?php
                    require_once '../db_login.php';
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) die($conn->connect_error);
                    mysqli_set_charset($conn, 'utf8');

                    $query = "SELECT * FROM `plans` WHERE `branch` = '" . $branch . "' AND `type` = '季度计划'  ORDER BY `plans`.`year` DESC";
                    $result = $conn->query($query);
                    // TODO: 未完成根据时间限制查看
                    $index = 1;
                    while ($row = $result->fetch_array()) {
                        echo <<<PRINTTABLE
                            <tr>
                                <td class="text-center">{$index}</td>
                                <td class="text-center">{$row['year']}</td>
                                <td class="text-center">{$row['season']}</td>
                                <td class="text-center"><a class="btn btn-default btn-sm" href="../Files/{$row['fileName']}" role="button">查看</a> </td>
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



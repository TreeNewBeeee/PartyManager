<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-07-03
 * Time: 13:25
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

<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-1">

            <h3>发表情况</h3>

        </div>

    </div>
    <br/>

    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $authorityCode = $_SESSION['authorityCode'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='../index.php';</script>";
    }

    $type = isset($_GET['type']) ? $_GET['type'] : null;
    $branch = isset($_GET['branch']) ? $_GET['branch'] : null;
    $magzing = isset($_GET['magzing']) ? $_GET['magzing'] : null;
    $influence = isset($_GET['influence']) ? $_GET['influence'] : null;

    require_once '../db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');


    ?>


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-condensed">
                <tr>
                    <th class="text-center" width="5%">序号</th>
                    <th class="text-center" width="30%">标题</th>
                    <th class="text-center" width="20%">刊物</th>
                    <th class="text-center" width="20%">图/文作者</th>
                    <th class="text-center" width="5%">字数</th>
                    <th class="text-center" width="15%">发表时间</th>
                    <th class="text-center" width="5%">附件</th>
                </tr>
                <?php
                $query = "SELECT * FROM `propaganda` WHERE `branch` = '".$branch."' and
                            `type` = '".$type."' and `year` = '".date("Y")."' and
                            `influence` = '".$influence."'";
                $result = $conn->query($query);
                $index = 1;
                while ($rows = $result->fetch_array()){
                    echo <<<PRINTTABLE
                    <tr>
                        <td class="text-center">{$index}</td>
                        <td class="text-center">{$rows['title']}</td>
                        <td class="text-center">{$rows['magzing']}</td>
                        <td class="text-center">图：{$rows['grapher']}/文：{$rows['writter']}</td>
                        <td class="text-center">{$rows['length']}</td>
                        <td class="text-center">{$rows['publishTime']}</td>
                        <td class="text-center"><a href="{$rows['file']}">查看</a></td>
                    </tr>
PRINTTABLE;
                    $index++;
                }
                ?>



            </table>
        </div>
    </div>
</div>

</body>
</html>

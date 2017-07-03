<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-07-03
 * Time: 19:29
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

            <h3>政务信息详情</h3>

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
                    <th class="text-center" width="40%">标题</th>
                    <th class="text-center" width="15%">作者</th>
                    <th class="text-center" width="15%">发表时间</th>
                    <th class="text-center" width="5%">附件</th>
                    <?php
                    if ($authorityCode == 0 or $authorityCode == 102){
                        switch ($magzing){
                            case '已发表':
                                echo <<<PRINTBUTTON
                                <th class="text-center" width="20%">中心采编</th>
PRINTBUTTON;

                                break;
                            case '中心采编':
                                echo <<<PRINTBUTTON
                                <th class="text-center" width="20%">西北空管局采编</th>
PRINTBUTTON;
                                break;
                            case '西北空管局采编':
                                echo <<<PRINTBUTTON
                                <th class="text-center" width="20%">民航局空管局采编</th>
PRINTBUTTON;
                                break;
                            case '民航局空管局采编':
                                echo <<<PRINTBUTTON
                                <th class="text-center" width="20%">民航局采编</th>
PRINTBUTTON;
                                break;
                            default:
                                echo <<<PRINTBUTTON
                                <th class="text-center" width="20%">民航局已采编</th>
PRINTBUTTON;
                                break;
                        }
                    }
                    ?>
                </tr>
                <?php
                $query = "SELECT * FROM `propaganda` WHERE `branch` = '".$branch."' and
                            `type` = '".$type."' and `year` = '".date("Y")."' and `magzing` = '".$magzing."'";
                $result = $conn->query($query);
                $index = 1;
                while ($rows = $result->fetch_array()){
                    echo <<<PRINTTABLE
                    <tr>
                        <td class="text-center">{$index}</td>
                        <td class="text-center">{$rows['title']}</td>
                        <td class="text-center">{$rows['writter']}</td>
                        <td class="text-center">{$rows['publishTime']}</td>
                        <td class="text-center"><a href="{$rows['file']}">查看</a></td>
PRINTTABLE;
                    if ($authorityCode == 0 or $authorityCode == 102){
                        echo <<<PRINTBUTTON
                        <td class="text-center">
                                <form action="#" method="post">
                                    <input type="hidden" name="change" value="change">
                                    <input type="hidden" name="title" value="{$rows['title']}">
                                    <input type="hidden" name="magzing" value="{$magzing}">
                                    <input type="hidden" name="branch" value="{$branch}">
                                    <input type="submit" name="submit" value="采编">
                                </form>
                            </td>
                        </tr>
PRINTBUTTON;

                    }


                    $index++;
                }
                ?>



            </table>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['change']) and $_POST['change'] == 'change'){
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $magzing = isset($_POST['magzing']) ? $_POST['magzing'] : null;
        $branch = isset($_POST['branch']) ? $_POST['branch'] : null;

//        echo $title,$magzing,$branch;
        require_once '../db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        switch ($magzing){
            case '已发表':
                $query = "UPDATE `propaganda` SET `magzing`='中心采编' WHERE `title` = '".$title."' and
                    `branch` = '".$branch."' and `type` = '政务信息' and `year` = '".date("Y")."'";
                $conn->query($query);
                echo "<script> window.location.href='./affairsInfo.php';</script>";
                break;
            case '中心采编':
                $query = "UPDATE `propaganda` SET `magzing`='西北空管局采编' WHERE `title` = '".$title."' and
                    `branch` = '".$branch."' and `type` = '政务信息' and `year` = '".date("Y")."'";
                $conn->query($query);
                echo "<script> window.location.href='./affairsInfo.php';</script>";
                break;
            case '西北空管局采编':
                $query = "UPDATE `propaganda` SET `magzing`='民航局空管局采编' WHERE `title` = '".$title."' and
                    `branch` = '".$branch."' and `type` = '政务信息' and `year` = '".date("Y")."'";
                $conn->query($query);
                echo "<script> window.location.href='./affairsInfo.php';</script>";
                break;
            case '民航局空管局采编':
                $query = "UPDATE `propaganda` SET `magzing`='民航局采编' WHERE `title` = '".$title."' and
                    `branch` = '".$branch."' and `type` = '政务信息' and `year` = '".date("Y")."'";
                $conn->query($query);
                echo "<script> window.location.href='./affairsInfo.php';</script>";
                break;
            default:

                break;
        }

    }
?>

</body>
</html>


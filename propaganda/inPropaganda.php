<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-07-03
 * Time: 16:44
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>内媒宣传</title>
</head>

<body>

<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-1">

            <h3>内媒宣传</h3>
            <br/>

        </div>

    </div>

    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $authorityCode = $_SESSION['authorityCode'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='../index.php';</script>";
    }

    /*if ($authorityCode == 102 or $authorityCode == 0) {
        echo <<<PRINTBUTTON
        <div class="row">
                <div class="col-md-4 col-md-offset-1">

                    <button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="./outPropagandaTask.php">&nbsp;外媒指标编辑</a>
                    </button>
                </div>
            </div>
            <br/>
PRINTBUTTON;

    }*/

    ?>


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-condensed">
                <tr>
                    <th class="text-center">党支部</th>
                    <th class="text-center">内网</th>
                    <th class="text-center">西北空管</th>
                    <th class="text-center">支部上传</th>
                </tr>

                <?php
                require_once '../db_login.php';
                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                if ($conn->connect_error) die($conn->connect_error);
                mysqli_set_charset($conn, 'utf8');

                $query = "SELECT * FROM `sectors` WHERE `uppersector` = '技术保障中心'";
                $result = $conn->query($query);

                $index = 0;
                //                获取支部名称及支部指标
                while ($rows = $result->fetch_array()) {
                    $sector[$index] = $rows['name'];
                    $sectorTask[$index] = $rows['outpropagandatask'];
                    $index++;
                }
                $result->close();
                //                打印支部内刊刊登表格
                for ($i = 0; $i < $index; $i++) {
                    $query = "SELECT * FROM `propaganda` WHERE `branch` = '" . $sector[$i] . "' and
                     `type` = '内刊' and `magzing` = '内网' and `year` = '" . date("Y") . "'";
                    $result = $conn->query($query);
                    $num = $result->num_rows;

                    echo <<<PRINTSECTOR
                    <tr>
                        <td>{$sector[$i]}</td>
                        <td class="text-center"><a href="./propagandaDetails.php?type=内刊&magzing=内网&branch={$sector[$i]}">{$num}</a></td>
                        
PRINTSECTOR;
                    $query = "SELECT * FROM `propaganda` WHERE `branch` = '" . $sector[$i] . "' and
                     `type` = '内刊' and `magzing` = '西北空管' and `year` = '" . date("Y") . "'";
                    $result = $conn->query($query);
                    $num = $result->num_rows;
                    echo <<<PRINTSECTOR2
                    
                        <td class="text-center"><a href="./propagandaDetails.php?type=内刊&magzing=西北空管&branch={$sector[$i]}">{$num}</a></td>
                        
PRINTSECTOR2;

                    if ($authorityCode == 0 or ($authorityCode == 20 and $sector[$i] == $_SESSION['branch'])) {
                        echo <<<PRINTUPDATE
                        <td class="text-center"><a href="./updatePropaganda.php?type=内刊&branch={$sector[$i]}">上传内刊</a></td>
                    </tr>
PRINTUPDATE;

                    } else {
                        echo <<<PRINTEND
                        <td></td>
                    <tr/>
PRINTEND;


                    }
                }

                $result->close();
                $conn->close();
                ?>


            </table>
        </div>
    </div>
</div>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-03-28
 * Time: 18:27
 */

    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $authorityCode = $_SESSION['authorityCode'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
    }

    $title = isset($_GET['title']) ? $_GET['title'] : NULL;    // 获取任务名称
    $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取支部名称
    $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取任务类型

    echo $title,$branch;

    if ($_FILES['file']['name'] != '') {
        if ($_FILES['file']['error'] > 0) {
            echo "错误状态：" . $_FILES['file']['error'];
        } else {
            if (file_exists("../Files/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    "./Files/" . iconv('utf-8', 'gb2312', $_FILES["file"]["name"]));
                echo "文件保存在: " . "/Files/" . $_FILES["file"]["name"] . " <br />";
                echo "类型: " . $_FILES["file"]["type"] . "<br />";
                echo "大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                //            echo "<script>alert('上传成功！');</script>";
            }



            require_once './db_login.php';
            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
            if ($conn->connect_error) die($conn->connect_error);
            mysqli_set_charset($conn, 'utf8');

            $query = "UPDATE `missionlog` SET `submitter` = '" . $username . "', `status` = '已上传',
                    `annixSubmit` = '".$_FILES["file"]["name"]."', `finishTime` = '".date("Y-m-d")."' WHERE `missionlog`.`branch` = '" . $branch . "' 
                    AND `missionlog`.`title` = '" . $title . "'";

            $conn->query($query);

//            This code is for create MSG
            $today = date("Y-m-d");
            $now = date("H:i:s");

            $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                  VALUES (NULL, '".$branch."', '" . $today . "', '" . $now . "', '" . $title . "',
                   '".$type."', '已上传', '未处理');";
            $conn->query($query);
            $conn->close();
        }
    } else {
        echo "<script>alert('请上传文件！');</script>";
    }
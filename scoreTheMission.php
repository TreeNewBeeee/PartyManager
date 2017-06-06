<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-03-27
 * Time: 11:23
 * Discription: 该页面作为党委秘书对各支部提交任务打分使用
 */


if (!empty($_POST['score'])) {
    require_once './db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');
    $today = date("Y-m-d");
    $now = date("H:i:s");

    $title = !empty($_GET['title']) ? $_GET['title'] : null;
    $branch = !empty($_GET['branch']) ? $_GET['branch'] : null;
    $type = !empty($_GET['type']) ? $_GET['type'] : null;
    $score = !empty($_POST['score']) ? $_POST['score'] : null;

    echo $title,$branch,$score;

    $query = "UPDATE `missionlog` SET `score` = '" . $score . "', `status` = '已打分' WHERE `missionlog`.`branch` = '" . $branch . "' 
                    AND `missionlog`.`title` = '" . $title . "'";


    $conn->query($query);

    $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                          VALUES (NULL, '" . $branch . "', '" . $today . "', '" . $now . "', '" . $_POST['title'] . "',
                           '".$type."', '已打分', '未处理');";
    $conn->query($query);

    echo "赋分成功！";
    $conn->close();
}
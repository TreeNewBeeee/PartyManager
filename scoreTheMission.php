<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-03-27
 * Time: 11:23
 * Discription: 该页面作为党委秘书对各支部提交任务打分使用
 *
 * Modified: 2017-09-05
 */


if (!empty($_POST['flag'])) {
    require_once './db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');
    $today = date("Y-m-d");
    $now = date("H:i:s");

    $title = !empty($_GET['title']) ? $_GET['title'] : null;
    $branch = !empty($_GET['branch']) ? $_GET['branch'] : null;
    $type = !empty($_GET['type']) ? $_GET['type'] : null;
//    $score = !empty($_POST['score']) ? $_POST['score'] : null;

    $score_1 = !empty($_POST['score_1']) ? $_POST['score_1'] : null;
    $score_2 = !empty($_POST['score_2']) ? $_POST['score_2'] : null;
    $score_3 = !empty($_POST['score_3']) ? $_POST['score_3'] : null;
    $deny = !empty($_POST['deny']) ? $_POST['deny'] : null;

    if ($deny == 'on'){    // 驳回
//        echo $score_1,$score_2,$score_3,$deny;
        $score = 0;
        $score_1 = 0;
        $score_2 = 0;
        $score_3 = 0;
        $query = "UPDATE `missionlog` SET `score` = 0, `status` = '已发布', `score_1` = 0, `score_2` = 0, `score_3` = 0 WHERE `missionlog`.`branch` = '" . $branch . "' 
                    AND `missionlog`.`title` = '" . $title . "'";
    }
    else{                  // 未驳回
        $score = $score_1 + $score_2 + $score_3;

        $query = "UPDATE `missionlog` SET `score` = '" . $score . "', `status` = '已打分' WHERE `missionlog`.`branch` = '" . $branch . "' 
                    AND `missionlog`.`title` = '" . $title . "'";
    }
    $conn->query($query);

    $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                          VALUES (NULL, '" . $branch . "', '" . $today . "', '" . $now . "', '" . $title . "',
                           '".$type."', '已打分', '未处理');";
    $conn->query($query);
    $conn->close();

    echo "<script> window.location.href='missionList.php?branch={$branch}&type={$type}';</script>";
}
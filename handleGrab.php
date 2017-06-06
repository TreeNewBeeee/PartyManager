<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-04-13
 * Time: 02:18
 */

    if (isset($_GET['title'])){
//        echo $_GET['title'];
//        echo $_GET['branch'];
        require_once './db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');
        $today = date("Y-m-d");
        $branch = $_GET['branch'];

        $query = "select * from `missionlog` WHERE `title` = '".$_GET['title']."' and `branch` = '".$_GET['branch']."' and `type` = '抢接任务'";
        $result = $conn->query($query);
        if (!$result) die($conn->connect_error);
        $num = $result->num_rows;
        if ($num != 0){
            // 已经抢接过了
            echo "<script>alert('您所在的支部已经抢接该任务，请及时完成并上传相关文件');location.href='missionList.php?type=抢接任务&branch={$branch}';</script>";
//            echo "<script>alert('您所在的支部已经抢接该任务，请及时完成并上传相关文件')</script>";

        }else{
            $query = "SELECT * FROM `rushmission` WHERE `title` = '".$_GET['title']."'";
            $result = $conn->query($query);
            if (!$result) die($conn->connect_error);
            $rows = $result->fetch_array();

            $query = "INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`,
                `details`,`publishTime`, `timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`,
                `branch`, `submitter`) VALUES (NULL, '" . $rows['title'] . "', '" . $rows['publisher'] . "',
                 '" . $rows['annix'] . "', '" . $rows['details'] . "','".$today."',
                  '" . $rows['timeLimit'] . "', NULL, '抢接任务', '已发布', '0', NULL, '".$_GET['branch']."', NULL);";


            $conn->query($query);

            $leftnum = $rows['leftnum'] - 1;
            $query = "UPDATE `rushmission` SET `leftnum` = '".$leftnum."' WHERE
                                `rushmission`.`title` = '" . $rows['title'] . "'";
            $conn->query($query);

            echo "<script>alert('抢接成功！');</script>";
        }




        $result->close();
        $conn->close();

        echo "<script> window.location.href='./missionList.php?type=抢接任务&branch={$branch}';</script>";
    }
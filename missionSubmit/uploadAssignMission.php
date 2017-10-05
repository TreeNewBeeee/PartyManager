<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-03-25
 * Time: 20:24
 */

$path = "../Files/".date("Y")."/".date("m")."/AssignMissionFiles/";
if (!is_dir($path)){
    mkdir($path,0777,true);
}                         // 以年/月/类别为路径存储，如果不存在该路径则创建


    if ($_FILES['file']['name'] != '') {
        $filename = "JB-Assign-".date("Y-m")."-".$_FILES['file']['name'];    // 重命名文件
        if ($_FILES['file']['error'] > 0) {
            echo "错误状态：" . $_FILES['file']['error'];
        } else {
            if (file_exists($path . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    $path . iconv('utf-8', 'gb2312', $filename));
//                echo "文件保存在: " . "/Files/" . $_FILES["file"]["name"] . " <br />";
//                echo "类型: " . $_FILES["file"]["type"] . "<br />";
//                echo "大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                echo "<script>alert('创建成功！');</script>";
            }


        }
    } else {
//        echo "<script>alert('请上传文件！');</script>";
    }

    require_once '../db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');
    $today = date("Y-m-d");
    $now = date("H:i:s");

    /*将任务记录*/
    $query = "INSERT INTO `assignmission` (`id`, `publisher`, `title`, `annix`,
         `details`, `max`, `min`, `timeLimit`, `office`, `communication`, `automatic`,
          `radar`, `power`, `maintain`, `commuRun`, `motor`, `navi`, `route`) 
          VALUES (NULL, '" . $_POST['publisher'] . "', '" . $_POST['title'] . "', '" . $path.$filename . "',
           '" . $_POST['details'] . "', NULL, NULL,
            '" . $_POST['timeLimit'] . "', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');";
    $conn->query($query);

    /*为每个党支部创建任务及消息*/
//    echo $_POST['office'];

    if (isset($_POST['office']) && $_POST['office'] == 'on'){
        $query = "INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`, 
            `details`, `publishTime`, `timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`, 
            `branch`, `submitter`) VALUES (NULL, '" . $_POST['title'] . "', '" . $_POST['publisher'] . "',
             '" . $path.$filename . "', '" . $_POST['details'] . "','".$today."',
              '" . $_POST['timeLimit'] . "', NULL, '指定任务', '已发布', '0', NULL, '机关党支部', NULL);";
        $conn->query($query);
        //更新任务记录中指派对象
        $query = "UPDATE `assignmission` SET `office` = '1' WHERE `assignmission`.`title` = '" . $_POST['title'] . "'";
        $conn->query($query);

        $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                  VALUES (NULL, '机关党支部', '".$today."', '".$now."', '" . $_POST['title'] . "',
                   '指定任务', '已发布', '未处理');";
        $conn->query($query);
    }

    if (isset($_POST['commu']) && $_POST['commu'] == 'on'){
        $query = "INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`, 
                `details`, `publishTime`,`timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`, 
                `branch`, `submitter`) VALUES (NULL, '" . $_POST['title'] . "', '" . $_POST['publisher'] . "',
                 '" . $path.$filename . "', '" . $_POST['details'] . "','".$today."',
                  '" . $_POST['timeLimit'] . "', NULL, '指定任务', '已发布', '0', NULL, '通信室党支部', NULL);";
        $conn->query($query);
        //更新任务记录中指派对象
        $query = "UPDATE `assignmission` SET `communication` = '1' WHERE `assignmission`.`title` = '" . $_POST['title'] . "'";
        $conn->query($query);

        $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                  VALUES (NULL, '通信室党支部', '".$today."', '".$now."', '" . $_POST['title'] . "',
                   '指定任务', '已发布', '未处理');";
        $conn->query($query);
    }

    if (isset($_POST['commuRun']) && $_POST['commuRun'] == 'on'){
        $query = "INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`, 
                `details`,`publishTime`, `timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`, 
                `branch`, `submitter`) VALUES (NULL, '" . $_POST['title'] . "', '" . $_POST['publisher'] . "',
                 '" . $path.$filename . "', '" . $_POST['details'] . "','".$today."',
                  '" . $_POST['timeLimit'] . "', NULL, '指定任务', '已发布', '0', NULL, '通信运行室党支部', NULL);";
        $conn->query($query);
        //更新任务记录中指派对象
        $query = "UPDATE `assignmission` SET `commuRun` = '1' WHERE `assignmission`.`title` = '" . $_POST['title'] . "'";
        $conn->query($query);

        $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                  VALUES (NULL, '通信运行室党支部', '".$today."', '".$now."', '" . $_POST['title'] . "',
                   '指定任务', '已发布', '未处理');";
        $conn->query($query);
    }

    if (isset($_POST['automatic']) && $_POST['automatic'] == 'on'){
        $query = "INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`, 
                `details`,`publishTime`, `timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`, 
                `branch`, `submitter`) VALUES (NULL, '" . $_POST['title'] . "', '" . $_POST['publisher'] . "',
                 '" . $path.$filename . "', '" . $_POST['details'] . "','".$today."',
                  '" . $_POST['timeLimit'] . "', NULL, '指定任务', '已发布', '0', NULL, '自动化数据室党支部', NULL);";
        $conn->query($query);
        //更新任务记录中指派对象
        $query = "UPDATE `assignmission` SET `automatic` = '1' WHERE `assignmission`.`title` = '" . $_POST['title'] . "'";
        $conn->query($query);

        $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                  VALUES (NULL, '自动化数据室党支部', '".$today."', '".$now."', '" . $_POST['title'] . "',
                   '指定任务', '已发布', '未处理');";
        $conn->query($query);
    }

    if (isset($_POST['radar']) && $_POST['radar'] == 'on'){
        $query = "INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`, 
                `details`, `publishTime`,`timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`, 
                `branch`, `submitter`) VALUES (NULL, '" . $_POST['title'] . "', '" . $_POST['publisher'] . "',
                 '" . $path.$filename . "', '" . $_POST['details'] . "','".$today."',
                  '" . $_POST['timeLimit'] . "', NULL, '指定任务', '已发布', '0', NULL, '雷达室党支部', NULL);";
        $conn->query($query);
        //更新任务记录中指派对象
        $query = "UPDATE `assignmission` SET `radar` = '1' WHERE `assignmission`.`title` = '" . $_POST['title'] . "'";
        $conn->query($query);

        $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                  VALUES (NULL, '雷达室党支部', '".$today."', '".$now."', '" . $_POST['title'] . "',
                   '指定任务', '已发布', '未处理');";
        $conn->query($query);
    }

    if (isset($_POST['navi']) && $_POST['navi'] == 'on'){
        $query = "INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`, 
                `details`,`publishTime`, `timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`, 
                `branch`, `submitter`) VALUES (NULL, '" . $_POST['title'] . "', '" . $_POST['publisher'] . "',
                 '" . $path.$filename . "', '" . $_POST['details'] . "','".$today."',
                  '" . $_POST['timeLimit'] . "', NULL, '指定任务', '已发布', '0', NULL, '导航室党支部', NULL);";
        $conn->query($query);
        //更新任务记录中指派对象
        $query = "UPDATE `assignmission` SET `navi` = '1' WHERE `assignmission`.`title` = '" . $_POST['title'] . "'";
        $conn->query($query);

        $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                  VALUES (NULL, '导航室党支部', '".$today."', '".$now."', '" . $_POST['title'] . "',
                   '指定任务', '已发布', '未处理');";
        $conn->query($query);
    }

    if (isset($_POST['route']) && $_POST['route'] == 'on'){
        $query = "INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`, 
                `details`, `publishTime`,`timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`, 
                `branch`, `submitter`) VALUES (NULL, '" . $_POST['title'] . "', '" . $_POST['publisher'] . "',
                 '" . $path.$filename . "', '" . $_POST['details'] . "','".$today."',
                  '" . $_POST['timeLimit'] . "', NULL, '指定任务', '已发布', '0', NULL, '航路导航室党支部', NULL);";
        $conn->query($query);
        //更新任务记录中指派对象
        $query = "UPDATE `assignmission` SET `route` = '1' WHERE `assignmission`.`title` = '" . $_POST['title'] . "'";
        $conn->query($query);

        $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                  VALUES (NULL, '航路导航室党支部', '".$today."', '".$now."', '" . $_POST['title'] . "',
                   '指定任务', '已发布', '未处理');";
        $conn->query($query);
    }

    if (isset($_POST['power']) && $_POST['power'] == 'on'){
        $query = "INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`, 
                `details`, `publishTime`,`timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`, 
                `branch`, `submitter`) VALUES (NULL, '" . $_POST['title'] . "', '" . $_POST['publisher'] . "',
                 '" . $path.$filename . "', '" . $_POST['details'] . "','".$today."',
                  '" . $_POST['timeLimit'] . "', NULL, '指定任务', '已发布', '0', NULL, '供电室党支部', NULL);";
        $conn->query($query);
        //更新任务记录中指派对象
        $query = "UPDATE `assignmission` SET `power` = '1' WHERE `assignmission`.`title` = '" . $_POST['title'] . "'";
        $conn->query($query);

        $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                  VALUES (NULL, '供电室党支部', '".$today."', '".$now."', '" . $_POST['title'] . "',
                   '指定任务', '已发布', '未处理');";
        $conn->query($query);
    }

    if (isset($_POST['maintain']) && $_POST['maintain'] == 'on'){
        $query = "INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`, 
                `details`,`publishTime`, `timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`, 
                `branch`, `submitter`) VALUES (NULL, '" . $_POST['title'] . "', '" . $_POST['publisher'] . "',
                 '" . $path.$filename . "', '" . $_POST['details'] . "','".$today."',
                  '" . $_POST['timeLimit'] . "', NULL, '指定任务', '已发布', '0', NULL, '维修室党支部', NULL);";
        $conn->query($query);
        //更新任务记录中指派对象
        $query = "UPDATE `assignmission` SET `maintain` = '1' WHERE `assignmission`.`title` = '" . $_POST['title'] . "'";
        $conn->query($query);

        $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                  VALUES (NULL, '维修室党支部', '".$today."', '".$now."', '" . $_POST['title'] . "',
                   '指定任务', '已发布', '未处理');";
        $conn->query($query);
    }

    if (isset($_POST['motor']) && $_POST['motor'] == 'on'){
        $query = "INSERT INTO `missionlog` (`id`, `title`, `publisher`, `annix`, 
                `details`, `publishTime`,`timeLimit`, `finishTime`, `type`, `status`, `score`, `annixSubmit`, 
                `branch`, `submitter`) VALUES (NULL, '" . $_POST['title'] . "', '" . $_POST['publisher'] . "',
                 '" . $path.$filename . "', '" . $_POST['details'] . "','".$today."',
                  '" . $_POST['timeLimit'] . "', NULL, '指定任务', '已发布', '0', NULL, '现场车队党支部', NULL);";
        $conn->query($query);
        //更新任务记录中指派对象
        $query = "UPDATE `assignmission` SET `motor` = '1' WHERE `assignmission`.`title` = '" . $_POST['title'] . "'";
        $conn->query($query);

        $query = "INSERT INTO `msg` (`ID`, `branch`, `date`, `time`, `title`, `type`, `status`, `processing`) 
                  VALUES (NULL, '现场车队党支部', '".$today."', '".$now."', '" . $_POST['title'] . "',
                   '指定任务', '已发布', '未处理');";
        $conn->query($query);
    }

    $conn->close();

    echo "<script> window.location.href='../mission.php?type=指定任务';</script>";


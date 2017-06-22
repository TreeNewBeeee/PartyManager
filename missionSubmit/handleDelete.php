<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-06-20
 * Time: 19:32
 */
?>

<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $authorityCode = $_SESSION['authorityCode'];
} else {
    echo "<script>alert('先登陆。。。!');location.href='../index.php';</script>";
}

$type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取任务类型
$title = isset($_GET['title']) ? $_GET['title'] : NULL;    // 获取标题
$details = isset($_GET['details']) ? $_GET['details'] : NULL;    // 获取内容
//echo $type,$title,$details;
require_once '../db_login.php';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($conn->connect_error) die($conn->connect_error);
mysqli_set_charset($conn, 'utf8');

switch ($type){
    case '定期任务':
        /*删除任务*/
        $query = "DELETE FROM `fixedmission` WHERE `fixedmission`.`title` = '".$title."' AND `fixedmission`.`details` = '".$details."'";
        $conn->query($query);  // 删除任务
        /*删除记录*/
        $query = "DELETE FROM `missionlog` WHERE `missionlog`.`title` = '".$title."' AND `missionlog`.`details` = '".$details."'";
        $conn->query($query);  // 删除任务
        echo "<script> window.location.href='./MissionDelete.php?type=定期任务';</script>";
        break;
    case '抢接任务':
        /*删除任务*/
        $query = "DELETE FROM `rushmission` WHERE `rushmission`.`title` = '".$title."' AND `rushmission`.`details` = '".$details."'";
        $conn->query($query);  // 删除任务
        /*删除记录*/
        $query = "DELETE FROM `missionlog` WHERE `missionlog`.`title` = '".$title."' AND `missionlog`.`details` = '".$details."'";
        $conn->query($query);  // 删除任务
        echo "<script> window.location.href='../rush_mission.php?type=抢接任务';</script>";
        break;
    case '指定任务':
        /*删除任务*/
        $query = "DELETE FROM `assignmission` WHERE `assignmission`.`title` = '".$title."' AND `assignmission`.`details` = '".$details."'";
        $conn->query($query);  // 删除任务
        /*删除记录*/
        $query = "DELETE FROM `missionlog` WHERE `missionlog`.`title` = '".$title."' AND `missionlog`.`details` = '".$details."'";
        $conn->query($query);  // 删除任务
        echo "<script> window.location.href='./MissionDelete.php?type=指定任务';</script>";
        break;
    case '亮点工作':
        /*删除任务*/
        $query = "DELETE FROM `shiningmission` WHERE `shiningmission`.`title` = '".$title."' AND `shiningmission`.`details` = '".$details."'";
        $conn->query($query);  // 删除任务
        /*删除记录*/
        $query = "DELETE FROM `missionlog` WHERE `missionlog`.`title` = '".$title."' AND `missionlog`.`details` = '".$details."'";
        $conn->query($query);  // 删除任务
        echo "<script> window.location.href='./MissionDelete.php?type=亮点工作';</script>";
        break;
}

$conn->close();



?>

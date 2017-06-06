<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-05-21
 * Time: 12:35
 * Description: process the check box for msg
 * Upper Page: read.php
 */


session_start();

$username = $_SESSION['username'];
$authorityCode = $_SESSION['authorityCode'];
$branch = $_GET['branch'];
$title = $_GET['title'];
$type = $_GET['type'];
$status = $_GET['status'];

echo $branch,$title,$type,$status;

require_once './db_login.php';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($conn->connect_error) die($conn->connect_error);
mysqli_set_charset($conn, 'utf8');

$query = "UPDATE `msg` SET `processing` = '已处理' WHERE `branch` = '".$branch."' and `title` = '".$title."' and `type` = '".$type."' and `status` = '".$status."'";
$conn->query($query);
$conn->close();

echo "<script> location.href='newMSG.php?branch={$branch}';</script>";    // 返回页面


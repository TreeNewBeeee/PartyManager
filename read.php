<?php

/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-05-21
 * Time: 10:15
 * Description: 用于响应对已读新消息的处理。
 * Upper Page: newMSG.php
 */
session_start();

$username = $_SESSION['username'];
$authorityCode = $_SESSION['authorityCode'];
$branch = $_GET['branch'];
$title = $_GET['title'];
$type = $_GET['type'];
$status = $_GET['status'];
$ask = true;


if ($ask){
    echo "<script> 
                if(confirm( '是否确认处理？'))
                    location.href='confirm.php?branch={$branch}&title={$title}&type={$type}&status={$status}';
                else location.href='newMSG.php?branch={$branch}'; 
          </script>";
    $ask = false;
}else{
    echo "<script> location.href='newMSG.php?branch={$branch}'</script>";
}


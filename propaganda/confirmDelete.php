<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-12-02
 * Time: 22:44
 */
session_start();
$title = isset($_GET['title']) ? $_GET['title'] : NULL;
$type = isset($_GET['type']) ? $_GET['type'] : NULL;
$branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;
$confirm = isset($_GET['confirm']) ? $_GET['confirm'] : NULL;

if (($_SESSION['authorityCode'] == 20 and $_SESSION['branch'] == $_GET['branch']) or $_SESSION['authorityCode'] <= 1){


    if (is_null($confirm)){
        switch ($type){
            case '外媒':
                echo "<script> if(confirm( '是否确认删除外媒：{$title}'))  location.href='./confirmDelete.php?title={$title}&type={$type}&branch={$branch}&confirm=yes';else history.go(-1); </script>";
                break;
            case '内刊':
                echo "<script> if(confirm( '是否确认删除内刊：{$title}'))  location.href='./confirmDelete.php?title={$title}&type={$type}&branch={$branch}&confirm=yes';else history.go(-1); </script>";
                break;
            case '政务信息':
                echo "<script> if(confirm( '是否确认删除政务信息：{$title}'))  location.href='./confirmDelete.php?title={$title}&type={$type}&branch={$branch}&confirm=yes';else history.go(-1); </script>";
                break;
            case '工会':
                echo "<script> if(confirm( '是否确认删除工会报道：{$title}'))  location.href='./confirmDelete.php?title={$title}&type={$type}&branch={$branch}&confirm=yes';else history.go(-1); </script>";
                break;
        }
    }else{
//    echo 'DELETE';
        echo $type,$title,$branch;
        require_once '../db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "DELETE FROM `propaganda` WHERE `type`='".$type."' AND `title`='".$title."' AND `branch`='".$branch."'";
        $conn->query($query);
        $conn->close();
        switch ($type){
            case '外媒':
                echo "<script> window.location.href='./outPropaganda.php';</script>";
                break;
            case '内刊':
                echo "<script> window.location.href='./inPropaganda.php';</script>";
                break;
            case '政务信息':
                echo "<script> window.location.href='./affairsInfo.php';</script>";
                break;
            case '工会':
                echo "<script> window.location.href='./union.php';</script>";
                break;
        }


    }
}else{
    echo "<script>alert('您没有权限执行该操作!');history.go(-1);</script>";
    // TODO: 没有删除权限
    /*switch ($type){
        case '外媒':
            echo "<script>alert('您没有权限执行该操作!');history.go(-1);</script>";
            break;
        case '内刊':
            break;
        case '政务信息':
            break;
        case '工会':
            break;
    }*/

}



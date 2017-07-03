<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-07-02
 * Time: 23:22
 */
    $path = "../Files/".date("Y")."/".date("m")."/Propaganda/";
    if (!is_dir($path)){
        mkdir($path,0777,true);
    }
    if ($_FILES['file']['name'] != '') {
        $filename = "JB-新闻宣传-".date("Y-m")."-".$_FILES['file']['name'];    // 重命名文件
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

if (isset($_POST['type'])){
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        $branch = isset($_POST['branch']) ? $_POST['branch'] : null;
        $publisher = isset($_POST['publisher']) ? $_POST['publisher'] : null;
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $magazing = isset($_POST['magazing']) ? $_POST['magazing'] : null;
        $grapher = isset($_POST['grapher']) ? $_POST['grapher'] : null;
        $writter = isset($_POST['writter']) ? $_POST['writter'] : null;
        $length = isset($_POST['length']) ? $_POST['length'] : null;
        $publishTime = isset($_POST['publishTime']) ? $_POST['publishTime'] : null;
        $file = isset($_POST['file']) ? $_POST['file'] : null;

        require_once '../db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        switch ($type){
            case '外媒':
                $query = "INSERT INTO `propaganda`(`id`, `branch`, `publisher`, `title`, `magzing`,
                          `grapher`, `writter`, `length`, `publishTime`, `file`, `type`, `year`) 
                          VALUES (NULL ,'".$branch."' ,'".$publisher."','".$title."','".$magazing."','".$grapher."',
                          '".$writter."','".$length."','".$publishTime."','".$path.$filename."','".$type."', '".date("Y")."')";
                $conn->query($query);
                echo "<script> window.location.href='./outPropaganda.php';</script>";
                break;
            case '内刊':
                $query = "INSERT INTO `propaganda`(`id`, `branch`, `publisher`, `title`, `magzing`,
                          `grapher`, `writter`, `length`, `publishTime`, `type`, `year`) 
                          VALUES (NULL ,'".$branch."' ,'".$publisher."','".$title."','".$magazing."','".$grapher."',
                          '".$writter."','".$length."','".$publishTime."','".$type."', '".date("Y")."')";
                $conn->query($query);
                echo "<script> window.location.href='./inPropaganda.php';</script>";
                break;
            case '工会':
                $query = "INSERT INTO `propaganda`(`id`, `branch`, `publisher`, `title`, `magzing`,
                          `grapher`, `writter`, `length`, `publishTime`, `file`, `type`, `year`) 
                          VALUES (NULL ,'".$branch."' ,'".$publisher."','".$title."','".$magazing."','".$grapher."',
                          '".$writter."','".$length."','".$publishTime."','".$path.$filename."','".$type."', '".date("Y")."')";
                $conn->query($query);
                echo "<script> window.location.href='./union.php';</script>";
                break;
            case '政务信息':
                $query = "INSERT INTO `propaganda`(`id`, `branch`, `publisher`, `title`, `magzing`,
                          `writter`, `publishTime`, `file`, `type`, `year`) 
                          VALUES (NULL ,'".$branch."' ,'".$publisher."','".$title."','".$magazing."',
                          '".$writter."','".$publishTime."','".$path.$filename."','".$type."', '".date("Y")."')";
                $conn->query($query);
                echo "<script> window.location.href='./affairsInfo.php';</script>";
                break;

        }

        $conn->close();
    }

?>
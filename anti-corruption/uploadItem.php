<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-10-15
 * Time: 23:48
 */


$path = "../Files/".date("Y")."/".date("m")."/anti-corruption/";
if (!is_dir($path)){
    mkdir($path,0777,true);
}                         // 以年/月/类别为路径存储，如果不存在该路径则创建

if ($_FILES['file']['name'] != '') {
    $filename = "JB-Anti-".date("Y-m")."-".$_FILES['file']['name'];    // 重命名文件
    if ($_FILES['file']['error'] > 0) {
        echo "错误状态：" . $_FILES['file']['error'];
    } else {
        if (file_exists($path . $_FILES["file"]["name"])) {  // 该文件已存在
//            echo $_FILES["file"]["name"] . " already exists. ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],                // 上传文件
                $path . iconv('utf-8', 'gb2312', $filename));
//            echo "文件保存在: " . "/Files/" . $_FILES["file"]["name"] . " Kb<br />";
//            echo "类型: " . $_FILES["file"]["type"] . "<br />";
//            echo "大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "<script>alert('创建成功！');</script>";
        }


    }
} else {
//    echo "<script>alert('请上传文件！');</script>";
}


require_once '../db_login.php';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($conn->connect_error) die($conn->connect_error);
mysqli_set_charset($conn, 'utf8');
//$today = date("Y-m-d");
//$now = date("H:i:s");

//    echo $_POST['title'],$_GET['type'],$path.$filename;

$query = "INSERT INTO `anticorruption` (`id`, `name`, `type`, `file`) VALUES (NULL, '".$_POST['title']."', '".$_GET['type']."','".$path.$filename."')";
$conn->query($query);


$conn->close();
switch ($_GET['type']){
    case '案例学习':
        echo "<script> window.location.href='./caseStudy.php';</script>";
        break;
    case '法规学习':
        echo "<script> window.location.href='./lawStudy.php';</script>";
        break;
    case '小微采购':
        echo "<script> window.location.href='./purchase.php';</script>";
        break;
}


?>

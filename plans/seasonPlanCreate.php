<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-06-12
 * Time: 16:30
 */
?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
    <?php session_start(); ?>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link href="../css/bootstrap.css" rel="stylesheet">
        	        	<style type="text/css">

        	</style>
        <title></title>
    </head>

    <body>
    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
    }

    $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位

    ?>

    <div class="container">


        <div class="row">

            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <h2>新增季度总结-<?php echo $branch?></h2>
                    <hr/>
                </div>

            </div>

            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="year">年份</label>
                                    <input type="text" class="form-control" id="year" name="year" placeholder="请填写四位年份如：<?php echo date("Y") ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="season">季度</label>
                                    <div class="form-group">
                                        <select class="form-control" id="season" name="season">
                                            <option value="1">一季度</option>
                                            <option value="2">二季度</option>
                                            <option value="3">三季度</option>
                                            <option value="4">四季度</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="file">选择文件</label>
                            <input type="file" id="file" name="file">

                        </div>


                        <button type="submit" class="btn btn-default">上传</button>
                    </form>
                </div>


            </div>


        </div>


    </div>

    </body>
    </html>


<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-04-27
 * Time: 01:11
 */
// TODO：未添加权限 未判断是否已经上传
$path = "../Files/".date("Y")."/".date("m")."/SeasonSummary/";   // 文件存储路径
if (!is_dir($path)){
    mkdir($path,0777,true);
}                         // 以年/月/类别为路径存储，如果不存在该路径则创建

if (isset($_POST['year'])){
    // 上传文件
    if ($_FILES['file']['name'] != '') {
        $filename = "JB-SeasonSummary-".date("Y-m")."-".$branch."-".$_FILES['file']['name'];    // 重命名文件
        if ($_FILES['file']['error'] > 0) {
            echo "错误状态：" . $_FILES['file']['error'];
        } else {
            if (file_exists($path . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " 已经存在. ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    $path . iconv('utf-8', 'gb2312', $filename));
//                echo "文件保存在: " . "/Files/" . $_FILES["file"]["name"] . " <br />";
//                echo "类型: " . $_FILES["file"]["type"] . "<br />";
//                echo "大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//                echo "<script>alert('上传成功！');</script>";
            }


        }
    } else {
//        echo "<script>alert('请上传文件！');</script>";
    }

    // 更新数据库
    require_once '../db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');

    $query = "INSERT INTO `plans` (`ID`,`branch`, `year`, `month`, `season`, `fileName`, `type`) 
                  VALUES 
                  (NULL, '".$branch."', '".$_POST['year']."', NULL , '".$_POST['season']."', '".$path.$filename."', '季度总结')";
    $conn->query($query);
    $conn->close();

    echo <<<JUMP
            <script language="JavaScript">
                   alert("上传成功");
                   self.location='seasonPlanTable.php?branch={$branch}';     
            </script>
JUMP;

}


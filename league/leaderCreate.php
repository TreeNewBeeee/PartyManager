<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-07-11
 * Time: 22:09
 */
?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
    <?php session_start(); ?>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../layui/css/layui.css"/>
        	
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>	
        <script src="../js/jquery-1.7.1.js"></script>
        <script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
        	
        <title></title>
            <style type="text/css">

	.d-info{
		margin-top: 10px;
		width: 400px;
	}
		.d-info .fo-item{
			width: 100%;
		}
		.d-info .info-sub{
			margin-top: 20px;
		}
		.new-form{
			width: 400px;
		}
.fo-item label{
	width: 130px;
}
    </style>
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
	<div class="new-wrap">
		<div class="top-title">
			<p>
				<span class="icon-comm">增</span>
				<span class="top-t">新增支委会开展情况-<?php echo $branch?></span>
			</p>
		</div>
    <div id="container">
        <div id="content">
            <div class="row">

                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data" class="layui-form new-form clearfix">
                    	<div class="d-info clearfix">
                        <div class="fo-item">                        	
                             <label for="year" class="layui-form-label">年份</label>
                             <div class="layui-input-inline">
                             	
                              <input type="text" class="layui-input" id="year" name="year" placeholder="请填写四位年份如：<?php echo date("Y") ?>">
                             </div>
                        </div>

                        <div class="fo-item">
                                    <label for="month" class="layui-form-label">月份</label>
                        							<div class="layui-input-inline">
							<select name="month" id="month">
                                                                                    <option value="1">一月</option>
                                            <option value="2">二月</option>
                                            <option value="3">三月</option>
                                            <option value="4">四月</option>
                                            <option value="5">五月</option>
                                            <option value="6">六月</option>
                                            <option value="7">七月</option>
                                            <option value="8">八月</option>
                                            <option value="9">九月</option>
                                            <option value="10">十月</option>
                                            <option value="11">十一月</option>
                                            <option value="12">十二月</option>
                                        </select>
						</div>
                        </div>
                        <div class="fo-item">
                            <label for="file" class="layui-form-label">选择文件</label>
                             <div class="layui-input-inline">
                            <input type="file" id="file" name="file">
                            </div>

                        </div>

             <div class="info-sub">
					<input type="submit" value="新增"  name="submit"/>
				</div>
            </div>

                        </div>
                    </form>
                </div>


            </div>


        </div>


    </div>
    </div>

    </body>
    <script type="text/javascript">
			layui.use("form",function(){
        var $ = layui.jquery, form = layui.form();
        var laydate = layui.laydate;

	form.on("checkbox",function(data){
		data.elem.checked=!data.elem.checked;
	})
	var start = {
            istoday: false,
            choose: function (datas) {
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            },
            format: 'YYYY/MM/DD', //日期格式
        };
        var end = {
            istoday: false,
            choose: function (datas) {
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        		$(".inp-date").click(function(){
			start.elem=this;
			laydate(start);
		})
	})
</script>
    </html>


<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-04-27
 * Time: 01:11
 */
// TODO：未添加权限 未判断是否已经上传
$path = "../Files/".date("Y")."/".date("m")."/League/LeaderMeeting/";   // 文件存储路径
if (!is_dir($path)){
    mkdir($path,0777,true);
}                         // 以年/月/类别为路径存储，如果不存在该路径则创建

if (isset($_POST['year'])){
    // 上传文件
    if ($_FILES['file']['name'] != '') {
        $filename = "JB-LeaderMeeting-".date("Y-m")."-".$branch."-".$_FILES['file']['name'];    // 重命名文件
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
                  (NULL, '".$branch."', '".$_POST['year']."', '".$_POST['month']."' , null, '".$path.$filename."', '支委会')";
    $conn->query($query);
    $conn->close();

    echo <<<JUMP
            <script language="JavaScript">
                   alert("上传成功");
                   self.location='leaderTable.php?branch={$branch}';     
            </script>
JUMP;

}




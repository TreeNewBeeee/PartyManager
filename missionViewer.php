<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/bootstrap-treeview.min.js"></script>

    <style type="text/css">


    </style>

</head>

<body>

<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $authorityCode = $_SESSION['authorityCode'];
} else {
    echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
}

$title = isset($_GET['title']) ? $_GET['title'] : NULL;    // 获取任务名称
$branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取支部名称

require_once './db_login.php';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($conn->connect_error) die($conn->connect_error);
mysqli_set_charset($conn, 'utf8');

$query = "SELECT * FROM `missionlog` WHERE `title`='" . $title . "' AND `branch`='" . $branch . "' ";
$result = $conn->query($query);
if (!$result) die($conn->connect_error);
$rows = $result->fetch_array();

?>
<div class="new-wrap">
    <div class="top-title">
        <p class="no-marT">
            <span class="icon-comm">查</span>
            <span class="top-t">查看任务</span>
        </p>
    </div>

    <div id="content" class="member">
        <form action="scoreTheMission.php?title=<?php echo $rows['title'] ?>&branch=<?php echo $branch ?>&type=<?php echo $rows['type'] ?>"
              method="post" class="layui-form new-form clearfix">
            <table class="table table-type-1 table-type-2">
                <tbody class="view-task">
                <tr class="no-topB">
                    <th width="10%">发布人</th>
                    <td><?php echo $rows['publisher'] ?></td>
                </tr>
                <tr>
                    <th width="10%">任务名称</th>
                    <td><?php echo $rows['title'] ?></td>
                </tr>
                <tr>
                    <th width="10%">相关文件</th>
                    <td>
                        <a href="./Files/<?php echo iconv('UTF-8//IGNORE', 'UTF-8//IGNORE', $rows['annix']) ?>"><?php echo $rows['annix'] ?></a>
                    </td>
                </tr>
                <tr>
                    <th width="10%">任务内容</th>
                    <td>
                        <div class="view-con">
                            <?php echo $rows['details'] ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th width="10%">完成时限</th>
                    <td><?php echo $rows['timeLimit'] ?></td>
                </tr>
                <tr>
                    <th width="10%">查看附件</th>
                    <td><a href="./Files/<?php echo iconv('UTF-8//IGNORE', 'UTF-8//IGNORE', $rows['annixSubmit']) ?>">浏览支部上传附件</a>
                    </td>
                </tr>

                <?php
                if (($rows['status'] == '已上传' or $rows['status'] == '已打分') && $_SESSION['authorityCode'] <= 1) {
                    /*echo <<<SCORE
							<div class="layui-input-inline score-list" style="margin-top:10px;">
									得分：<span class="score">{$rows['score']}</span>
                            </div>
                            <div class="checkbox check-item clearfix">
                                <input type="checkbox" lay-skin="primary" title="驳回" class="check-callback">
                                	<button class="button zhibubtn float-r" type="submit">党委秘书赋分</button>
                            </div>
                                  
SCORE;*/
                    echo <<<SCORE
							<div class="layui-input-inline score-list" style="margin-top:10px;">
									完整性得分：<span class="score"><input type="text" name="score_1" value={$rows['score_1']}></span><br><br>
									创新性得分：<span class="score"><input type="text" name="score_2" value={$rows['score_2']}></span><br><br>
									推广性得分：<span class="score"><input type="text" name="score_3" value={$rows['score_3']}></span>
                            </div>
                            <div class="checkbox check-item clearfix">
                                <input type="checkbox" lay-skin="primary" title="驳回" class="check-callback" name="deny">
                                <input type="hidden" name="flag" value="1">
                                	<button class="button zhibubtn float-r" type="submit">党委秘书赋分</button>
                            </div>
                                  
SCORE;

                }


                $result->close();
                $conn->close();
                ?>


            </table>
        </form>


        <?php
        require_once './db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "SELECT * FROM `person` WHERE `name`='" . $username . "' AND `branch`='" . $branch . "' ";
        $result = $conn->query($query);
        if (!$result) die($conn->connect_error);
        $person = $result->fetch_array();

        if ($rows['status'] == '已发布' && $person['authorityCode'] <= 20) {

            echo <<<UPDATE
                    <form action="updateFile.php?title={$title}&branch={$branch}&type={$rows['type']}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12">

                                <div class="box upload">
                                	<div class="upload-title">上传附件：</div>
                                    <input type="file" name="file" id="file"/>
            						<button class="button zhibubtn" type="submit">支部上传</button>
                                </div>
                                <input type="hidden" name="flag" value="update"/>
                            </div>
                            <div class="col-xs-12 zhibubt">
                                
                            </div>
            
                    </form>

UPDATE;

        }

        $result->close();
        $conn->close();
        ?>
        </tbody>
    </div>

</div>

</body>
<script type="text/javascript">
    layui.use("form", function () {
        var $ = layui.jquery, form = layui.form();
        var laydate = layui.laydate;
        form.on("checkbox", function (data) {
//		data.elem.checked=!data.elem.checked;
        })
    })
</script>
</html>
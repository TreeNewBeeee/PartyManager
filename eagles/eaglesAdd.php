<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-09-12
 * Time: 14:59
 */

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>

<html>
<head>
    <title></title>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="stylesheet" type="text/css" href="../layui/css/layui.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="../layui/lay/modules/laydate.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/bootstrap-treeview.min.js"></script>

    <style type="text/css">

        .d-info {
            margin-top: 10px;
            width: 400px;
        }

        .d-info .fo-item {
            width: 100%;
        }

        .d-info .info-sub {
            margin-top: 20px;
        }

        .new-form {
            width: 400px;
        }

    </style>

</head>

<body>
<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $authorityCode = $_SESSION['authorityCode'];
    $type = isset($_GET['type']) ? $_GET['type'] : null;
} else {
    echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
}

?>
<div class="new-wrap">
    <div class="top-title">
        <p>
            <span class="icon-comm">增</span>
            <span class="top-t">新增-<?php echo $type ?></span>
        </p>
    </div>

    <div id="content">
        <form action="#" method="post" enctype="multipart/form-data" class="layui-form new-form clearfix">
            <div class="d-info clearfix">
                <div class="fo-item">
                    <label for="name" class="layui-form-label">姓名</label>
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input" name="name">
                    </div>
                </div>
                <div class="fo-item">
                    <label for="year" class="layui-form-label">年度</label>
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input" name="year">
                    </div>
                </div>
                <?php
                switch ($type) {
                    case '翔鹰':
                        echo <<<PRINT
                                <div class="fo-item">
                                    <label for="dim1" class="layui-form-label">内驱力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim1">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim2" class="layui-form-label">凝聚力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim2">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim3" class="layui-form-label">开拓力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim3">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim4" class="layui-form-label">掌控力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim4">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim5" class="layui-form-label">决策力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim5">
                                    </div>
                                </div>
PRINT;

                        break;
                    case '精鹰':
                        echo <<<PRINT
                                <div class="fo-item">
                                    <label for="dim1" class="layui-form-label">专业力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim1">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim2" class="layui-form-label">开拓力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim2">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim3" class="layui-form-label">主动力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim3">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim4" class="layui-form-label">培训力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim4">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim5" class="layui-form-label">贡献力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim5">
                                    </div>
                                </div>
PRINT;
                        break;
                    case '雏鹰':
                        echo <<<PRINT
                                <div class="fo-item">
                                    <label for="dim1" class="layui-form-label">内驱力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim1">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim2" class="layui-form-label">专业力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim2">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim3" class="layui-form-label">开拓力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim3">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim4" class="layui-form-label">主动力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim4">
                                    </div>
                                </div>
                                <div class="fo-item">
                                    <label for="dim5" class="layui-form-label">执行力</label>
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="dim5">
                                    </div>
                                </div>
PRINT;
                        break;
                }

                ?>


            </div>
            <div class="info-sub">
                <input type="submit" value="添加" name="submit"/>
            </div>
        </form>
    </div>

</div>

<?php
if (isset($_POST['name'])) {
    require_once '../db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');

    $sum = $_POST['dim1'] + $_POST['dim2'] + $_POST['dim3'] + $_POST['dim4'] + $_POST['dim5'];  // 原始总分
    $ideal = 5 * 100 * 100 * cos(2 * M_PI / 5) / 2;    // 理想总和
    $weight = 100 / max($_POST['dim1'], $_POST['dim2'], $_POST['dim3'], $_POST['dim4'], $_POST['dim5']);  // 归一化参数
    $dim1 = $_POST['dim1'] * $weight;
    $dim2 = $_POST['dim2'] * $weight;
    $dim3 = $_POST['dim3'] * $weight;
    $dim4 = $_POST['dim4'] * $weight;
    $dim5 = $_POST['dim5'] * $weight;   // 归一化

    $aera1 = $dim1 * $dim2 * cos(2 * M_PI / 5) / 2;
    $aera2 = $dim2 * $dim3 * cos(2 * M_PI / 5) / 2;
    $aera3 = $dim3 * $dim4 * cos(2 * M_PI / 5) / 2;
    $aera4 = $dim4 * $dim5 * cos(2 * M_PI / 5) / 2;
    $aera5 = $dim5 * $dim1 * cos(2 * M_PI / 5) / 2;   // 分面积

    $actAera = $aera1 + $aera2 + $aera3 + $aera4 + $aera5;
    $simillar = $actAera/$ideal;
    $finalScore = $sum*$simillar;

    $query = "INSERT INTO `eagles`(`ID`, `name`, `year`, `type`, 
                      `dim1`, `dim2`, `dim3`, `dim4`, `dim5`, `similarization`, `total`)
                       VALUES (NULL ,'" . $_POST['name'] . "','" . $_POST['year'] . "','" . $type . "',
                       '" . $_POST['dim1'] . "','" . $_POST['dim2'] . "','" . $_POST['dim3'] . "',
                       '" . $_POST['dim4'] . "','" . $_POST['dim5'] . "','".$simillar."','".$finalScore."')";

    $conn->query($query);
    $conn->close();

    echo "<script> window.location.href='./pickup.php?type={$type}';</script>";
}
?>

</body>
<script type="text/javascript">
    layui.use("form", function () {
        var $ = layui.jquery, form = layui.form();
        var laydate = layui.laydate;

        form.on("checkbox", function (data) {
            data.elem.checked = !data.elem.checked;
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
        $(".inp-date").click(function () {
            start.elem = this;
            laydate(start);
        })
    })
</script>
</html>


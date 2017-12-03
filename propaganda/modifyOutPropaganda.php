<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-12-03
 * Time: 00:10
 */
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <!-- Required Javascript -->
    <script src="../js/jquery-1.7.1.js"></script>
    <script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/bootstrap-treeview.min.js"></script>

    <style type="text/css">

        .d-info {
            margin-top: 10px;
            width: 420px;
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

        .fo-item label {
            min-width: 120px;
        }
    </style>
</head>

<body>
<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $authorityCode = $_SESSION['authorityCode'];
    $type = isset($_GET['type']) ? $_GET['type'] : null;
    $title = isset($_GET['title']) ? $_GET['title'] : null;
    $branch = isset($_GET['branch']) ? $_GET['branch'] : null;

//    echo $type,$branch;
} else {
    echo "<script>alert('先登陆。。。!');location.href='../index.php';</script>";
}

?>
<div class="new-wrap">
    <div class="top-title">
        <p>
            <span class="icon-comm">改</span>
            <span class="top-t">修改-上传页</span>
        </p>
    </div>

    <div id="container">
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="./submitPropaganda.php" method="post" enctype="multipart/form-data"
                          class="layui-form new-form clearfix">
                        <div class="d-info clearfix">
                            <div class="fo-item">
                                <label for="publisher" class="layui-form-label">发布人</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="publisher" class="layui-input" id="publisher"
                                           value="<?php echo $username ?>"
                                           readonly="readonly">
                                </div>
                            </div>

                            <div class="fo-item">
                                <label for="title" class="layui-form-label">新闻标题</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" id="title" name="title" readonly="readonly" value="<?php echo $title ?>">
                                </div>
                            </div>

                            <div class="fo-item">
                                <label for="custom" class="layui-form-label">自定义发表刊物</label>
                                <div class="layui-input-inline">
                                    <input type="checkbox" name="custom" id="custom" lay-filter="thisChoose">
                                </div>
                            </div>

                            <div class="fo-item" id="outpro_1">
                                <label for="popmagazing" class="layui-form-label">发表刊物</label>
                                <div class="layui-input-inline">
                                    <select type="text" name="popmagazing" id="popmagzing">
                                        <option value="">请选择</option>
                                        <?php
                                        require_once '../db_login.php';
                                        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                                        if ($conn->connect_error) die($conn->connect_error);
                                        mysqli_set_charset($conn, 'utf8');

                                        $query = "SELECT * FROM `magzingtype` WHERE 1";
                                        $result = $conn->query($query);
                                        while ($row = $result->fetch_array()) {
                                            echo <<<OPTIONS
                                                <option value="{$row['name']}">{$row['name']}</option>
OPTIONS;

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="fo-item" id="outpro_2" style="display: none;">
                                <label for="inputmagzing" class="layui-form-label">发表刊物</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="inputmagzing" class="layui-input" id="inputmagzing">
                                </div>
                            </div>

                            <div class="fo-item" id="influence" style="display: none;">
                                <label for="popinflurence" class="layui-form-label">刊物影响</label>
                                <div class="layui-input-inline">
                                    <select type="text" name="influrence" id="popinflurence">
                                        <option value="影响力巨大">影响力巨大</option>
                                        <option value="有重要影响力">有重要影响力</option>
                                        <option value="有影响力">有影响力</option>
                                        <option value="重要行业媒体">重要行业媒体</option>
                                    </select>
                                </div>
                            </div>

                            <div class="fo-item">
                                <label for="grapher" class="layui-form-label">图作者</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" name="grapher" id="grapher">
                                </div>
                            </div>

                            <div class="fo-item">
                                <label for="writter" class="layui-form-label">文章作者</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" name="writter" id="writter">
                                </div>
                            </div>

                            <div class="fo-item">
                                <label for="length" class="layui-form-label">字数</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" name="length" id="length">
                                </div>
                            </div>

                            <div class="fo-item">
                                <label for="" class="layui-form-label">刊登时间</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input inp-date" name="publishTime">
                                </div>
                            </div>

                            <div class="fo-item">
                                <label for="file" class="layui-form-label">选择文件</label>
                                <div class="layui-input-inline">
                                    <input type="file" id="file" name="file">
                                </div>

                            </div>


                            <input type="hidden" name="type" value="<?php echo $type ?>"/>
                            <input type="hidden" name="branch" value="<?php echo $branch ?>"/>
                            <input type="hidden" name="ope" value="修改"/>


                            <div class="info-sub">
                                <input type="submit" value="修改" name="submit"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

</body>


<script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
<script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="../layui/lay/modules/laydate.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    layui.use("form", function () {
        var $ = layui.jquery, form = layui.form();
        var laydate = layui.laydate;

        form.on("checkbox", function (data) {
            data.elem.checked = !data.elem.checked;
        })
        form.on('checkbox(thisChoose)', function (data) {
            data.elem.checked = !data.elem.checked;
//      	console.log($(this).is(":checked")
            if ($(this).is(":checked")) {
                $("#outpro_1").hide();
                $("#outpro_2").show();
                $("#influence").show()
            } else {
                $("#outpro_1").show();
                $("#outpro_2").hide();
                $("#influence").hide()
            }
        })
        var start = {
            istoday: false,
            choose: function (datas) {
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            istoday: false,
            choose: function (datas) {
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
//
//      document.getElementById('stardatd').onclick = function () {
//          start.elem = this;
//          laydate(start);
//      }
        $(".inp-date").click(function () {
            start.elem = this;
            laydate(start);
        })

    })
</script>
</html>


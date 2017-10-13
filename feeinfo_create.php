<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>

    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">

    </style>
</head>

<body>
<div class="new-wrap">
    <div class="top-title">
        <p>
            <span class="icon-comm">录</span>
            <span class="top-t">信息录入</span>
        </p>
    </div>
    <div id="container" class="new-martop">
        <div id="content">
            <div class="row">
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                } else {
                    echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";

                }
                $branch = $_GET['branch'];

                ?>

                <form action="" method="post" class="layui-form new-form">
                    <div class="d-info clearfix">
                        <div class="fo-item">
                            <label for="" class="layui-form-label">姓名</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="name">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">党支部名称</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="branch"
                                       placeholder="<?php echo $branch ?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">工资基数</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="base">
                            </div>
                        </div>
                        <!--<div class="fo-item">
                                <label for="" class="layui-form-label">时缴</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="paid">
                            </div>
                        </div>-->
                        <div class="fo-item">
                            <label for="" class="layui-form-label">缴费年</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="payYear" value="<?php echo date("Y")?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">缴费月</label>
                            <div class="layui-input-inline">
                                <select name="payMonth">
                                    <option value="01" selected="selected">1月</option>
                                    <option value="02">2月</option>
                                    <option value="03">3月</option>
                                    <option value="04">4月</option>
                                    <option value="05">5月</option>
                                    <option value="06">6月</option>
                                    <option value="07">7月</option>
                                    <option value="08">8月</option>
                                    <option value="09">9月</option>
                                    <option value="10">10月</option>
                                    <option value="11">11月</option>
                                    <option value="12">12月</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="info-sub">
                        <input type="submit" value="提交"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php

    //    if (!empty($_POST['school'])) {echo 'hahahahahahah';} else {echo 'yoyoyoyoyoyo';};

    $name = isset($_POST['name']) ? $_POST['name'] : NULL;
    $base = isset($_POST['base']) ? $_POST['base'] : NULL;
//    $paid = isset($_POST['paid']) ? $_POST['paid'] : NULL;
    $payYear = isset($_POST['payYear']) ? $_POST['payYear'] : NULL;
    $payMonth = isset($_POST['payMonth']) ? $_POST['payMonth'] : NULL;
    //$type = !empty($_POST['type'])?$_POST['type']:null;


    if (isset($name)) {
        require_once 'db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        if ($base <= 3000){
            $request = $base * 0.005;
        }elseif ($base <= 5000){
            $request = $base * 0.01;
        }elseif ($base <= 10000){
            $request = $base * 0.015;
        }else{
            $request = $base * 0.02;
        }

        $query = "INSERT INTO `payment` (`id`, `name`, `branch`, `base`, `request`, `paid`, `pay_year`, `pay_month`, `remark`) VALUES (NULL, '" . $name . "', 
        '" . $branch . "', '" . $base . "', '" . number_format("$request",2) . "',0, '" . $payYear . "','" . $payMonth . "','".$payYear."年".$payMonth."月')";
        $conn->query($query);
        $conn->close();
        echo "<script> window.location.href='./feeinfo_new.php?branch={$branch}';</script>";
    }



    ?>
</div>
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


    })
</script>
</html>
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
    <script language="javascript">
        function setFlag()
        {
            // $("#base").val("abcde"); // 赋值
            $("#flag").val("1");        // 已选择标志位设置为1
            var val = $("#name").val(); // 获取选择党员姓名
            var url = "feeinfo_create.php";
            url += "?selectedName="+val+"&branch="+$("#branch").val()+"&flag=1";
            var obj = document.getElementById("name");
            location.href = url;        // 刷新页面

        }
    </script>

    <style type="text/css">

    </style>
</head>

<body>
<div class="new-wrap">
    <div class="top-title">
        <p>
            <span class="icon-comm">录</span>
            <span class="top-t">信息录入 党费基数 = 岗位工资 + 1/3岗位工资 + 年功工资 - 税金 – 住房公积金 - 养老保险金 - 医疗保险 - 失业保险 - 大病保险 - 补扣款项</span>
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
                require_once './db_login.php';
                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                if ($conn->connect_error) die($conn->connect_error);
                mysqli_set_charset($conn, 'utf8');

                $query = "SELECT * FROM `person` WHERE `branch`='".$branch."' AND `type`='党员'";
                $result = $conn->query($query);
                $i = 0;
                $member = [];
                while ($row = $result->fetch_array()){
                    $member[$i] = $row['name'];                  // 获取支部全部党员姓名
                    $i++;
                }
//                var_dump($member);
                $result->close();

                if (isset($_GET['flag'])){
                    if ($_GET['flag'] == 1){
                        $query = "SELECT * FROM `payment` WHERE `name` = '".$_GET['selectedName']."'
                                    and `branch` = '".$branch."' ORDER BY `payment`.`id` DESC";
                        $result = $conn->query($query);
                        $lastPayment = $result->fetch_array();
                    }

                }
                ?>

                <form action="" method="post" class="new-form">
                    <div class="d-info clearfix">
                        <!--<div class="fo-item">
                            <label for="" class="layui-form-label">姓名</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="name">
                            </div>
                        </div>-->

                        <div class="fo-item">
                            <label for="" class="layui-form-label">姓名</label>
                            <div class="layui-input-inline">
                                <select name="name" id="name" onchange="javascript:setFlag()" title="">
                                    <option value="">请选择党员</option>
                                    <?php
                                    for ($j = 0;$j < sizeof($member); $j++){
                                        if ($_GET['flag'] == 1){
                                            if ($member[$j] == $_GET['selectedName']){
                                                echo <<<NAME
                            <option value="{$member[$j]}" selected="selected">{$member[$j]}</option>
NAME;
                                            }else{
                                                echo <<<NAME
                            <option value="{$member[$j]}">{$member[$j]}</option>
NAME;
                                            }
                                        }else{
                                            echo <<<NAME
                            <option value="{$member[$j]}">{$member[$j]}</option>
NAME;
                                        }


                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="fo-item">
                            <label for="" class="layui-form-label">党支部名称</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="branch" id="branch"
                                       value="<?php echo $branch ?>" readonly="readonly">
                            </div>
                        </div>
                        <!--<div class="fo-item">
                            <label for="" class="layui-form-label">工资基数</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="base" id="base">
                            </div>
                        </div>-->
                        <!--==================================-->
                        <div class="fo-item">
                            <label for="" class="layui-form-label">岗位工资</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="posiFee" value="<?php echo isset($lastPayment['posiFee']) ? $lastPayment['posiFee'] : null?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">年功工资</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="yearFee" value="<?php echo isset($lastPayment['yearFee']) ? $lastPayment['yearFee'] : null?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">应缴税金</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="tax" value="<?php echo isset($lastPayment['tax']) ? $lastPayment['tax'] : null?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">住房公积金</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="houseFund" value="<?php echo isset($lastPayment['houseFund']) ? $lastPayment['houseFund'] : null?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">养老保险</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="pension" value="<?php echo isset($lastPayment['pension']) ? $lastPayment['pension'] : null?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">医疗保险</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="medic" value="<?php echo isset($lastPayment['medic']) ? $lastPayment['medic'] : null?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">失业保险</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="unemploy" value="<?php echo isset($lastPayment['unemploy']) ? $lastPayment['unemploy'] : null?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">大病医疗</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="illness" value="<?php echo isset($lastPayment['illness']) ? $lastPayment['illness'] : null?>">
                            </div>
                        </div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">补扣款项</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="addition" value="<?php echo isset($lastPayment['addition']) ? $lastPayment['addition'] : null?>">
                            </div>
                        </div>

                        <!--==================================-->
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

                        <input type="hidden" class="layui-input" name="flag" id="flag" value="0">
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
//    $base = isset($_POST['base']) ? $_POST['base'] : NULL;
//    $paid = isset($_POST['paid']) ? $_POST['paid'] : NULL;
    $posiFee = isset($_POST['posiFee']) ? $_POST['posiFee'] : NULL;
    $yearFee = isset($_POST['yearFee']) ? $_POST['yearFee'] : NULL;
    $tax = isset($_POST['tax']) ? $_POST['tax'] : NULL;
    $houseFund = isset($_POST['houseFund']) ? $_POST['houseFund'] : NULL;
    $pension = isset($_POST['pension']) ? $_POST['pension'] : NULL;
    $medic = isset($_POST['medic']) ? $_POST['medic'] : NULL;
    $unemploy = isset($_POST['unemploy']) ? $_POST['unemploy'] : NULL;
    $illness = isset($_POST['illness']) ? $_POST['illness'] : NULL;
    $addition = isset($_POST['addition']) ? $_POST['addition'] : NULL;
    $payYear = isset($_POST['payYear']) ? $_POST['payYear'] : NULL;
    $payMonth = isset($_POST['payMonth']) ? $_POST['payMonth'] : NULL;
    //$type = !empty($_POST['type'])?$_POST['type']:null;

    $base = $posiFee + $posiFee/3 + $yearFee - $tax - $houseFund - $pension - $medic - $unemploy - $illness - $addition;


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

        $query = "INSERT INTO `payment`(`id`, `name`, `branch`, `base`,`posiFee`, `yearFee`, `tax`, `houseFund`, 
                                        `pension`, `medic`, `unemploy`, `illness`, `addition`, `request`, 
                                        `paid`, `isPaid`, `pay_year`, `pay_month`, `remark`) VALUES 
                                        (NULL ,'".$name."','".$branch."','".$base."','".$posiFee."','".$yearFee."',
                                        '".$tax."','".$houseFund."','".$pension."','".$medic."',
                                        '".$unemploy."','".$illness."','".$addition."','".number_format($request,2)."',
                                        0,0,'".$payYear."','".$payMonth."','".$payYear."年".$payMonth."月')";
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
        });
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


    })


</script>

</html>
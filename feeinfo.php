<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/bootstrap-treeview.min.js"></script>

    <style type="text/css">


    </style>
</head>
<body>
<div class="new-wrap">

    <div class="top-title">
        <p>
            <span class="icon-comm">费</span>
            <span class="top-t">党费信息</span>
        </p>
    </div>
    <div id="container" class="layui-form">

        <div id="content" class="member">


            <div class="col-md-12">
                <div class="row">
                    <div class="addbtn">
                        <?php

                        $fee_name = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                        $fee_request = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                        $fee_paid = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                        $index = 0;
                        $index1 = 1;

                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            $authorityCode = $_SESSION['authorityCode'];
                        } else {
                            echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
                        }

                        $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位
                        require_once 'db_login.php';
                        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                        if ($conn->connect_error) die($conn->connect_error);
                        mysqli_set_charset($conn, 'utf8');


                        $year = isset($_POST['select1']) ? $_POST['select1'] : NULL;     //  这里接收选择的年份值
                        $month = isset($_POST['select2']) ? $_POST['select2'] : NULL;     //这里接收选择的月份值
                        //  然后把它保存到 session，用于下拉菜单选择后保留结果，不跳回默认值
                        $_SESSION['sel1'] = $year;
                        $sSel_y = isset($_SESSION['sel1']) ? $_SESSION['sel1'] : NULL;
                        $_SESSION['sel2'] = $month;
                        $sSel_m = isset($_SESSION['sel2']) ? $_SESSION['sel2'] : NULL;

                        if (($authorityCode <= 1) || ($authorityCode == 20)) {
                            echo <<<Jump
                        <span type="button" class="btn addBtn">
                            <i class="icon-add"></i><a href="./feeinfo_create.php?branch={$branch}">新增</a>
                        </span>
Jump;
                        }

                        ?>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="basic-info"><p>党费收缴表:</p></div>


                    <table class="table feeinfo-table" align="center">
                        <tr>
                            <th class="">党支部名称</th>
                            <td><?php echo $branch ?></td>
                            <th>收缴时间</th>
                            <td width="30%">
                                <form name="form" enctype="multipart/form-data" method="post" action=""
                                      class="tab-select">
                                    <select name="select1" lay-ignore>
                                        <option value="2015"<?php if ($sSel_y == 2015) { ?> selected="selected" <?php } ?>>
                                            2015年
                                        </option>
                                        <option value="2016"<?php if ($sSel_y == 2016) { ?> selected="selected" <?php } ?>>
                                            2016年
                                        </option>
                                        <option value="2017"<?php if ($sSel_y == 2017) { ?> selected="selected" <?php } ?>>
                                            2017年
                                        </option>
                                    </select>
                                    <select name="select2" lay-ignore>
                                        <option value="1"<?php if ($sSel_m == 1) { ?> selected="selected" <?php } ?>>
                                            1月
                                        </option>
                                        <option value="2"<?php if ($sSel_m == 2) { ?> selected="selected" <?php } ?>>
                                            2月
                                        </option>
                                        <option value="3"<?php if ($sSel_m == 3) { ?> selected="selected" <?php } ?>>
                                            3月
                                        </option>
                                        <option value="4"<?php if ($sSel_m == 4) { ?> selected="selected" <?php } ?>>
                                            4月
                                        </option>
                                        <option value="5"<?php if ($sSel_m == 5) { ?> selected="selected" <?php } ?>>
                                            5月
                                        </option>
                                        <option value="6"<?php if ($sSel_m == 6) { ?> selected="selected" <?php } ?>>
                                            6月
                                        </option>
                                        <option value="7"<?php if ($sSel_m == 7) { ?> selected="selected" <?php } ?>>
                                            7月
                                        </option>
                                        <option value="8"<?php if ($sSel_m == 8) { ?> selected="selected" <?php } ?>>
                                            8月
                                        </option>
                                        <option value="9"<?php if ($sSel_m == 9) { ?> selected="selected" <?php } ?>>
                                            9月
                                        </option>
                                        <option value="10"<?php if ($sSel_m == 10) { ?> selected="selected" <?php } ?>>
                                            10月
                                        </option>
                                        <option value="11"<?php if ($sSel_m == 11) { ?> selected="selected" <?php } ?>>
                                            11月
                                        </option>
                                        <option value="12"<?php if ($sSel_m == 12) { ?> selected="selected" <?php } ?>>
                                            12月
                                        </option>
                                    </select>
                                    <input class="" type="submit" value="提交"/>
                                </form>
                            </td>
                            <th>收缴人</th>
                            <td class="boder-r"><?php echo $username ?></td>
                        </tr>
                    </table>
                    <div class="row memberTable table-type-2">

                        <div class="col-md-12">
                            <table class="table " align="center">
                                <tr class="thhead">
                                    <th width="8%">选择</th>
                                    <th width="15%">序号</th>
                                    <th width="15%">姓名</th>
                                    <th width="20%">应缴金额（元）</th>
                                    <th width="20%">实缴金额（元）</th>
                                    <th width="22%">备注</th>
                                </tr>

                                <?php
                                $query = "select * FROM person WHERE `branch` = '" . $branch . "' AND `type` = '党员'";
                                $result = $conn->query($query);
                                if (!$result) die($conn->connect_error);

                                while ($rows = $result->fetch_array()) {

                                    $query1 = "select * FROM payment WHERE `branch` = '" . $branch . "' AND `name` = '" . $rows['name'] . "' AND `pay_year` = '" . $year . "'
                                       AND `pay_month` = '" . $month . "'";
                                    $result1 = $conn->query($query1);
                                    if (!$result1) die($conn->connect_error);

                                    $fee_name[$index] = $rows['name'];
                                    if ($result1->num_rows < 1) {
                                        $fee_request[$index] = '未定义';
                                        $fee_paid[$index] = '未定义';
                                    } else {

                                        $rows1 = $result1->fetch_array();
                                        $fee_request[$index] = $rows1['request'];
                                        $fee_paid[$index] = $rows1['paid'];

                                    }


                                    $index++;

                                }


                                for ($i = 0; $i < $index; $i++) {
                                    echo <<<TABLE
                                    <tr class='ttd'>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" lay-skin="primary">
                                                </label>
                                            </div>
                                        </td>
                                        <td>$index1</td>
                                        <td>{$fee_name[$i]}</td>
                                        <td>{$fee_request[$i]}</td>
                                        <td>{$fee_paid[$i]}</td>
                                        <td></td>
                                    </tr>
      
TABLE;
                                    $index1++;
                                }

                                ?>


                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
</body>
<script src="layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    layui.use("form", function () {
//		var layer = layui.layer;
        var $ = layui.jquery, form = layui.form();
        form.on("checkbox", function (data) {

            data.elem.checked = !data.elem.checked;

        })
    })
</script>
</html>
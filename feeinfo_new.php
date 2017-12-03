<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-09-19
 * Time: 19:44
 */
?>

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
                    <div class="basic-info"><p>党费收缴表: </p></div>


                    <table class="table feeinfo-table" align="center">
                        <tr>
                            <th class="">党支部名称</th>
                            <td><?php echo $branch ?></td>
                            <th>收缴时间</th>
                            <td width="30%" class="boder-r">
                                <form name="form" enctype="multipart/form-data" method="post" action="#"
                                      class="tab-select">
                                    <div class="yearinput">
                                        <div class="layui-input-inline">
                                            <input type="text" class="layui-input" name="year">
                                        </div>
                                        年
                                    </div>
                                    <select name="month" lay-ignore>
                                        <option value="01">
                                            1月
                                        </option>
                                        <option value="02">
                                            2月
                                        </option>
                                        <option value="03">
                                            3月
                                        </option>
                                        <option value="04">
                                            4月
                                        </option>
                                        <option value="05">
                                            5月
                                        </option>
                                        <option value="06">
                                            6月
                                        </option>
                                        <option value="07">
                                            7月
                                        </option>
                                        <option value="08">
                                            8月
                                        </option>
                                        <option value="09">
                                            9月
                                        </option>
                                        <option value="10">
                                            10月
                                        </option>
                                        <option value="11">
                                            11月
                                        </option>
                                        <option value="12">
                                            12月
                                        </option>
                                    </select>
                                    <input class="" type="submit" value="查询"/>
                                </form>
                            </td>
                            <!--<th>收缴人</th>
                            <td class="boder-r"><?php /*echo $username */?></td>-->
                        </tr>
                    </table>
                    <div class="row memberTable table-type-2">

                        <div class="col-md-12">
                            <table class="table " align="center">
                                <tr class="thhead">
                                    <th width="10%">序号</th>
                                    <th width="10%">姓名</th>
                                    <th width="20%">工资基数（元）</th>
                                    <th width="20%">应缴金额（元）</th>
                                    <th width="20%">实缴金额（元）</th>
                                    <th>备注</th>
                                </tr>

                                <?php
                                $year = isset($_POST['year']) ? $_POST['year'] : date("Y");
                                $month = isset($_POST['month']) ? $_POST['month'] : date("m");
//                                                                echo $year,$month;

                                $query = "select `payment`.`name`,`payment`.`base`,`payment`.`request`, `payment`.`paid`, `payment`.`remark` 
                                          FROM `payment`,`person` 
                                          WHERE `person`.`branch` = '" . $branch . "' 
                                            AND `payment`.`pay_year` = '" . $year . "' 
                                            AND `payment`.`pay_month` = '" . $month . "' 
                                            AND `payment`.`name` = `person`.`name`";

                                $result = $conn->query($query);
                                if (!$result) die($conn->connect_error);

                                $index = 1;
                                $totalQrequest = 0;   // 应缴总额
                                $totalPaid = 0;       // 实缴总额
                                while ($row = $result->fetch_array()) {
                                    echo <<<TABLE
                                    <tr class='ttd'>
                                        
                                        <td>$index</td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['base']}</td>
                                        <td>{$row['request']}</td>
                                        <td>{$row['paid']}</td>
                                        <td>{$row['remark']}<span type="button" class="btn addBtn">
                            <a href="./payFee.php?branch={$branch}&name={$row['name']}&year={$year}&month={$month}">缴费</a>
                        </span>
                        </td>
                                    </tr>
      
TABLE;
                                    $totalQrequest = $totalQrequest + $row['request'];
                                    $totalPaid = $totalPaid + $row['paid'];
                                    $index++;
                                }





                                ?>
																<tr class="ttd">
                                    <td>合计</td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $totalQrequest?></td>
                                    <td><?php echo $totalPaid?></td>
                                    <td><?php
                                        $query = "select * from `payment` WHERE 
                                            `branch` = '".$branch."' and `isPaid` = 0 and
                                            `pay_year` = '".$year."' and `pay_month` = '".$month."'";
                                        $result = $conn->query($query);
                                        $num = $result->num_rows;
                                        echo "本月".$num."人未缴纳党费";
                                    ?></td>
                                </tr>

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

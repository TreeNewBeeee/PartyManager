<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-10-17
 * Time: 13:22
 *
 * Description: 问题导向性项目存储于plan表中，plan表中字段与problemProgramScore表字段对应如下：
 *                  month => operatorrole               项目归属者
 *                  season => title                     项目名称
 *                  division => sum([final] * weight)   项目最终成绩为四项成绩加权和
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

            .fo-item label {
                width: 130px;
            }
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


    $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位
    $owner = isset($_GET['owner']) ? $_GET['owner'] : NULL;       // 获取项目归属
    $title = isset($_GET['title']) ? $_GET['title'] : NULL;       // 获取项目名称
    $year = isset($_GET['year']) ? $_GET['year'] : NULL;

    switch ($owner) {
        case '支部书记':
            if (($authorityCode >= 10 and $authorityCode <= 19) or $authorityCode <= 1) {
                // 具备赋分权限：支部管理员 或 中心党委班子 或 管理员
            } else {
                echo "<script>alert('您没有赋分权限!');location.href='problemProgramTable.php?branch={$branch}';</script>";
            }
            break;
        case '支部主任':
            if (($authorityCode >= 10 and $authorityCode <= 19) or $authorityCode <= 1) {
                // 具备赋分权限：支部管理员 或 中心党委班子 或 管理员
            } else {
                echo "<script>alert('您没有赋分权限!');location.href='problemProgramTable.php?branch={$branch}';</script>";
            }
            break;
        case '宣传委员':
            if (($_SESSION['branch'] == $branch and $authorityCode == 20) or ($authorityCode >= 10 and $authorityCode <= 19) or $authorityCode < 1) {
                // 具备赋分权限：支部管理员 或 中心党委班子 或 管理员
            } else {
                echo "<script>alert('您没有赋分权限!');location.href='problemProgramTable.php?branch={$branch}';</script>";
            }
            break;
        case '组织委员':
            if (($_SESSION['branch'] == $branch and $authorityCode == 20) or ($authorityCode >= 10 and $authorityCode <= 19) or $authorityCode < 1) {
                // 具备赋分权限：支部管理员 或 中心党委班子 或 管理员
            } else {
                echo "<script>alert('您没有赋分权限!');location.href='problemProgramTable.php?branch={$branch}';</script>";
            }
            break;
        case '班组长':
            if (($_SESSION['branch'] == $branch and $authorityCode == 20) or ($authorityCode >= 10 and $authorityCode <= 19) or $authorityCode < 1) {
                // 具备赋分权限：支部管理员 或 中心党委班子 或 管理员
            } else {
                echo "<script>alert('您没有赋分权限!');location.href='problemProgramTable.php?branch={$branch}';</script>";
            }
            break;
    }
    ?>
    <div class="new-wrap">
        <div class="top-title">
            <p>
                <span class="icon-comm">赋</span>
                <span class="top-t">问题导向性项目赋分-<?php echo $branch ?></span>
            </p>
        </div>
        <div id="container">
            <div id="content">
                <div class="row">

                    <div class="col-md-12">


                        <div class="row memberTable new-martop">
                            <div class="col-md-12">
                                <table class="table">
                                    <tr class="thhead">
                                        <th width="20%" class="text-center">赋分人</th>
                                        <th width="20%" class="text-center">基础得分（上限60分）</th>
                                        <th width="20%" class="text-center">创新得分（上限30分）</th>
                                        <th width="20%" class="text-center">推广得分（上限10分）</th>
                                        <th width="10%" class="text-center">操作人</th>
                                        <th class="text-center">赋分</th>
                                    </tr>

                                    <?php
                                    require_once '../db_login.php';
                                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                                    if ($conn->connect_error) die($conn->connect_error);
                                    mysqli_set_charset($conn, 'utf8');

                                    $query = "SELECT * FROM `problemprogramscore` WHERE `branch` = '" . $branch . "'
                                                    and `owner` = '" . $owner . "'
                                                    and `title` = '" . $title . "'
                                                    and `year` = '" . $year . "'
                                                    and `operatorrole` = '中心主任'";
                                    $result = $conn->query($query);
                                    if ($result->num_rows == 1) {
                                        $rows = $result->fetch_array();
                                        echo <<<PRINTTABLE
                                                <tr class="ttd">
                                                    <td class="text-center">中心主任</td>
                                                    <td class="text-center">{$rows['score_1']}</td>
                                                    <td class="text-center">{$rows['score_2']}</td>
                                                    <td class="text-center">{$rows['score_3']}</td>
                                                    <td class="text-center">{$username}</td>
                                                    <td class="text-center">已赋分</td>
                                                </tr>
PRINTTABLE;

                                    } else {
                                        echo <<<PRINTFORM
                                            <form action="#" method="post" enctype="multipart/form-data" class="layui-form new-form clearfix">
                                                <tr class="ttd">
                                                    <td class="text-center">中心主任</td>
                                                    <div class="layui-input-inline">
                                                            <input type="text" id="operatorrole" name="operatorrole" value="中心主任" hidden="hidden">
                                                    </div>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_1" name="score_1">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_2" name="score_2">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_3" name="score_3">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="operator" name="operator" value="{$username}" readonly="readonly">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="submit" value="提交">
                                                        </div>
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            </form>
PRINTFORM;

                                    }
                                    ?>


                                    <?php
                                    $query = "SELECT * FROM `problemprogramscore` WHERE `branch` = '" . $branch . "'
                                                    and `owner` = '" . $owner . "'
                                                    and `title` = '" . $title . "'
                                                    and `year` = '" . $year . "'
                                                    and `operatorrole` = '中心书记'";
                                    $result = $conn->query($query);
                                    if ($result->num_rows == 1) {
                                        $rows = $result->fetch_array();
                                        echo <<<PRINTTABLE
                                                <tr class="ttd">
                                                    <td class="text-center">中心书记</td>
                                                    <td class="text-center">{$rows['score_1']}</td>
                                                    <td class="text-center">{$rows['score_2']}</td>
                                                    <td class="text-center">{$rows['score_3']}</td>
                                                    <td class="text-center">{$username}</td>
                                                    <td class="text-center">已赋分</td>
                                                </tr>
PRINTTABLE;

                                    } else {
                                        echo <<<PRINTFORM
                                            <form action="#" method="post" enctype="multipart/form-data" class="layui-form new-form clearfix">
                                                <tr class="ttd">
                                                    <td class="text-center">中心书记</td>
                                                    <div class="layui-input-inline">
                                                            <input type="text" id="operatorrole" name="operatorrole" value="中心书记" hidden="hidden">
                                                    </div>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_1" name="score_1">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_2" name="score_2">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_3" name="score_3">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="operator" name="operator" value="{$username}" readonly="readonly">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="submit" value="提交">
                                                        </div>
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            </form>
PRINTFORM;

                                    }
                                    ?>

                                    <?php
                                    $query = "SELECT * FROM `problemprogramscore` WHERE `branch` = '" . $branch . "'
                                                    and `owner` = '" . $owner . "'
                                                    and `title` = '" . $title . "'
                                                    and `year` = '" . $year . "'
                                                    and `operatorrole` = '分管领导'";
                                    $result = $conn->query($query);
                                    if ($result->num_rows == 1) {
                                        $rows = $result->fetch_array();
                                        echo <<<PRINTTABLE
                                                <tr class="ttd">
                                                    <td class="text-center">分管领导</td>
                                                    <td class="text-center">{$rows['score_1']}</td>
                                                    <td class="text-center">{$rows['score_2']}</td>
                                                    <td class="text-center">{$rows['score_3']}</td>
                                                    <td class="text-center">{$username}</td>
                                                    <td class="text-center">已赋分</td>
                                                </tr>
PRINTTABLE;

                                    } else {
                                        echo <<<PRINTFORM
                                            <form action="#" method="post" enctype="multipart/form-data" class="layui-form new-form clearfix">
                                                <tr class="ttd">
                                                    <td class="text-center">分管领导</td>
                                                    <div class="layui-input-inline">
                                                            <input type="text" id="operatorrole" name="operatorrole" value="分管领导" hidden="hidden">
                                                    </div>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_1" name="score_1">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_2" name="score_2">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_3" name="score_3">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="operator" name="operator" value="{$username}" readonly="readonly">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="submit" value="提交">
                                                        </div>
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            </form>
PRINTFORM;

                                    }
                                    ?>

                                    <?php
                                    $query = "SELECT * FROM `problemprogramscore` WHERE `branch` = '" . $branch . "'
                                                    and `owner` = '" . $owner . "'
                                                    and `title` = '" . $title . "'
                                                    and `year` = '" . $year . "'
                                                    and `operatorrole` = '群众评议'";
                                    $result = $conn->query($query);
                                    if ($result->num_rows == 1) {
                                        $rows = $result->fetch_array();
                                        echo <<<PRINTTABLE
                                                <tr class="ttd">
                                                    <td class="text-center">群众评议</td>
                                                    <td class="text-center">{$rows['score_1']}</td>
                                                    <td class="text-center">{$rows['score_2']}</td>
                                                    <td class="text-center">{$rows['score_3']}</td>
                                                    <td class="text-center">{$username}</td>
                                                    <td class="text-center">已赋分</td>
                                                </tr>
PRINTTABLE;

                                    } else {
                                        echo <<<PRINTFORM
                                            <form action="#" method="post" enctype="multipart/form-data" class="layui-form new-form clearfix">
                                                <tr class="ttd">
                                                    <td class="text-center">群众评议</td>
                                                    <div class="layui-input-inline">
                                                            <input type="text" id="operatorrole" name="operatorrole" value="群众评议" hidden="hidden">
                                                    </div>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_1" name="score_1">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_2" name="score_2">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="score_3" name="score_3">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="text" class="layui-input" id="operator" name="operator" value="{$username}" readonly="readonly">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="layui-input-inline">
                                                            <input type="submit" value="提交">
                                                        </div>
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            </form>
PRINTFORM;

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


<?php

if (isset($_POST['operatorrole'])) {
    // 上传文件


    // 更新数据库
    require_once '../db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');

    $score = $_POST['score_1'] + $_POST['score_2'] + $_POST['score_3'];
    if (!is_numeric($_POST['score_1']) or !is_numeric($_POST['score_2']) or !is_numeric($_POST['score_3'])){
        echo <<<JUMP
            <script language="JavaScript">
                   alert("赋分必须为数字！");
                   self.location='problemProgramTable.php?branch={$branch}';     
            </script>
JUMP;
    }

    if ($_POST['score_1'] > 60 or $_POST['score_1'] < 0){
        echo <<<JUMP
            <script language="JavaScript">
                   alert("基础得分区间应为[0,60]！");
                   self.location='problemProgramTable.php?branch={$branch}';     
            </script>
JUMP;
    }elseif ($_POST['score_2'] > 30 or $_POST['score_2'] < 0){
        echo <<<JUMP
            <script language="JavaScript">
                   alert("创新得分区间应为[0,30]！");
                   self.location='problemProgramTable.php?branch={$branch}';     
            </script>
JUMP;
    }elseif ($_POST['score_3'] > 10 or $_POST['score_3'] < 0){
        echo <<<JUMP
            <script language="JavaScript">
                   alert("推广得分区间应为[0,10]！");
                   self.location='problemProgramTable.php?branch={$branch}';     
            </script>
JUMP;
    }else{
        $query = "INSERT INTO `problemprogramscore`(`ID`, `operatorrole`,
                `score_1`, `score_2`, `score_3`, `branch`, `owner`,
                 `title`, `year`, `final`, `operator`) VALUES 
                 (NULL ,'" . $_POST['operatorrole'] . "','" . $_POST['score_1'] . "','" . $_POST['score_2'] . "',
                 '" . $_POST['score_3'] . "','" . $branch . "','" . $owner . "','" . $title . "','" . $year . "',
                 '" . $score . "','" . $_POST['operator'] . "')";
        $conn->query($query);

        // 每次打分后更新该plan条目的总分（中心主任:中心书记:分管领导:群众评议 = 0.25:0.25:0.25:0.25）
        $query = "select * from `problemprogramscore` WHERE `owner` = '" . $owner . "'
                and `branch` = '" . $branch . "'
                and `title` = '" . $title . "'
                and `year` = '" . $year . "'";
        $result = $conn->query($query);

//    var_dump($result);

        $totleScore = 0;   // 最终成绩
        while ($row = $result->fetch_array()){
            switch ($row['operatorrole']){
                case '中心主任':
                    $totleScore = $totleScore + 0.25 * $row['final'];
                    break;
                case '中心书记':
                    $totleScore = $totleScore + 0.25 * $row['final'];
                    break;
                case '分管领导':
                    $totleScore = $totleScore + 0.25 * $row['final'];
                    break;
                case '群众评议':
                    $totleScore = $totleScore + 0.25 * $row['final'];
                    break;
            }
        }

        $query = "UPDATE `plans` SET `division`='".$totleScore."' WHERE `branch` = '".$branch."'
                and `year` = '".$year."'
                and `month` = '".$owner."'
                and `season` = '".$title."'
                and `type` = '问题导向性项目'
                ";
        $conn->query($query);
        $result->close();
        $conn->close();

        echo <<<JUMP
            <script language="JavaScript">
                   alert("上传成功");
                   self.location='problemProgramTable.php?branch={$branch}';     
            </script>
JUMP;
    }




}



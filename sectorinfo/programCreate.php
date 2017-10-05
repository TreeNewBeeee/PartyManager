<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-08-29
 * Time: 22:00
 */
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->



    <style type="text/css">



        .new-wrap{
            min-width: 860px;

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
$branch = $_GET['branch'];
$type = $_GET['type'];

?>

<div class="new-wrap">
    <div class="top-title">
        <p>
            <span class="icon-comm">信</span>
            <span class="top-t">录入<?php echo $type?></span>
        </p>
    </div>
    <div id="container">
        <div id="content">
            <div class="row">

                <form action="" method="post" class="layui-form new-form clearfix">


                    <div class="d-info dd clearfix">
                        <div class="fo-item new"><p>基本信息:</p></div>

                        <div class="fo-item">
                            <label for="" class="layui-form-label"><?php echo $type?>名称</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input" name="name">
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

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";

    }

    $name = !empty($_POST['name'])?$_POST['name']:NULL;




    if (isset($name)){
        require_once '../db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "INSERT INTO `program`(`ID`, `branch`, `name`, `type`)
                  VALUES (NULL ,'".$branch."','".$name."','".$type."')";
        $conn->query($query);
        $conn->close();
    }



    ?>
</div>
</body>

<script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
<script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="../layui/lay/modules/laydate.js" type="text/javascript" charset="utf-8"></script>
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
        $(".inp-date").click(function(){
            start.elem=this;
            laydate(start);
        })

    })
</script>
</html>

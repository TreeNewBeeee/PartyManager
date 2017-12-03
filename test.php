<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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

</head>
<body>
<?php
    require_once './db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');

    $query = "SELECT * FROM `person` WHERE `branch`='自动化数据室党支部' AND `type`='党员'";
    $result = $conn->query($query);
    $i = 0;
    $member = [];
    while ($row = $result->fetch_array()){
        $member[$i] = $row['name'];                  // 获取支部全部党员姓名
        $i++;
    }
?>
<form action="" method="post" class="new-form">
    <div class="d-info clearfix">
        <div class="fo-item">
            <label for="name" class="layui-form-label">姓名</label>
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
        <input type="hidden" class="layui-input" name="flag" id="flag" value="0">
    </div>
</form>
<script language="javascript">
    function setFlag()
    {
        // var sel = document.getElementById("base");
        // sel.disabled(true);
        alert("XXX");
        $("#flag").val("1");        // 已选择标志位设置为1
        var val = $("#name").val(); // 获取选择党员姓名
        var url = "test.php";
        url += "?selectedName="+val+"&branch=自动化数据室党支部&flag=1";
        location.href = url;        // 刷新页面
        /*var obj = document.getElementById("name");


        // obj.options[obj.options.selectedIndex].setAttr("selected","selected");
        for (var i=0;i<obj.options.length;i++){

            if (obj.options[i].innerHTML === val){
                // alert("==="+i);
                // obj.options[i].setAttr("selected",true);


                break;
            }
        }*/

    }
</script>
</body>
</html>
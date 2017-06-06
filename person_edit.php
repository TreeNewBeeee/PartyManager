<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    <!-- Required Javascript -->
    <script src="./js/jquery-3.1.1.js"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">


        #content {
            float:center;
            margin-left: 50px;
            margin-right: 20px;
        }

        .button {
            color: #fef4e9;
            border: solid 1px #da7c0c;
            background: #f78d1d;
            background: -webkit-gradient(linear, left top, left bottom, from(#faa51a), to(#f47a20));
            background: -moz-linear-gradient(top,  #faa51a,  #f47a20);
            /*filter:  progid:DXImageTransform.Microsoft.gradient(start Colorstr='#faa51a', end Colorstr='#f47a20');*/
            display: inline-block;
            outline: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font: 14px/100% Arial, Helvetica, sans-serif;
            padding: .5em 2em .55em;
            text-shadow: 0 1px 1px rgba(0,0,0,.3);
            -webkit-border-radius: .5em;
            -moz-border-radius: .5em;
            border-radius: .5em;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            box-shadow: 0 1px 2px rgba(0,0,0,.2);
        }
        .button:hover {
            background: #f47c20;
            background: -webkit-gradient(linear, left top, left bottom, from(#f88e11),to(#f06015));
            background: -moz-linear-gradient(top,  #f88e11,  #f06015);
            /*filter:  progid:DXImageTransform.Microsoft.gradient(start Colorstr='#f88e11', end Colorstr='#f06015');*/
            text-decoration: none;
        }
        .button:active {
            color: #fcd3a5;
            background: -webkit-gradient(linear, left top, left bottom, from(#f47a20),to(#faa51a));
            background: -moz-linear-gradient(top,  #f47a20,  #faa51a);
            /*filter:  progid:DXImageTransform.Microsoft.gradient(start Colorstr='#f47a20', end Colorstr='#faa51a');*/
            position: relative;
            top: 1px;
        }

    </style>
</head>

<body>
<div id="container">

    <div id="content">
        <h3><i class="fa fa-edit"></i>&nbsp;信息修改</h3>

        <hr>

        <br>
        <?php
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        } else {
            echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
        }

        $name = isset($_GET['name']) ? $_GET['name'] : NULL;    // 获取姓名

        require_once 'db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "select * FROM person WHERE `name` = '" . $name . "'";
        $result = $conn->query($query);
        if (!$result) die($conn->connect_error);
        $rows = $result->fetch_array();


        ?>

        <div class="row">
<!--            <form action="person_detail.php?name=--><?php //echo $name?><!--" method="post">-->
            <form action="" method="post">
                姓名：<input type="text" name="name" readonly="readonly" value="<?php echo $name?>">
                性别：男<input type="radio" name="gen"value="男" <?php if ($rows['gen']=='男') echo "checked=\"true\""?>>
                女<input type="radio" name="gen"value="女" <?php if ($rows['gen']=='女') echo "checked=\"true\""?>>
                籍贯：<input tyclass="col-md-12"pe="text" name="native" value="<?php echo $rows['native']?>">
                出生年月：<input type="text" name="birth" value="<?php echo $rows['birth']?>">
                <br>
                <br>
                备注：<input type="text" name="remark" value="<?php echo $rows['remark']?>">
                户口所在地：<input type="text" name="household" value="<?php echo $rows['household']?>">
                政治面貌：<select name="type" id="type" disable=true>
                    <option value="党员" <?php if ($rows['type']=='党员') echo "selected=\"selected\""?>>党员</option>
                    <option value="预备党员" <?php if ($rows['type']=='预备党员') echo "selected=\"selected\""?>>预备党员</option>
                    <option value="发展对象" <?php if ($rows['type']=='发展对象') echo "selected=\"selected\""?>>发展对象</option>
                    <option value="积极分子" <?php if ($rows['type']=='积极分子') echo "selected=\"selected\""?>>积极分子</option>
                    <option value="申请入党" <?php if ($rows['type']=='申请入党') echo "selected=\"selected\""?>>申请入党</option>
                </select>
                <br>
                <br>
                入职时间：<input type="text" name="workTime" value="<?php echo $rows['workTime']?>">
                部门岗位：<input type="text" name="sector" value="<?php echo $rows['sector']?>">
                职务：<select name="position" id="position" disable=true>
                    <option value="处级" <?php if ($rows['sector']=='处级') echo "selected=\"selected\""?>>处级</option>
                    <option value="副处级" <?php if ($rows['sector']=='副处级') echo "selected=\"selected\""?>>副处级</option>
                    <option value="科级" <?php if ($rows['sector']=='科级') echo "selected=\"selected\""?>>科级</option>
                    <option value="副科级" <?php if ($rows['sector']=='副科级') echo "selected=\"selected\""?>>副科级</option>
                    <option value="三级助理" <?php if ($rows['sector']=='三级助理') echo "selected=\"selected\""?>>三级助理</option>
                    <option value="四级助理" <?php if ($rows['sector']=='四级助理') echo "selected=\"selected\""?>>四级助理</option>
                    <option value="五级助理" <?php if ($rows['sector']=='五级助理') echo "selected=\"selected\""?>>五级助理</option>
                    <option value="机务员" <?php if ($rows['sector']=='机务员') echo "selected=\"selected\""?>>机务员</option>
                </select>
                职称：<select name="techTitle" id="techTitle" disable=true>
                    <option value="高级工程师" <?php if ($rows['techTitle']=='高级工程师') echo "selected=\"selected\""?>>高级工程师</option>
                    <option value="主任工程师" <?php if ($rows['techTitle']=='主任工程师') echo "selected=\"selected\""?>>主任工程师</option>
                    <option value="工程师" <?php if ($rows['techTitle']=='工程师') echo "selected=\"selected\""?>>工程师</option>
                    <option value="助理工程师" <?php if ($rows['techTitle']=='助理工程师') echo "selected=\"selected\""?>>助理工程师</option>
                    <option value="无" <?php if ($rows['techTitle']=='无') echo "selected=\"selected\""?>>无</option>
                </select>
                <br>
                <br>
                学历：<select name="eduBackground" id="eduBackground" disable=true>
                    <option value="博士" <?php if ($rows['eduBackground']=='博士') echo "selected=\"selected\""?>>博士</option>
                    <option value="研究生" <?php if ($rows['eduBackground']=='研究生') echo "selected=\"selected\""?>>研究生</option>
                    <option value="本科" <?php if ($rows['eduBackground']=='本科') echo "selected=\"selected\""?>>本科</option>
                    <option value="大专" <?php if ($rows['eduBackground']=='大专') echo "selected=\"selected\""?>>大专</option>
                    <option value="高中" <?php if ($rows['eduBackground']=='高中') echo "selected=\"selected\""?>>高中</option>
                    <option value="中专" <?php if ($rows['eduBackground']=='中专') echo "selected=\"selected\""?>>中专</option>
                </select>
                所在党支部：<select name="branch" id="branch" disable=true>
                    <option value="机关党支部" <?php if ($rows['branch']=='机关党支部') echo "selected=\"selected\""?>>机关党支部</option>
                    <option value="通信室党支部" <?php if ($rows['branch']=='通信室党支部') echo "selected=\"selected\""?>>通信室党支部</option>
                    <option value="通信运行室党支部" <?php if ($rows['branch']=='通信运行室党支部') echo "selected=\"selected\""?>>通信运行室党支部</option>
                    <option value="自动化数据室党支部" <?php if ($rows['branch']=='自动化数据室党支部') echo "selected=\"selected\""?>>自动化数据室党支部</option>
                    <option value="雷达室党支部" <?php if ($rows['branch']=='雷达室党支部') echo "selected=\"selected\""?>>雷达室党支部</option>
                    <option value="导航室党支部" <?php if ($rows['branch']=='导航室党支部') echo "selected=\"selected\""?>>导航室党支部</option>
                    <option value="航路导航室党支部" <?php if ($rows['branch']=='航路导航室党支部') echo "selected=\"selected\""?>>航路导航室党支部</option>
                    <option value="供电室党支部" <?php if ($rows['branch']=='供电室党支部') echo "selected=\"selected\""?>>供电室党支部</option>
                    <option value="维修室党支部" <?php if ($rows['branch']=='维修室党支部') echo "selected=\"selected\""?>>维修室党支部</option>
                    <option value="现场车队党支部" <?php if ($rows['branch']=='现场车队党支部') echo "selected=\"selected\""?>>现场车队党支部</option>
                </select>
                毕业院校：<input type="text" name="school" value="<?php echo $rows['school']?>">
                <br>
                <br>
                所学专业：<input type="text" name="major" value="<?php echo $rows['major']?>">
                毕业时间：<input type="text" name="graduationTime" value="<?php echo $rows['graduationTime']?>">
                身份证号：<input type="text" name="idCard" value="<?php echo $rows['idCard']?>">
                <br>
                <br>
                手机号码：<input type="text" name="cell" value="<?php echo $rows['cell']?>">
                <!--                人员状态：<input type="text" name="ryzt">-->
                申请入党日期：<input type="text" name="applicationTime" value="<?php echo $rows['applicationTime']?>">
                列为积极分子日期：<input type="text" name="activistTime" value="<?php echo $rows['activistTime']?>">
                <br>
                <br>列为发展对象日期：<input type="text" name="developmentTime" value="<?php echo $rows['developmentTime']?>">
                培养联系人：<input type="text" name="trainner" value="<?php echo $rows['trainner']?>">
                入党介绍人：<input type="text" name="introducer" value="<?php echo $rows['introducer']?>">
                <br>
                <br>支部大会通过时间：<input type="text" name="agreeTime" value="<?php echo $rows['agreeTime']?>">
                <!--                进入空管局党委时间：<input type="text" name="jrkgjdwsj">-->
                上级批准预备时间：<input type="text" name="probationaryTime" value="<?php echo $rows['probationaryTime']?>">
                <br>
                <br>
                上级批准转正时间：<input type="text" name="preregularTime" value="<?php echo $rows['preregularTime']?>">
                预备转正日期：<input type="text" name="regularTime" value="<?php echo $rows['regularTime']?>">

                <br>
                <div style="margin:0 auto;width:200px;">
                    <br><button class="button orange" type="submit">提交</button>
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
    $name = isset($_GET['name']) ? $_GET['name'] : NULL;    // 获取姓名

    $gen = !empty($_POST['gen'])?$_POST['gen']:null;
    $native = !empty($_POST['native'])?$_POST['native']:null;
    $birth = !empty($_POST['birth'])?$_POST['birth']:null;
    $remark = !empty($_POST['remark'])?$_POST['remark']:null;
    $household = !empty($_POST['household'])?$_POST['household']:null;
    $type = !empty($_POST['type'])?$_POST['type']:null;
    $branch = !empty($_POST['branch'])?$_POST['branch']:null;
    $workTime = !empty($_POST['workTime'])?$_POST['workTime']:null;
    $sector = !empty($_POST['sector'])?$_POST['sector']:null;
    $position = !empty($_POST['position'])?$_POST['position']:null;
    $techTitle= !empty($_POST['techTitle'])?$_POST['techTitle']:null;
    $eduBackground = !empty($_POST['eduBackground'])?$_POST['eduBackground']:null;
    $school = !empty($_POST['school'])?$_POST['school']:null;
    $major = !empty($_POST['major'])?$_POST['major']:null;
    $graduationTime = !empty($_POST['graduationTime'])?$_POST['graduationTime']:null;
    $idCard = !empty($_POST['idCard'])?$_POST['idCard']:null;
    $cell = !empty($_POST['cell'])?$_POST['cell']:null;
    $applicationTime = !empty($_POST['applicationTime'])?$_POST['applicationTime']:null;
    $activistTime = !empty($_POST['activistTime'])?$_POST['activistTime']:null;
    $developmentTime = !empty($_POST['developmentTime'])?$_POST['developmentTime']:null;
    $trainner = !empty($_POST['trainner'])?$_POST['trainner']:null;
    $introducer = !empty($_POST['introducer'])?$_POST['introducer']:null;
    $agreeTime = !empty($_POST['agreeTime'])?$_POST['agreeTime']:null;
    $probationaryTime = !empty($_POST['probationaryTime'])?$_POST['probationaryTime']:null;
    $preregularTime = !empty($_POST['preregularTime'])?$_POST['preregularTime']:null;
    $regularTime = !empty($_POST['regularTime'])?$_POST['regularTime']:null;

//    echo $name,$gen,$native,$birth,$remark,$household,$workTime,$sector,$position,$techTitle,$eduBackground,$school;
//    echo $major,$graduationTime,$idCard,$cell,$applicationTime,$activistTime,$developmentTime,$trainner,$introducer;
//    echo $agreeTime,$probationaryTime,$preregularTime,$regularTime,$branch,$type;
    if (isset($gen)){
        require_once 'db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "UPDATE `person` SET `applicationTime`='".$applicationTime."',`activistTime`='".$activistTime."',`developmentTime`='".$developmentTime."',`remark`='".$remark."',`gen`='".$gen."',`native`='".$native."',`birth`='".$birth."',`household`='".$household."',`type`='".$type."',`workTime`='".$workTime."',`sector`='".$sector."',`position`='".$position."',`techTitle`='".$techTitle."',`eduBackground`='".$eduBackground."',`school`='".$school."',`major`='".$major."',`graduationTime`='".$graduationTime."',`idCard`='".$idCard."',`cell`='".$cell."',`branch`='".$branch."',`trainner`='".$trainner."',`introducer`='".$introducer."',`agreeTime`='".$agreeTime."',`probationaryTime`='".$probationaryTime."',`preregularTime`='".$preregularTime."',`regularTime`='".$regularTime."' WHERE `name`='".$name."'";
        $conn->query($query);
        $conn->close();
    }
?>

</body>




















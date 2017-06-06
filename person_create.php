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
        <h3><i class="fa fa-desktop"></i>&nbsp;信息录入</h3>

        <hr>

        <br>

        <div class="row">
            <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                } else {
                    echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";

                }
                $branch = $_GET['branch'];
                $type = $_GET['type'];
                /*switch ($type){
                    case '党员':
                        echo "<form action=\"./member.php?branch=".$branch."\" method=\"post\">";
                        break;
                    case '积极分子':
                        echo "<form action=\"\" method=\"post\">";
                        break;
                    case '申请入党':
                        echo "<form action=\"\" method=\"post\">";
                        break;
                    case '发展对象':
                        echo "<form action=\"\" method=\"post\">";
                        break;
                    case '预备党员':
                        echo "<form action=\"\" method=\"post\">";
                        break;
                }*/
            ?>

            <form action="" method="post">
                姓名：<input type="text" name="name">
                性别：男<input type="radio" name="gen"value="男">
                女<input type="radio" name="gen"value="女">
                籍贯：<input tyclass="col-md-12"pe="text" name="native">
                出生年月：<input type="text" name="birth">
                <br>
                <br>
                备注：<input type="text" name="remark">
                户口所在地：<input type="text" name="household">
                入职时间：<input type="text" name="workTime">
                <br>
                <br>
                部门岗位：<input type="text" name="sector">
                职务：<select name="position" id="position" disable=true>
                    <option value="处级" selected="selected">处级</option>
                    <option value="副处级">副处级</option>
                    <option value="科级">科级</option>
                    <option value="副科级">副科级</option>
                    <option value="三级助理">三级助理</option>
                    <option value="四级助理">四级助理</option>
                    <option value="五级助理">五级助理</option>
                    <option value="机务员">机务员</option>
                </select>
                职称：<select name="techTitle" id="techTitle" disable=true>
                    <option value="高级工程师" selected="selected">高级工程师</option>
                    <option value="主任工程师">主任工程师</option>
                    <option value="工程师">工程师</option>
                    <option value="助理工程师">助理工程师</option>
                    <option value="无">无</option>
                </select>
                学历：<select name="eduBackground" id="eduBackground" disable=true>
                    <option value="博士" selected="selected">博士</option>
                    <option value="研究生">研究生</option>
                    <option value="本科">本科</option>
                    <option value="大专">大专</option>
                    <option value="高中">高中</option>
                    <option value="中专">中专</option>
                </select>
                <br>
                <br>毕业院校：<input type="text" name="school">
                所学专业：<input type="text" name="major">
                毕业时间：<input type="text" name="graduationTime">
                <br>
                <br>
                身份证号：<input type="text" name="idCard">
                手机号码：<input type="text" name="cell">
<!--                人员状态：<input type="text" name="ryzt">-->
                <br>
                <br>
                申请入党日期：<input type="text" name="applicationTime">
                列为积极分子日期：<input type="text" name="activistTime">
                <br>
                <br>
                列为发展对象日期：<input type="text" name="developmentTime">
                培养联系人：<input type="text" name="trainner">
                <br>
                <br>
                入党介绍人：<input type="text" name="introducer">
                支部大会通过时间：<input type="text" name="agreeTime">
<!--                进入空管局党委时间：<input type="text" name="jrkgjdwsj">-->
                <br>
                <br>
                上级批准预备时间：<input type="text" name="probationaryTime">
                上级批准转正时间：<input type="text" name="preregularTime">
                <br>
                <br>
                预备转正日期：<input type="text" name="regularTime">

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
            $branch = $_GET['branch'];
            $type = $_GET['type'];
//    $branch = '机关党支部';
//    $type = '党员';

//    if (!empty($_POST['school'])) {echo 'hahahahahahah';} else {echo 'yoyoyoyoyoyo';};

    $name = !empty($_POST['name'])?$_POST['name']:NULL;
    $gen = !empty($_POST['gen'])?$_POST['gen']:NULL;
    $native = !empty($_POST['native'])?$_POST['native']:NULL;
    $birth = !empty($_POST['birth'])?$_POST['birth']:'2000-01-01';
    $remark = !empty($_POST['remark'])?$_POST['remark']:NULL;
    $household = !empty($_POST['household'])?$_POST['household']:NULL;
    //        $type = !empty($_POST['type'])?$_POST['type']:null;
    $workTime = !empty($_POST['workTime'])?$_POST['workTime']:'2000-01-01';
    $sector = !empty($_POST['sector'])?$_POST['sector']:NULL;
    $position = !empty($_POST['position'])?$_POST['position']:NULL;
    $techTitle= !empty($_POST['techTitle'])?$_POST['techTitle']:NULL;
    $eduBackground = !empty($_POST['eduBackground'])?$_POST['eduBackground']:NULL;
    $school = !empty($_POST['school'])?$_POST['school']:NULL;
    $major = !empty($_POST['major'])?$_POST['major']:NULL;
    $graduationTime = !empty($_POST['graduationTime'])?$_POST['graduationTime']:'2000-01-01';
    $idCard = !empty($_POST['idCard'])?$_POST['idCard']:NULL;
    $cell = !empty($_POST['cell'])?$_POST['cell']:NULL;
    $applicationTime = !empty($_POST['applicationTime'])?$_POST['applicationTime']:'2000-01-01';
    $activistTime = !empty($_POST['activistTime'])?$_POST['activistTime']:'2000-01-01';
    $developmentTime = !empty($_POST['developmentTime'])?$_POST['developmentTime']:'2000-01-01';
    $trainner = !empty($_POST['trainner'])?$_POST['trainner']:NULL;
    $introducer = !empty($_POST['introducer'])?$_POST['introducer']:NULL;
    $agreeTime = !empty($_POST['agreeTime'])?$_POST['agreeTime']:'2000-01-01';
    $probationaryTime = !empty($_POST['probationaryTime'])?$_POST['probationaryTime']:'2000-01-010';
    $preregularTime = !empty($_POST['preregularTime'])?$_POST['preregularTime']:'2000-01-01';
    $regularTime = !empty($_POST['regularTime'])?$_POST['regularTime']:'2000-01-01';


//    echo $name,$gen,$native,$birth,$remark,$household,$workTime,$sector,$position,$techTitle,$eduBackground,$school;
//    echo $birth,$workTime,$graduationTime,$applicationTime,$activistTime,$developmentTime;
//    echo $agreeTime,$probationaryTime,$preregularTime,$regularTime;



    if (isset($name)){
        require_once 'db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "INSERT INTO `person` (`id`, `name`, `applicationTime`, `activistTime`, 
            `developmentTime`, `remark`, `gen`, `native`, `birth`, `household`, `type`, `workTime`, 
            `sector`, `position`, `techTitle`, `eduBackground`, `school`, `major`, `graduationTime`,
             `idCard`, `cell`, `branch`, `trainner`, `introducer`, `agreeTime`, `probationaryTime`, 
             `preregularTime`, `regularTime`, `authorityCode`, `password`) VALUES (NULL, '" . $name . "', 
             '" . $applicationTime . "', '" . $activistTime . "', '" . $developmentTime . "', '" . $remark . "', 
             '" . $gen . "', '" . $native . "', '" . $birth . "', '" . $household . "', '" . $type . "', 
             '" . $workTime . "', '" . $sector . "', '" . $position . "', '" . $techTitle . "', '" . $eduBackground . "',
              '" . $school . "', '" . $major . "', '" . $graduationTime . "', '" . $idCard . "', '" . $cell . "', 
              '" . $branch . "', '" . $trainner . "', '" . $introducer . "', '" . $agreeTime . "',
               '" . $probationaryTime . "', '" . $preregularTime . "', '" . $regularTime . "', '99', '123456')";
        $conn->query($query);
        $conn->close();
    }



?>
</body>
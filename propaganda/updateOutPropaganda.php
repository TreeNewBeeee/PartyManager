<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-09-27
 * Time: 15:08
 */
?>

<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-07-02
 * Time: 22:35
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
    <!-- Required Javascript -->
    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap-treeview.min.js"></script>

    <style type="text/css">


        #content {
            float: center;
            margin-left: 50px;
            margin-right: 20px;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            font: 14px Verdana, Arial, Geneva, sans-serif;
            color: #404040;
            background: #fff;
        }

        img {
            border-style: none;
        }

        .box {
            position: relative;
            float: left;
        }

        input.uploadFile {
            position: absolute;
            right: 0px;
            top: 0px;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer;
            width: 276px;
            height: 36px;
            overflow: hidden;
        }

        input.textbox {
            float: left;
            padding: 5px;
            color: #999;
            height: 24px;
            line-height: 24px;
            border: 1px #ccc solid;
            width: 200px;
            margin-right: 4px;
        }

        a.link {
            float: left;
            display: inline-block;
            padding: 4px 16px;
            color: #fff;
            font: 14px "Microsoft YaHei", Verdana, Geneva, sans-serif;
            cursor: pointer;
            background-color: #ff9933;
            line-height: 28px;
            text-decoration: none;
        }

        .button {
            color: #fef4e9;
            border: solid 1px #da7c0c;
            background: #f78d1d;
            background: -webkit-gradient(linear, left top, left bottom, from(#faa51a), to(#f47a20));
            background: -moz-linear-gradient(top, #faa51a, #f47a20);
            filter: progid:DXImageTransform.Microsoft.gradient(start Colorstr='#faa51a', end Colorstr='#f47a20');
            display: inline-block;
            outline: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font: 14px/100% Arial, Helvetica, sans-serif;
            padding: .5em 2em .55em;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .3);
            -webkit-border-radius: .5em;
            -moz-border-radius: .5em;
            border-radius: .5em;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
        }

        .button:hover {
            background: #f47c20;
            background: -webkit-gradient(linear, left top, left bottom, from(#f88e11), to(#f06015));
            background: -moz-linear-gradient(top, #f88e11, #f06015);
            filter: progid:DXImageTransform.Microsoft.gradient(start Colorstr='#f88e11', end Colorstr='#f06015');
            text-decoration: none;
        }

        .button:active {
            color: #fcd3a5;
            background: -webkit-gradient(linear, left top, left bottom, from(#f47a20), to(#faa51a));
            background: -moz-linear-gradient(top, #f47a20, #faa51a);
            filter: progid:DXImageTransform.Microsoft.gradient(start Colorstr='#f47a20', end Colorstr='#faa51a');
            position: relative;
            top: 1px;
        }

        .file {
            position: relative;
            display: inline-block;
            background: #D0EEFF;
            border: 1px solid #99D3F5;
            border-radius: 4px;
            padding: 4px 12px;
            overflow: hidden;
            color: #1E88C7;
            text-decoration: none;
            text-indent: 0;
            line-height: 20px;
        }

        .file input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
        }

        .file:hover {
            background: #AADFFD;
            border-color: #78C3F3;
            color: #004974;
            text-decoration: none;
        }

    </style>



</head>

<body>
<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $authorityCode = $_SESSION['authorityCode'];
    $type = isset($_GET['type']) ? $_GET['type'] : null;
    $branch = isset($_GET['branch']) ? $_GET['branch'] : null;

//    echo $type,$branch;
} else {
    echo "<script>alert('先登陆。。。!');location.href='../index.php';</script>";
}

?>
<div id="container">

    <div id="content">
        <form action="./submitPropaganda.php" method="post" enctype="multipart/form-data">
            <h3><i class="fa fa-print"></i>&nbsp;<?php echo $type ?>发表情况-上传页</h3>
            <br>
            <hr>
            <br>
            <div class="row">
                <div class="col-xs-4">
                    发布人：&nbsp;&nbsp;&nbsp;<input type="text" name="publisher" id="publisher" value="<?php echo $username ?>" readonly="readonly">
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-xs-4">
                    新闻标题：<input type="text" name="title">
                </div>

            </div>
            <br>

            <div class="row">
                <div class="col-xs-4">
                    发表刊物：<select type="text" name="popmagazing" id="popmagzing">
                        <option value="">请选择</option>
                        <?php
                        require_once '../db_login.php';
                        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                        if ($conn->connect_error) die($conn->connect_error);
                        mysqli_set_charset($conn, 'utf8');

                        $query = "SELECT * FROM `magzingtype` WHERE 1";
                        $result = $conn->query($query);
                        while ($row = $result->fetch_array()){
                            echo <<<OPTIONS
                                <option value="{$row['name']}">{$row['name']}</option>
OPTIONS;

                        }
                        ?>


                    </select>
                    <input type="text" name="inputmagzing" id="inputmagzing" hidden="true">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="custom" id="custom">自定义发表刊物
                    </label>
                </div>
                <div class="col-xs-4">
                    刊物影响：<select type="text" name="influrence" id="popinflurence" hidden="true">
                        <option value="影响力巨大">影响力巨大</option>
                        <option value="有重要影响力">有重要影响力</option>
                        <option value="有影响力">有影响力</option>
                        <option value="重要行业媒体">重要行业媒体</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-4">
                    图作者：&nbsp;&nbsp;&nbsp;<input type="text" name="grapher">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-4">
                    文章作者：<input type="text" name="writter">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-4">
                    字数：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="length">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-4">
                    刊登时间：<input type="date" name="publishTime">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-8">
                    附件：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="file" id="file"/>
                </div>
            </div>

            <input type="hidden" name="type" value="<?php echo $type?>"/>
            <input type="hidden" name="branch" value="<?php echo $branch?>"/>


            <div style="margin:0 auto;width:200px;">
                <br>
                <button class="button orange" type="submit" name="submit" value="submit">提交</button>
            </div>
        </form>
    </div>

</div>

<?php
    if (isset($_POST['publisher']))

?>

<script type="text/javascript">
    var checkbox = document.getElementById('custom');
    checkbox.addEventListener('change',function () {
        if(this.checked){
//            alert("checked!");
            document.getElementById('popmagzing').hidden = true;
            document.getElementById('inputmagzing').hidden = false;
            document.getElementById('popinflurence').hidden = false;
        }else {
            document.getElementById('popmagzing').hidden = false;
            document.getElementById('inputmagzing').hidden = true;
            document.getElementById('popinflurence').hidden = true;
        }
    },false)
</script>

</body>


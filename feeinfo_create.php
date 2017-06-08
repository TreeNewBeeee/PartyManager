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

            ?>

            <form action="" method="post">
                姓名：<input type="text" name="name"> 
                党支部名称：<input class="col-md-12" type="text" name="branch" placeholder="<?php echo $branch ?>">
                应缴：<input type="text" name="request">
                <br>
                <br>
                实缴：<input type="text" name="paid">
                &nbsp;
                缴费年：<select name="payYear" id="position" disable=true>
                    <option value="2015" selected="selected">2015年</option>
                    <option value="2016">2016年</option>
                    <option value="2017">2017年</option>      
                </select>
                &nbsp;
                缴费月：<select name="payMonth" disable=true>
                    <option value="1" selected="selected">1月</option>
                    <option value="2">2月</option>
                    <option value="3">3月</option>
                    <option value="4">4月</option>
                    <option value="5">5月</option>
                    <option value="6">6月</option>
                    <option value="7">7月</option>
                    <option value="8">8月</option>
                    <option value="9">9月</option>
                    <option value="10">10月</option>
                    <option value="11">11月</option>
                    <option value="12">12月</option>
                </select>
                <br>
                <br>
                
                <br>
                <div style="margin:0 auto;width:200px;">
                    <br><button class="button orange" type="submit">提交</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

//    if (!empty($_POST['school'])) {echo 'hahahahahahah';} else {echo 'yoyoyoyoyoyo';};

    $name = !empty($_POST['name'])?$_POST['name']:NULL;
    $request = !empty($_POST['request'])?$_POST['request']:NULL;
    $paid = !empty($_POST['paid'])?$_POST['paid']:'2000-01-01';
    $payYear = !empty($_POST['payYear'])?$_POST['payYear']:NULL;
    $payMonth = !empty($_POST['payMonth'])?$_POST['payMonth']:NULL;
    //$type = !empty($_POST['type'])?$_POST['type']:null;



//    echo $name,$gen,$native,$birth,$remark,$household,$workTime,$sector,$position,$techTitle,$eduBackground,$school;
//    echo $birth,$workTime,$graduationTime,$applicationTime,$activistTime,$developmentTime;
//    echo $agreeTime,$probationaryTime,$preregularTime,$regularTime;



    if (isset($name)){
        require_once 'db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "INSERT INTO `payment` (`id`, `name`, `branch`, `request`, `paid`, `pay_year`, `pay_month`, `remark`) VALUES (NULL, '" . $name . "', 
        '" . $branch . "', '" . $request . "', '" . $paid . "', '" . $payYear . "','" . $payMonth . "',NULL)";
        $conn->query($query);
        $conn->close();
    }



?>
</body>
</html>
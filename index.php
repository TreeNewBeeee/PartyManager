<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <!-- Required Javascript -->
    <script src="./js/jquery-3.1.1.js"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">

        .col-center-block {
            float: none;
            display: block;
            margin: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        #footer {
            clear: both;
        }

        .backgroundimg {
            background-image: url('./images/login.jpg');
            background-size: 100%;
            background-repeat:no-repeat;}
			
#background 
{ 
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: #211f1f; 
    display:none\8;
} 
#background .bg-photo 
{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: none;
    overflow: hidden;
    -webkit-background-size: cover !important;
    -moz-background-size: cover !important;
    -o-background-size: cover !important;
    background-size: cover !important;
} 

#background .bg-photo-1 
{ 
    background: url('./images/login.jpg') no-repeat center center;
} 

#background-ie { 
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: #211f1f;
}
   </style>
</head>
<body>
<div id="background" class="container">
    <br>
    <br>
    <br>
    <br>
        <div class="bg-photo bg-photo-1" style="display: block;">

            <div class="row">
                <form class="form-inline" method="post">
                    <div class="col-xs-4 col-md-2 col-center-block">
                        <div class="row">

                            <div class="form-group">
                                <label for="exampleInputName2">用户名</label><br><input type="text" class="form-control" id="exampleInputName2" name="username">
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group">
                                <label for="exampleInputPassword3">密码</label><br><input type="password" class="form-control" id="exampleInputPassword3" name="password">
                            </div>

                        </div>

                        <br>
                        <div class="form-group">

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> 记住密码
                                </label>
                            </div>
                            &nbsp;&nbsp;
                            <button type="submit" class="btn btn-success">&nbsp;&nbsp;登录&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>


</body>
</html>

<?php
    if (!isset($_SESSION['username'])){
        session_start();
    }

    $pswd = isset($_POST['password']) ? $_POST['password'] : NULL;    // 用户输入用户名
    $username = isset($_POST["username"]) ? $_POST["username"] : NULL;// 用户输出用户名
    $_SESSION['username'] = $username;                              // 将用户名session
//    $_SESSION['branch'] = isset($_POST["branch"]) ? $_POST["branch"] : NULL;

    require_once 'db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');

    $query = "select * FROM person WHERE `name` = '" . $username . "' AND `password` = '" . $pswd . "'";
    $result = $conn->query($query);
    if (!$result) die($conn->connect_error);
    $rows = $result->num_rows;

    if ($rows == 1) {
//        echo $result->fetch_assoc()['name'] . '<br >';
        $person = $result->fetch_array();
        $_SESSION['authorityCode'] = $person['authorityCode'];    // 将用户ID session
        $_SESSION['branch'] = $person['branch'];
//        echo $_SESSION['branch'];
        echo "<script>parent.location.replace('homepage.html')</script>";
        $result->close();
        $conn->close();

    }




?>
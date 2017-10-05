<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
      <script src="./js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
      <script src="layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>
    

    <style type="text/css">
	html,body{
		height: 100%;
	}
   </style>
</head>
<body>
<div class="wrap">
	<div id="background" class="container">
		<div class="login-bg"></div>
        <div class="login layui-form" style="display: block;">

			<p class="head-title">技保中心党建管理执行考核系统</p>
				
                <form class="form-inline" method="post">
                    <div class="col-center-block login-form">
                        <div class="row">
                            <div class="form-group login-input">
					<i class="login-user"></i>
                                <input type="text" class="form-control icon-username" id="exampleInputName2" name="username" placeholder="用户名" autocomplete="off">
                            </div>

                        </div>
                        <input type="number" style="display: none;"/>
                        <div class="row">
                            <div class="form-group login-input">
					<i class="login-pwd"></i>
                               <input type="password" class="form-control icon-pwd" id="exampleInputPassword3" name="password" placeholder="密码" autocomplete="off">
                            </div>

                        </div>
                     	<div class="row">
                     		   <div class="form-group remb-pwd">
                                  <input type="checkbox"> <label>记住密码</label>
                           </div>
                     	</div>
						<div class="row">
					<div class="form-group submit">
					<input type="submit" value="确认登录" />
						</div>
						</div>
                            <!--<button type="submit" class="btn btn-success">&nbsp;&nbsp;登录&nbsp;&nbsp;</button>-->
                        </div>
                    </div>
                </form>

        </div>
</div>
</div>


</body>
</html>
<script type="text/javascript">
			layui.use("form",function(){
			var form = layui.form()
		})
</script>
<?php
    if (!isset($_SESSION['username'])){
        session_start();
    }

    $pswd = isset($_POST['password']) ? $_POST['password'] : NULL;    // 用户输入用户名
    $username = isset($_POST["username"]) ? $_POST["username"] : NULL;// 用户输出用户名

//echo $pswd,$username;
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
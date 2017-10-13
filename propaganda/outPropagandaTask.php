<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-06-29
 * Time: 18:46
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
    <link rel="stylesheet" type="text/css" href="../layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    	
    <!-- Required Javascript -->
    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap-treeview.min.js"></script>
    <style type="text/css">

	.d-info{
		margin-top: 10px;
		width: 420px;
	}
		.d-info .fo-item{
			width: 100%;
		}
		.d-info .info-sub{
			margin-top: 20px;
		}
		.new-form{
			width: 400px;
		}
.fo-item label{
	width: 165px;
}
    </style>

</head>
<body>
	<div class="new-wrap">
		<div class="top-title">
			<p>
				<span class="icon-comm">外</span>
				<span class="top-t">外媒指标-编辑页</span>
			</p>
		</div>
<div id="container">

    <div id="content">

        <?php

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $authorityCode = $_SESSION['authorityCode'];
        } else {
            echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
        }


        ?>


        <div class="row">
            <div class="col-md-12">

                <form action="#" method="post" enctype="multipart/form-data" class="layui-form new-form clearfix">

                    <?php
                    require_once '../db_login.php';
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) die($conn->connect_error);
                    mysqli_set_charset($conn, 'utf8');

                    $query = "SELECT * FROM `sectors` WHERE `uppersector` = '技术保障中心'";
                    $result = $conn->query($query);
                    $index = 0;
                    while ($rows = $result->fetch_array()) {
                        $sector[$index] = $rows['name'];
                        $index++;
                        echo <<<SECTORTASK
                        <div class="d-info clearfix">
                        	<div class='fo-item'>
                            <label for="" class="layui-form-label">
                                {$rows['name']}：
                            </label>
                            <div class="layui-input-inline title-span">
                                <input type="text" class="layui-input" name="{$rows['name']}"><span>篇</span>
                            </div>

                            </div>
    
                        </div>

SECTORTASK;

                    }
                    $result->close();

                    ?>
                    <div>
                        <input type="hidden" name="isPost" value="true">
                    </div>
                   <div class="info-sub">
					<input type="submit" value="提交"  name="submit"/>
				</div>
                </form>

                <?php
//                var_dump($sector) ;
//                echo count($sector);
                if (isset($_POST['isPost'])){
                    for ($i = 0;$i < count($sector);$i++){
//                    echo $_POST["$sector[$i]"];
//                        echo $i.$sector[$i]."==";
                        $query = "UPDATE `sectors` SET `outpropagandatask` = '".$_POST["$sector[$i]"]."' WHERE `name` = '".$sector[$i]."'";
                        $conn->query($query);
                    }

                    $conn->close();
                    echo "<script> window.location.href='./outPropaganda.php';</script>";
                }

                ?>

            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>

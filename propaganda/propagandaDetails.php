<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-07-03
 * Time: 13:25
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    	
    <title></title>
     <style>
    	
    	       #content {

            margin-left: 20px;
            margin-right: 20px;
        }

       
        table {

           
            border-collapse: separate;
            *border-collapse: collapse; /* IE7 and lower */
            border-spacing: 0;
        }


        td {
            
            text-align: center;
           

        }
    </style>
</head>

<body>
	<div class="new-wrap">
	
		<div class="top-title">
			<p>
				<span class="icon-comm">发</span>
				<span class="top-t">发表情况</span>
			</p>
		</div>
<div id="content" class="member new-martop">


    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $authorityCode = $_SESSION['authorityCode'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='../index.php';</script>";
    }

    $type = isset($_GET['type']) ? $_GET['type'] : null;
    $branch = isset($_GET['branch']) ? $_GET['branch'] : null;
    $influence = isset($_GET['influence']) ? $_GET['influence'] : null;

    require_once '../db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');


    ?>


    <div class="row memberTable">
        <div class="col-md-12">
            <table class="table">
                <tr class="thhead">
                    <th class="text-center" width="5%">序号</th>
                    <th class="text-center" width="30%">标题</th>
                    <th class="text-center" width="20%">刊物</th>
                    <th class="text-center" width="15%">图/文作者</th>
                    <th class="text-center" width="5%">字数</th>
                    <th class="text-center" width="10%">发表时间</th>
                    <th class="text-center" width="15%">操作</th>
                </tr>
                <?php
                if ($type == '外媒'){
                    $query = "SELECT * FROM `propaganda` WHERE `branch` = '".$branch."' and
                            `type` = '".$type."' and `influence` = '".$influence."' and `year` = '".date("Y")."'";
                    $result = $conn->query($query);
                    $index = 1;
                    while ($rows = $result->fetch_array()){
                        echo <<<PRINTTABLE
                    <tr class="ttd">
                        <td class="text-center">{$index}</td>
                        <td class="text-center">{$rows['title']}</td>
                        <td class="text-center">{$rows['magzing']}</td>
                        <td class="text-center">图：{$rows['grapher']}/文：{$rows['writter']}</td>
                        <td class="text-center">{$rows['length']}</td>
                        <td class="text-center">{$rows['publishTime']}</td>
                        <td class="text-center"><a href="{$rows['file']}">查看</a>&nbsp;<a href="./modifyOutPropaganda.php?title={$rows['title']}&type=外媒&branch={$branch}">修改</a>&nbsp;<a href="./confirmDelete.php?title={$rows['title']}&type=外媒&branch={$branch}">删除</a></td>
                    </tr>
PRINTTABLE;
                        $index++;
                    }
                }elseif($type == '内刊'){

                    $query = "SELECT * FROM `propaganda` WHERE `branch` = '".$branch."' and
                            `type` = '".$type."' and `magzing` = '".$_GET['magzing']."' and `year` = '".date("Y")."'";
                    $result = $conn->query($query);
                    $index = 1;
                    while ($rows = $result->fetch_array()){
                        echo <<<PRINTTABLE
                    <tr class="ttd">
                        <td class="text-center">{$index}</td>
                        <td class="text-center">{$rows['title']}</td>
                        <td class="text-center">{$rows['magzing']}</td>
                        <td class="text-center">图：{$rows['grapher']}/文：{$rows['writter']}</td>
                        <td class="text-center">{$rows['length']}</td>
                        <td class="text-center">{$rows['publishTime']}</td>
                        <td class="text-center"><a href="{$rows['file']}">查看</a>&nbsp;<a href="./modifyPropaganda.php?title={$rows['title']}&type=内刊&branch={$branch}">修改</a>&nbsp;<a href="./confirmDelete.php?title={$rows['title']}&type=内刊&branch={$branch}">删除</a></td>
                    </tr>
PRINTTABLE;
                        $index++;
                    }
                }elseif ($type == '工会') {
                    $query = "SELECT * FROM `propaganda` WHERE `branch` = '" . $branch . "' and
                            `type` = '" . $type . "' and `year` = '" . date("Y") . "'";
                    $result = $conn->query($query);
                    $index = 1;
                    while ($rows = $result->fetch_array()) {
                        echo <<<PRINTTABLE
                    <tr class="ttd">
                        <td class="text-center">{$index}</td>
                        <td class="text-center">{$rows['title']}</td>
                        <td class="text-center">{$rows['magzing']}</td>
                        <td class="text-center">图：{$rows['grapher']}/文：{$rows['writter']}</td>
                        <td class="text-center">{$rows['length']}</td>
                        <td class="text-center">{$rows['publishTime']}</td>
                        <td class="text-center"><a href="{$rows['file']}">查看</a>&nbsp;<a href="./modifyPropaganda.php?title={$rows['title']}&type=工会&branch={$branch}">修改</a>&nbsp;<a href="./confirmDelete.php?title={$rows['title']}&type=工会&branch={$branch}">删除</a></td>
                    </tr>
PRINTTABLE;
                        $index++;
                    }
                }


                ?>



            </table>
        </div>
    </div>
</div>
</div>

</body>
</html>

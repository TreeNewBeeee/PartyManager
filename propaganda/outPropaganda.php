<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    	
    <title>外媒宣传</title>
    <style>
    	
    	       #content {
            float: center;
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
				<span class="icon-comm">外</span>
				<span class="top-t">外媒宣传</span>
			</p>
		</div>
<div id="container">
<div id="content" class="member">


    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $authorityCode = $_SESSION['authorityCode'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='../index.php';</script>";
    }

    if ($authorityCode == 102 or $authorityCode == 0) {
        echo <<<PRINTBUTTON

                <div class="col-md-12">
                                    <div class="addbtn">
                <span type="button" class="btn  addBtn">
                    <i class="icon-add"></i><a href="./outPropagandaTask.php">外媒指标编辑</a>
                </span>
				</div>

                </div>


PRINTBUTTON;

    }

    ?>


    <div class="row memberTable">
        <div class="col-md-12">
            <table class="table">
                <tr class="thhead">
                    <th class="text-center">党支部</th>
                    <th class="text-center">外媒计划（篇）</th>
                    <th class="text-center">影响力巨大的媒体（篇）</th>
                    <th class="text-center">有重要影响力媒体（篇）</th>
                    <th class="text-center">有影响力媒体（篇）</th>
                    <th class="text-center">重要行业媒体（篇）</th>
                    <th class="text-center">支部上传</th>
                </tr>

                <?php
                require_once '../db_login.php';
                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                if ($conn->connect_error) die($conn->connect_error);
                mysqli_set_charset($conn, 'utf8');

                $query = "SELECT * FROM `sectors` WHERE `uppersector` = '技术保障中心'";
                $result = $conn->query($query);

                $index = 0;
//                获取支部名称及支部指标
                while ($rows = $result->fetch_array()) {
                    $sector[$index] = $rows['name'];
                    $sectorTask[$index] = $rows['outpropagandatask'];
                    $index++;
                }
                $result->close();
//                打印支部外媒刊登表格
                for ($i = 0; $i < $index; $i++) {
                    $query = "SELECT * FROM `propaganda` WHERE `branch` = '".$sector[$i]."' and
                     `type` = '外媒' and `year` = '".date("Y")."' and `influence` = '影响力巨大'";
                    $result = $conn->query($query);
                    $num = $result->num_rows;

                    echo <<<PRINTSECTOR
                    <tr class="ttd">
                        <td>{$sector[$i]}</td>
                        <td class="text-center">{$sectorTask[$i]}</td>
                        <td class="text-center"><a href="./propagandaDetails.php?type=外媒&branch={$sector[$i]}&influence=影响力巨大">{$num}</a></td>
                        
PRINTSECTOR;
                    $result->close();
                    $query = "SELECT * FROM `propaganda` WHERE `branch` = '".$sector[$i]."' and
                     `type` = '外媒' and `year` = '".date("Y")."' and `influence` = '有重要影响力'";
                    $result = $conn->query($query);
                    $num = $result->num_rows;
                    echo <<<PRINT
                        <td class="text-center"><a href="./propagandaDetails.php?type=外媒&branch={$sector[$i]}&influence=有重要影响力">{$num}</a></td>
PRINT;

                    $result->close();
                    $query = "SELECT * FROM `propaganda` WHERE `branch` = '".$sector[$i]."' and
                     `type` = '外媒' and `year` = '".date("Y")."' and `influence` = '有影响力'";
                    $result = $conn->query($query);
                    $num = $result->num_rows;
                    echo <<<PRINT
                        <td class="text-center"><a href="./propagandaDetails.php?type=外媒&branch={$sector[$i]}&influence=有影响力">{$num}</a></td>
PRINT;

                    $result->close();
                    $query = "SELECT * FROM `propaganda` WHERE `branch` = '".$sector[$i]."' and
                     `type` = '外媒' and `year` = '".date("Y")."' and `influence` = '重要行业媒体'";
                    $result = $conn->query($query);
                    $num = $result->num_rows;
                    echo <<<PRINT
                        <td class="text-center"><a href="./propagandaDetails.php?type=外媒&branch={$sector[$i]}&influence=重要行业媒体">{$num}</a></td>
PRINT;


                    if ($authorityCode == 0 or ($authorityCode == 20 and $sector[$i] == $_SESSION['branch'])) {
                        echo <<<PRINTUPDATE
                        <td class="text-center"><a href="./updateOutPropaganda.php?type=外媒&branch={$sector[$i]}">上传外媒</a></td>
                    </tr>
PRINTUPDATE;

                    } else {
                        echo <<<PRINTEND
                        <td></td>
                    <tr/>
PRINTEND;


                    }
                }
                ?>


            </table>
        </div>
    </div>
</div>
</div>
</div>

</body>
</html>
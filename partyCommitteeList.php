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
    <script language="javascript"></script>
    <script LANGUAGE="JavaScript"  type="text/javascript">
    </script>
</head>

    <style type="text/css">


        #content {
            float:center;
            margin-left: 20px;
            margin-right: 20px;
        }



        table {

           
            border-collapse: separate;
            *border-collapse: collapse; /* IE7 and lower */
            border-spacing: 0;
        }

        tbody tr:hover {

           background: linear-gradient(#fff,#ffdcb9);

        }


        th {
            
            padding: 10px;
            text-align: center;
            background-color: #FF9999;
            background: -ms-linear-gradient(top, #fff,  #ffdcb9);        /* IE 10 */
            background:-moz-linear-gradient(top,#b8c4cb,#f6f6f8);/*火狐*/ 
            background:-webkit-gradient(linear, 0% 0%, 0% 100%,from(#b8c4cb), to(#f6f6f8));/*谷歌*/ 
            background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#ffdcb9));      /* Safari 4-5, Chrome 1-9*/
            background: -webkit-linear-gradient(top, #fff, #ffdcb9);   /*Safari5.1 Chrome 10+*/
            background: -o-linear-gradient(top, #fff, #ffdcb9);  /*Opera 11.10+*/
        }

        td {
            
            text-align: center;
           

        }
          
        th:first-child {  
          
             border-radius: 6px 0 0 0;  
          
        }  
          
        th:last-child {  
          
             border-radius: 0 6px 0 0;  
          
        }  
          
        tr:last-child td:first-child {  
          
             border-radius: 0 0 0 6px;  
          
        }  
          
        tr:last-child td:last-child {  
          
             border-radius: 0 0 6px 0;  
          
        }  

        a:link {
            color:#FF0000;
            text-decoration:underline;
        }
        a:visited {
            color:#00FF00;
            text-decoration:none;
        }
        a:hover {
            color:#000000;
            text-decoration:none;
        }
        a:active {
            color:#FFFFFF;
            text-decoration:none;
        }


    </style>
</head>
<body  onload="openwin()">


<div id="container">

    <div id="content">
         <h3><i class="fa fa-pencil"></i>&nbsp;党委评价</h3>

            <div class="row">
            <div class="col-md-12">
                <hr>

                <table class="table table-condensed" align="center">
                    <tr class="warning">
                        <th width="30%">姓名</th>
                        <th width="30%">职务</th>
                        <th width="40%">详情</th>
                    </tr>

        <?php

            $flag=[0,0,0,0,0];
            $leader=[0,0,0,0,0];
            $arr =[0,0,0,0,0];
            $arr_authorCode = [0,0,0,0,0];


            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $authorityCode = $_SESSION['authorityCode'];
            } else {
                echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
            }

            $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取任务类型

            require_once './db_login.php';
            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
            if ($conn->connect_error) die($conn->connect_error);
            mysqli_set_charset($conn, 'utf8');

            $query = "SELECT * FROM person WHERE `authorityCode` >= '10' AND `authorityCode` <= '14'";
            $result = $conn->query($query);
            
            if (!$result) die($conn->connect_error);

            while ($rows = $result->fetch_array()){
                switch($rows['authorityCode']){

                    case"10":
                      $leader[0] = $rows['name'];
                      $arr_authorCode[0] = 10;
                      break;
                    case"11":
                      $leader[1] = $rows['name'];
                      $arr_authorCode[1] = 11;
                      break;
                    case"12":
                      $leader[2] = $rows['name'];
                      $arr_authorCode[2] = 12;
                      break;
                    case"13":
                      $leader[3] = $rows['name'];
                      $arr_authorCode[3] = 13;
                      break;
                    case"14":
                      $leader[4] = $rows['name'];
                      $arr_authorCode[4] = 14;
                      break;

                      

                }

            }    
                
            switch($authorityCode) {


                case "10":
                    $flag[0] = 1;
                    break;
                case "11":
                    $flag[1] = 1;
                    break;
                case "12":
                    $flag[2] = 1;
                    break;
                case "13":
                    $flag[3] = 1;
                    break;
                case "14":
                    $flag[4] = 1;
                    break;
            }

            foreach($flag as $key=>$value){

                if($value == 1)
                {
                   $arr[$key] = "href=partyCommitteeBranchList.php?name={$leader[$key]}&authorityCode={$arr_authorCode[$key]}";
                }
                else
                {
                   $arr[$key] = "href=partyCommitteeList.php";
                }
            }



                echo <<<SHOWTABLE

                
                    <tr>
                        <td>$leader[0]</td>
                        <td>中心主任</td>
                        <td><a $arr[0]>查看</a></td>     
                    </tr>
                    <tr>
                        <td>$leader[1]</td>
                        <td>中心副书记</td>
                        <td><a $arr[1]>查看</a></td>
                    </tr>
                    <tr>
                        <td>$leader[2]</td>
                        <td>中心副主任</td>
                        <td><a $arr[2]>查看</a></td>
                    </tr>
                    <tr>
                        <td>$leader[3]</td>
                        <td>中心副主任</td>
                        <td><a $arr[3]>查看</a></td>
                    </tr>
                    <tr>
                        <td>$leader[4]</td>
                        <td>中心副主任</td>
                        <td><a $arr[4]>查看</a></td>
                    </tr>
                </table>
SHOWTABLE;

                 ?>

            </div>
        </div>
    </div>
</div>

</body>
</html>
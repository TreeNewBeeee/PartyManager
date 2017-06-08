<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/bootstrap-treeview.css" rel="stylesheet">
    <!-- Required Javascript -->
    <script src="./js/jquery-3.1.1.js"></script>
    <script src="./js/bootstrap-treeview.min.js"></script>

    <style type="text/css">



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

    </style>
</head>
<body>

<div id="container">

    <div id="content">

        <h3><i class="fa fa-cny"></i>&nbsp;党费信息</h3>
        <div class="col-md-12">
            <div class="row">
            <?php 
                   
            $fee_name = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            $fee_request = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            $fee_paid = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            $index = 0;
            $index1 = 1;

            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $authorityCode = $_SESSION['authorityCode'];
            } else {
                echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
            }

            $branch = isset($_GET['branch']) ? $_GET['branch'] : NULL;    // 获取单位
            require_once 'db_login.php';
            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
            if ($conn->connect_error) die($conn->connect_error);
            mysqli_set_charset($conn, 'utf8');

            //$query = "select * FROM payment WHERE `branch` = '" . $branch . "'";   // TODO：目前不具备查询功能
            //$result = $conn->query($query);
            //if (!$result) die($conn->connect_error);

            
            $year = isset($_POST['select1'])?$_POST['select1']:NULL;     //  这里接收选择的年份值
            $month = isset($_POST['select2'])?$_POST['select2']:NULL;     //这里接收选择的月份值  
            //  然后把它保存到 session，用于下拉菜单选择后保留结果，不跳回默认值
            $_SESSION['sel1']=$year;
            $sSel_y=isset($_SESSION['sel1'])?$_SESSION['sel1']:NULL;
            $_SESSION['sel2']=$month;
            $sSel_m=isset($_SESSION['sel2'])?$_SESSION['sel2']:NULL;
    
            if (($authorityCode <= 1) || ($authorityCode == 20)){
                    echo <<<Jump
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="./feeinfo_create.php?branch={$branch}">新增</a>
                        </button>
Jump;
            }
               
            ?>
            </div>
        </div>



        <div class="row">
            <div class="col-md-12">
                <hr>
                <p align="center">党费收缴表</p>

                <table class="table table-condensed" align="center">
                    <tr>
                        <th class="warning" width="20%">党支部名称</th>
                        <td width="20%"><?php echo $branch?></td>
                        <th class="warning" width="15%">收缴时间</th>
                        <td width="20%">
                            <form name="form" enctype="multipart/form-data" method="post" action="">  
                            <select name="select1"> 
                            <option value="2015"<?php if($sSel_y==2015){ ?> selected="selected" <?php } ?>>2015年</option> 
                            <option value="2016"<?php if($sSel_y==2016){ ?> selected="selected" <?php } ?>>2016年</option> 
                            <option value="2017"<?php if($sSel_y==2017){ ?> selected="selected" <?php } ?>>2017年</option>
                            </select> 
                            <select name="select2"> 
                            <option value="1"<?php if($sSel_m==1){ ?> selected="selected" <?php } ?>>1月</option> 
                            <option value="2"<?php if($sSel_m==2){ ?> selected="selected" <?php } ?>>2月</option> 
                            <option value="3"<?php if($sSel_m==3){ ?> selected="selected" <?php } ?>>3月</option> 
                            <option value="4"<?php if($sSel_m==4){ ?> selected="selected" <?php } ?>>4月</option> 
                            <option value="5"<?php if($sSel_m==5){ ?> selected="selected" <?php } ?>>5月</option> 
                            <option value="6"<?php if($sSel_m==6){ ?> selected="selected" <?php } ?>>6月</option> 
                            <option value="7"<?php if($sSel_m==7){ ?> selected="selected" <?php } ?>>7月</option> 
                            <option value="8"<?php if($sSel_m==8){ ?> selected="selected" <?php } ?>>8月</option> 
                            <option value="9"<?php if($sSel_m==9){ ?> selected="selected" <?php } ?>>9月</option> 
                            <option value="10"<?php if($sSel_m==10){ ?> selected="selected" <?php } ?>>10月</option> 
                            <option value="11"<?php if($sSel_m==11){ ?> selected="selected" <?php } ?>>11月</option> 
                            <option value="12"<?php if($sSel_m==12){ ?> selected="selected" <?php } ?>>12月</option> 
                            </select> 
                            <br><br>
                            <button class="button orange" type="submit">提交</button>

                            </form>     
                        </td>
                        <th class="warning" width="10%">收缴人</th>
                        <td width="15%"><?php echo $username ?></td>
                    </tr>
                </table>
                <div class="row">
                    <hr>
                    <div class="col-md-12">
                        <table class="table table-condensed" align="center">
                            <tr class="warning">
                                <th width="15%">选择</th>
                                <th width="15%">序号</th>
                                <th width="15%">姓名</th>
                                <th width="20%">应缴金额（元）</th>
                                <th width="20%">实缴金额（元）</th>
                                <th width="15%">备注</th>
                            </tr>

                            <?php
                                $query = "select * FROM person WHERE `branch` = '" . $branch . "' AND `type` = '党员'";
                                $result = $conn->query($query);
                                if (!$result) die($conn->connect_error);
                                
                                while ($rows = $result->fetch_array()){

                                      $query1 = "select * FROM payment WHERE `branch` = '". $branch ."' AND `name` = '" . $rows['name'] ."' AND `pay_year` = '". $year ."'
                                       AND `pay_month` = '".$month."'";
                                      $result1 = $conn->query($query1);
                                      if (!$result1) die($conn->connect_error);

                                      $fee_name[$index] = $rows['name'];
                                      if($result1->num_rows<1){
                                        $fee_request[$index] = '未定义';
                                        $fee_paid[$index] = '未定义';
                                      } 
                                      else{

                                        $rows1 = $result1->fetch_array();
                                        $fee_request[$index] = $rows1['request'];
                                        $fee_paid[$index] = $rows1['paid'];
                                         
                                      } 
                                      
                        
                                      $index++;

                                }
                    
            
                                for($i=0;$i<$index;$i++){
                                echo <<<TABLE
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                </label>
                                            </div>
                                        </td>
                                        <td>$index1</td>
                                        <td>{$fee_name[$i]}</td>
                                        <td>{$fee_request[$i]}</td>
                                        <td>{$fee_paid[$i]}</td>
                                        <td></td>
                                    </tr>
      
TABLE;
                                    $index1++;
                                }

                            ?>



                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
</body>

</html>
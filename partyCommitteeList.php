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

<div id="container">

    <div id="content">
         <h3><i class="fa fa-pencil"></i>&nbsp;党委评价</h3>

        <?php

            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $authorityCode = $_SESSION['authorityCode'];
            } else {
                echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
            }

            $type = isset($_GET['type']) ? $_GET['type'] : NULL;    // 获取任务类型
        ?>

            <div class="row">
            <div class="col-md-12">
                <hr>

                <table class="table table-condensed" align="center">
                    <tr class="warning">
                        <th width="30%">姓名</th>
                        <th width="30%">职务</th>
                        <th width="40%">详情</th>
                    </tr>
                    <tr>
                        <td>王忠义</td>
                        <td>中心主任</td>
                        <td><a href="partyCommitteeBranchList.php?name=王忠义">查看</a></td>
                    </tr>
                    <tr>
                        <td>胡兴宇</td>
                        <td>中心副书记</td>
                        <td><a href="partyCommitteeBranchList.php?name=胡兴宇">查看</a></td>
                    </tr>
                    <tr>
                        <td>牟小光</td>
                        <td>中心副主任</td>
                        <td><a href="partyCommitteeBranchList.php?name=牟小光">查看</a></td>
                    </tr>
                    <tr>
                        <td>文奇</td>
                        <td>中心副主任</td>
                        <td><a href="partyCommitteeBranchList.php?name=文奇">查看</a></td>
                    </tr>
                    <tr>
                        <td>尚德佳</td>
                        <td>中心副主任</td>
                        <td><a href="partyCommitteeBranchList.php?name=尚德佳">查看</a></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>

</body>
</html>
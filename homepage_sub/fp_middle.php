<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>首页</title>
  <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap-treeview.css" rel="stylesheet">
	<!-- Required Javascript -->
	<script src="../js/jquery-3.1.1.js"></script>
	<script src="../js/bootstrap-treeview.min.js"></script>

  <style type="text/css">  
  #header {
    text-align: right;
    padding-top: 27px;
  }

  .headerimg{
    background-image: url('../images/background.jpg');
    height: 63px;
    width: 1360px;
  }


  #content {
      float: center;
      margin-left: 50px;
      margin-right: 20px;
  }


  table{
   
    border-collapse: separate;
    border-spacing: 20px 5px; <!--表格距左右边框距离-->

  }

  th{
    height: 40px;
    width: 200px;
    padding: 10px;
    border-radius:5px;
    overflow:hidden
    background: -ms-linear-gradient(top, #fff,  #ffdcb9);        /* IE 10 */
    background:-moz-linear-gradient(top,#b8c4cb,#f6f6f8);/*火狐*/ 
    background:-webkit-gradient(linear, 0% 0%, 0% 100%,from(#b8c4cb), to(#f6f6f8));/*谷歌*/ 
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#ffdcb9));      /* Safari 4-5, Chrome 1-9*/
    background: -webkit-linear-gradient(top, #fff, #ffdcb9);   /*Safari5.1 Chrome 10+*/
    background: -o-linear-gradient(top, #fff, #ffdcb9);  /*Opera 11.10+*/
  }

  td{
    height: 165px;
    width: 200px;
    border: 1px solid gray;
    padding: 10px;
    border-radius:5px;
   
  }

  .breadcrumb {
    padding: 8px 135px;
    list-style: none;
    background-color: transparent;
    border-radius: 2px;
  </style>

</head>

<body>

   <h3>&nbsp;<i class="fa fa-bullhorn"></i>&nbsp;通知</h3>

      <hr>
     
      <table class="table table-condensed" align="center">
        <tr class="warning">
          <th><i class="fa fa-calendar"></i>&nbsp;定期任务</th>
          <th><i class="fa fa-hand-paper-o"></i>&nbsp;抢接任务</th>
        </tr>
        <tr>
          <td>
              <ul>
                  <?php
                      require_once '../db_login.php';
                      $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                      if ($conn->connect_error) die($conn->connect_error);
                      mysqli_set_charset($conn, 'utf8');

                      $query = "SELECT * FROM `fixedmission` WHERE 1 ORDER BY `id` DESC";
                      $result = $conn->query($query);
                      if (!$result) die($conn->connect_error);

                      $index = 1;
                      while ($rows = $result->fetch_array() and $index <= 4){   // 只显示4行

//                          echo $rows['title'];
                          echo <<<MISSION
                            <li>
                                <div>
                                    <div align="left">
                                        <a href="../homepageView.php?title={$rows['title']}&type=fixedmission">{$rows['title']}</a>
                                    </div>
                                    <div align="right">
                                        {$rows['timeLimit']}
                                    </div>
                                    
                                </div>
                            
                            </li>


MISSION;

                          $index++;


                      }

                      $result->close();
                      $conn->close();
                  ?>






              </ul>
          </td>
          <td>
              <ul>
                  <?php
                  require_once '../db_login.php';
                  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                  if ($conn->connect_error) die($conn->connect_error);
                  mysqli_set_charset($conn, 'utf8');

                  $query = "SELECT * FROM `rushmission` WHERE 1 ORDER BY `id` DESC";
                  $result = $conn->query($query);
                  if (!$result) die($conn->connect_error);

                  $index = 1;
                  while ($rows = $result->fetch_array() and $index <= 4){   // 只显示4行

//                          echo $rows['title'];
                      echo <<<MISSION
                            <li>
                                <div>
                                    <div align="left">
                                        <a href="../homepageView.php?title={$rows['title']}&type=rushmission">{$rows['title']}</a>
                                    </div>
                                    <div align="right">
                                        {$rows['timeLimit']}
                                    </div>
                                    
                                </div>
                            
                            </li>


MISSION;

                      $index++;


                  }

                  $result->close();
                  $conn->close();
                  ?>






              </ul>
          </td>
        </tr>
        <tr class="warning">
          <th><i class="fa fa-send"></i>&nbsp;指定任务</th>
          <th><i class="fa fa-star"></i>&nbsp;亮点任务</th>
        </tr>
        <tr>
          <td>
              <ul>
                  <?php
                  require_once '../db_login.php';
                  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                  if ($conn->connect_error) die($conn->connect_error);
                  mysqli_set_charset($conn, 'utf8');

                  $query = "SELECT * FROM `assignmission` WHERE 1 ORDER BY `id` DESC";
                  $result = $conn->query($query);
                  if (!$result) die($conn->connect_error);

                  $index = 1;
                  while ($rows = $result->fetch_array() and $index <= 4){   // 只显示4行

//                          echo $rows['title'];
                      echo <<<MISSION
                            <li>
                                <div>
                                    <div align="left">
                                        <a href="../homepageView.php?title={$rows['title']}&type=assignmission">{$rows['title']}</a>
                                    </div>
                                    <div align="right">
                                        {$rows['timeLimit']}
                                    </div>
                                    
                                </div>
                            
                            </li>


MISSION;

                      $index++;


                  }

                  $result->close();
                  $conn->close();
                  ?>






              </ul>
          </td>
          <td>
              <ul>
                  <?php
                  require_once '../db_login.php';
                  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                  if ($conn->connect_error) die($conn->connect_error);
                  mysqli_set_charset($conn, 'utf8');

                  $query = "SELECT * FROM `shiningmission` WHERE 1 ORDER BY `id` DESC";
                  $result = $conn->query($query);
                  if (!$result) die($conn->connect_error);

                  $index = 1;
                  while ($rows = $result->fetch_array() and $index <= 4){   // 只显示4行

//                          echo $rows['title'];
                      echo <<<MISSION
                            <li>
                                <div>
                                    <div align="left">
                                        <a href="../homepageView.php?title={$rows['title']}&type=shiningmission">{$rows['title']}</a>
                                    </div>
                                    <div align="right">
                                        {$rows['timeLimit']}
                                    </div>
                                    
                                </div>
                            
                            </li>


MISSION;

                      $index++;


                  }

                  $result->close();
                  $conn->close();
                  ?>






              </ul>
          </td>
        </tr>
      </table>

</body>
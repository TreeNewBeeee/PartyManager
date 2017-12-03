<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<?php session_start();
$branch = isset($_SESSION['branch']) ? $_SESSION['branch'] : null;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>˗ҳ</title>
  <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap-treeview.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/main.css"/>
	<!-- Required Javascript -->
	<!--<script src="../js/jquery-3.1.1.js"></script>-->
	<script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/bootstrap-treeview.min.js"></script>

  <style type="text/css"> 

html,body{
	height:100%
}
body{
	background-image: url(../images/m_bg_boggom.jpg);
	background-position:bottom;
	background-repeat:no-repeat ;
	background-size:100% ;
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
    }

  </style>

</head>

<body>
	<div class="new-wrap">
  
		<div class="top-title">
			<p>
				<span class="icon-comm">通</span>
				<span class="top-t">通知</span>
			</p>
		</div>
     	<div class="announce">
     		<table class="table" align="center">
        <tr class="">
          <th>
          	<div class="pad-left">
          		
          	<i class="icon-co icon-renwu"></i><span>定期任务</span>
          	</div>
          </div>
          <th>
          	          	<div class="pad-left" style="margin-right: 0;">
          		
          	<i class="icon-co icon-huojian"></i><span>抢接任务</span>
          	</div>
          </th>
        </tr>
        <tr>
          <td>
             <div class="an-list-item">
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
                      while ($rows = $result->fetch_array() and $index <= 4){  // 只显示4行

//                          echo $rows['title'];
                          echo <<<MISSION
                            <li class="clearfix">
								<!--<a href="../homepageView.php?title={$rows['title']}&type=fixedmission">-->
								<a href="../missionViewer.php?title={$rows['title']}&branch={$branch}">
                                    <div class="item-left">
                                        <span>{$rows['title']}<span>
                                    </div>
                                    <div class="item-right">
                                        {$rows['timeLimit']}
                                    </div>
                                    </a>
                            
                            </li>


MISSION;

                          $index++;


                      }

                      $result->close();
                      $conn->close();
                  ?>






              </ul>
             </div>
          </td>

          <td>
             <div class="an-list-item" style="padding-right:0 ;">
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
                  while ($rows = $result->fetch_array() and $index <= 4){   //

//                          echo $rows['title'];
                      echo <<<MISSION
                            <li class="clearfix">

                                <a href="../missionGrab.php?branch={$branch}&title={$rows['title']}">
                                    <div class="item-left">
                                        <span>{$rows['title']}<span>
                                    </div>
                                    <div class="item-right">
                                        {$rows['timeLimit']}
                                    </div>
                                    </a>
                                    

                            
                            </li>


MISSION;

                      $index++;


                  }

                  $result->close();
                  $conn->close();
                  ?>






              </ul>
             </div>
          </td>
        </tr>
        <tr class="">
          <th><div class="pad-left">
          		
          	<i class="icon-co icon-huojian"></i><span>指定任务</span>
          	</div></th>
          <th><div class="pad-left" style="margin-right: 0;">
          		
          	<i class="icon-co icon-huojian"></i><span>亮点任务</span>
          	</div></th>
        </tr>
        <tr>
          <td>
              <div class="an-list-item">
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
                  while ($rows = $result->fetch_array() and $index <= 4){   // ֻДʾ4ѐ

//                          echo $rows['title'];
                      echo <<<MISSION
                            <li class="clearfix">

                                    <div class="item-left">
                                        <a href="../missionViewer.php?title={$rows['title']}&branch={$branch}">{$rows['title']}</a>
                                    </div>
                                    <div class="item-right">
                                        {$rows['timeLimit']}
                                    </div>
                                    

                            
                            </li>


MISSION;

                      $index++;


                  }

                  $result->close();
                  $conn->close();
                  ?>






              </ul>
              </div>
          </td>
          <td>
              <div class="an-list-item" style="padding-right: 0;">
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
                  while ($rows = $result->fetch_array() and $index <= 4){   // ֻДʾ4ѐ

//                          echo $rows['title'];
                      echo <<<MISSION
                            <li class="clearfix">

                                    <div class="item-left">
                                        <a href="../missionViewer.php?title={$rows['title']}&branch={$branch}">{$rows['title']}</a>
                                    </div>
                                    <div class="item-right">
                                        {$rows['timeLimit']}
                                    </div>
                                    

                            
                            </li>


MISSION;

                      $index++;


                  }

                  $result->close();
                  $conn->close();
                  ?>






              </ul>
              </div>
          </td>
        </tr>
      </table>

     	</div>
     	</div>
</body>
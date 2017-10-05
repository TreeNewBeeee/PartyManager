<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <link rel="stylesheet" href="./fonts/font-awesome/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->



    <style type="text/css">
 


		.new-wrap{
			min-width: 860px;

		}
    </style>
</head>

<body>
	<div class="new-wrap">
			<div class="top-title">
			<p>
				<span class="icon-comm">信</span>
				<span class="top-t">信息录入</span>
			</p>
		</div>
<div id="container">
    <div id="content">
        <div class="row">
            <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                } else {
                    echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";

                }
                $branch = $_GET['branch'];
                $type = $_GET['type'];

            ?>

     <form action="" method="post" class="layui-form new-form clearfix">


				<div class="d-info dd clearfix">
				<div class="fo-item new"><p>基本信息:</p></div>
					
				<div class="fo-item">
						<label for="" class="layui-form-label">姓名</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" name="name">
					</div>
				</div>

				<div class="fo-item">
					<label for="inputEmail3" class="layui-form-label">性别</label>
					<div class="layui-input-inline">
						<input type="radio" class="form-control" title="男" name="gen">
						<input type="radio" class="form-control" title="女" name="gen">
					</div>
				</div>

				<div class="fo-item">
						<label for="" class="layui-form-label">籍贯</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" placeholder="" name="native">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">出生年月</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" placeholder="" name="birth">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">备注</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" placeholder="" name="remark">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">户口所在地</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" placeholder="" name="household">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">入职时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" placeholder="" name="workTime">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">部门岗位</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" placeholder="" name="sector">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">职位</label>
					<div class="layui-input-inline">
						<select name="position" id="position">
							<option value="处级" selected="selected">处级</option>
							<option value="">副处级</option>
							<option value="">科级</option>
							<option value="">副科级</option>
							<option value="">三级助理</option>
							<option value="">四级助理</option>
							<option value="">五级助理</option>
							<option value="">机务员</option>
						</select>
					</div>
				</div>					
				<div class="fo-item">

						<label for="" class="layui-form-label">职称</label>
					<div class="layui-input-inline">
						<select name="techTitle" id="techTitle">
							<option value="高级工程师" selected="selected">高级工程师</option>
							<option value="">主任工程师</option>
							<option value="">工程师</option>
							<option value="">助理工程师</option>
							<option value="">无</option>
						</select>
					</div>
				</div>	
				<div class="fo-item">
						<label for="" class="layui-form-label">学历</label>
					<div class="layui-input-inline">
						<select name="eduBackground" id="eduBackground">
							<option value="博士" selected="selected">博士</option>
							<option value="">研究生</option>
							<option value="">本科</option>
							<option value="">大专</option>
							<option value="">中专</option>
						</select>
					</div>
				</div>			
				<div class="fo-item">
						<label for="" class="layui-form-label">毕业院校</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" placeholder="" name="school">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">所学专业</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" placeholder="" name="major">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">毕业时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" placeholder="" name="graduationTime">
					</div>
				</div>	
				<div class="fo-item">
						<label for="" class="layui-form-label">身份证号</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" placeholder="" name="idCard">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">手机号码</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" placeholder="" name="cell">
					</div>
				</div>
				</div>
				<div class="d-info clearfix">
				<div class="fo-item new"><p>党籍信息:</p></div>
				<div class="fo-item">
						<label for="" class="layui-form-label">申请入党日期</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" placeholder="" name="applicationTime">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">列为积极分子日期</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" placeholder="" name="activistTime">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">列为发展对象日期</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" placeholder="" name="developmentTime">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">培养联系人</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" placeholder="" name="trainner">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">入党介绍人</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" placeholder="" name="introducer">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">支部大会通过时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" placeholder="" name="agreeTime">
					</div>
				</div>							
				<div class="fo-item">
						<label for="" class="layui-form-label">上级批准预备时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" placeholder="" name="probationaryTime">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">上级批准转正时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" placeholder="" name="preregularTime">
					</div>
				</div>							
				<div class="fo-item">
						<label for="" class="layui-form-label">预备转正日期</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" placeholder="" name="regularTime">
					</div>
				</div>
				</div>
				<div class="info-sub">
					<input type="submit" value="提交"/>
				</div>
				
      </form>
        </div>
    </div>
</div>

<?php

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";

    }
            $branch = $_GET['branch'];
            $type = $_GET['type'];
//    $branch = '机关党支部';
//    $type = '党员';

//    if (!empty($_POST['school'])) {echo 'hahahahahahah';} else {echo 'yoyoyoyoyoyo';};

    $name = !empty($_POST['name'])?$_POST['name']:NULL;
    $gen = !empty($_POST['gen'])?$_POST['gen']:NULL;
    $native = !empty($_POST['native'])?$_POST['native']:NULL;
    $birth = !empty($_POST['birth'])?$_POST['birth']:'2000-01-01';
    $remark = !empty($_POST['remark'])?$_POST['remark']:NULL;
    $household = !empty($_POST['household'])?$_POST['household']:NULL;
    //        $type = !empty($_POST['type'])?$_POST['type']:null;
    $workTime = !empty($_POST['workTime'])?$_POST['workTime']:'2000-01-01';
    $sector = !empty($_POST['sector'])?$_POST['sector']:NULL;
    $position = !empty($_POST['position'])?$_POST['position']:NULL;
    $techTitle= !empty($_POST['techTitle'])?$_POST['techTitle']:NULL;
    $eduBackground = !empty($_POST['eduBackground'])?$_POST['eduBackground']:NULL;
    $school = !empty($_POST['school'])?$_POST['school']:NULL;
    $major = !empty($_POST['major'])?$_POST['major']:NULL;
    $graduationTime = !empty($_POST['graduationTime'])?$_POST['graduationTime']:'2000-01-01';
    $idCard = !empty($_POST['idCard'])?$_POST['idCard']:NULL;
    $cell = !empty($_POST['cell'])?$_POST['cell']:NULL;
    $applicationTime = !empty($_POST['applicationTime'])?$_POST['applicationTime']:'2000-01-01';
    $activistTime = !empty($_POST['activistTime'])?$_POST['activistTime']:'2000-01-01';
    $developmentTime = !empty($_POST['developmentTime'])?$_POST['developmentTime']:'2000-01-01';
    $trainner = !empty($_POST['trainner'])?$_POST['trainner']:NULL;
    $introducer = !empty($_POST['introducer'])?$_POST['introducer']:NULL;
    $agreeTime = !empty($_POST['agreeTime'])?$_POST['agreeTime']:'2000-01-01';
    $probationaryTime = !empty($_POST['probationaryTime'])?$_POST['probationaryTime']:'2000-01-010';
    $preregularTime = !empty($_POST['preregularTime'])?$_POST['preregularTime']:'2000-01-01';
    $regularTime = !empty($_POST['regularTime'])?$_POST['regularTime']:'2000-01-01';


//    echo $name,$gen,$native,$birth,$remark,$household,$workTime,$sector,$position,$techTitle,$eduBackground,$school;
//    echo $birth,$workTime,$graduationTime,$applicationTime,$activistTime,$developmentTime;
//    echo $agreeTime,$probationaryTime,$preregularTime,$regularTime;



    if (isset($name)){
        require_once 'db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "INSERT INTO `person` (`id`, `name`, `applicationTime`, `activistTime`, 
            `developmentTime`, `remark`, `gen`, `native`, `birth`, `household`, `type`, `workTime`, 
            `sector`, `position`, `techTitle`, `eduBackground`, `school`, `major`, `graduationTime`,
             `idCard`, `cell`, `branch`, `trainner`, `introducer`, `agreeTime`, `probationaryTime`, 
             `preregularTime`, `regularTime`, `authorityCode`, `password`) VALUES (NULL, '" . $name . "', 
             '" . $applicationTime . "', '" . $activistTime . "', '" . $developmentTime . "', '" . $remark . "', 
             '" . $gen . "', '" . $native . "', '" . $birth . "', '" . $household . "', '" . $type . "', 
             '" . $workTime . "', '" . $sector . "', '" . $position . "', '" . $techTitle . "', '" . $eduBackground . "',
              '" . $school . "', '" . $major . "', '" . $graduationTime . "', '" . $idCard . "', '" . $cell . "', 
              '" . $branch . "', '" . $trainner . "', '" . $introducer . "', '" . $agreeTime . "',
               '" . $probationaryTime . "', '" . $preregularTime . "', '" . $regularTime . "', '99', '123456')";
        $conn->query($query);
        $conn->close();
    }



?>
	</div>
</body>

<script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
<script src="layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="layui/lay/modules/laydate.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
		layui.use("form",function(){
        var $ = layui.jquery, form = layui.form();
        var laydate = layui.laydate;

	form.on("checkbox",function(data){
		data.elem.checked=!data.elem.checked;
	})
	var start = {
            istoday: false,
            choose: function (datas) {
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            istoday: false,
            choose: function (datas) {
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
//
//      document.getElementById('stardatd').onclick = function () {
//          start.elem = this;
//          laydate(start);
//      }
		$(".inp-date").click(function(){
			start.elem=this;
			laydate(start);
		})
		
	})
</script>
</html>
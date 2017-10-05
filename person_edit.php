<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php session_start(); ?>
<html>

<head>
    <title>首页</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-treeview.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    	
    <!-- Required Javascript -->
    <!--<script src="./js/jquery-3.1.1.js"></script>-->
    <script src="js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/bootstrap-treeview.min.js"></script>

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
				<span class="icon-comm">修</span>
				<span class="top-t">信息修改</span>
			</p>
		</div>

    <div id="content">
        <?php
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        } else {
            echo "<script>alert('先登陆。。。!');location.href='index.php';</script>";
        }

        $name = isset($_GET['name']) ? $_GET['name'] : NULL;    // 获取姓名

        require_once 'db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "select * FROM person WHERE `name` = '" . $name . "'";
        $result = $conn->query($query);
        if (!$result) die($conn->connect_error);
        $rows = $result->fetch_array();


        ?>

        <div class="row">
<!--            <form action="person_detail.php?name=--><?php //echo $name?><!--" method="post">-->
            <form action="" method="post" class="layui-form new-form clearfix">
				<div class="d-info dd clearfix">
				<div class="fo-item new new-one"><p>基本信息:</p></div>
					<div class="fo-item">
						<label for="" class="layui-form-label">姓名</label>
						<div class="layui-input-inline">
							<input type="text" class="layui-input" name="name" readonly="readonly" value="<?php echo $name?>">
						</div>
					</div>
				<div class="fo-item">
					<label for="inputEmail3" class="layui-form-label">性别</label>
					<div class="layui-input-inline  new-label">
						<input type="radio" class="form-control" title="男" name="gen" <?php if ($rows['gen']=='男') echo "checked=\"true\""?>>
						<input type="radio" class="form-control" title="女" name="gen" <?php if ($rows['gen']=='女') echo "checked=\"true\""?>>
					</div>
				</div>

				<div class="fo-item">
						<label for="" class="layui-form-label">籍贯</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" name="native" value="<?php echo $rows['native']?>">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">出生年月</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date" name="birth" value="<?php echo $rows['birth']?>">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">备注</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input"  name="remark" value="<?php echo $rows['remark']?>">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">户口所在地</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input"  name="household" value="<?php echo $rows['household']?>">
					</div>
				</div>		
				<div class="fo-item">
						<label for="" class="layui-form-label">政治面貌</label>
					<div class="layui-input-inline">
						<select name="type" id="type">
                    <option value="党员" <?php if ($rows['type']=='党员') echo "selected=\"selected\""?>>党员</option>
                    <option value="预备党员" <?php if ($rows['type']=='预备党员') echo "selected=\"selected\""?>>预备党员</option>
                    <option value="发展对象" <?php if ($rows['type']=='发展对象') echo "selected=\"selected\""?>>发展对象</option>
                    <option value="积极分子" <?php if ($rows['type']=='积极分子') echo "selected=\"selected\""?>>积极分子</option>
                    <option value="申请入党" <?php if ($rows['type']=='申请入党') echo "selected=\"selected\""?>>申请入党</option>
						</select>
					</div>
				</div>			
				<div class="fo-item">
						<label for="" class="layui-form-label">入职时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date"  name="workTime" value="<?php echo $rows['workTime']?>">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">部门岗位</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input"  name="sector" value="<?php echo $rows['sector']?>">
					</div>
				</div>
			
				<div class="fo-item">
						<label for="" class="layui-form-label">职位</label>
					<div class="layui-input-inline">
						<select name="position" id="position">
 					<option value="处级" <?php if ($rows['sector']=='处级') echo "selected=\"selected\""?>>处级</option>
                    <option value="副处级" <?php if ($rows['sector']=='副处级') echo "selected=\"selected\""?>>副处级</option>
                    <option value="科级" <?php if ($rows['sector']=='科级') echo "selected=\"selected\""?>>科级</option>
                    <option value="副科级" <?php if ($rows['sector']=='副科级') echo "selected=\"selected\""?>>副科级</option>
                    <option value="三级助理" <?php if ($rows['sector']=='三级助理') echo "selected=\"selected\""?>>三级助理</option>
                    <option value="四级助理" <?php if ($rows['sector']=='四级助理') echo "selected=\"selected\""?>>四级助理</option>
                    <option value="五级助理" <?php if ($rows['sector']=='五级助理') echo "selected=\"selected\""?>>五级助理</option>
                    <option value="机务员" <?php if ($rows['sector']=='机务员') echo "selected=\"selected\""?>>机务员</option>
						</select>
					</div>
				</div>					
				<div class="fo-item">

						<label for="" class="layui-form-label">职称</label>
					<div class="layui-input-inline">
						<select name="techTitle" id="techTitle">
                    <option value="高级工程师" <?php if ($rows['techTitle']=='高级工程师') echo "selected=\"selected\""?>>高级工程师</option>
                    <option value="主任工程师" <?php if ($rows['techTitle']=='主任工程师') echo "selected=\"selected\""?>>主任工程师</option>
                    <option value="工程师" <?php if ($rows['techTitle']=='工程师') echo "selected=\"selected\""?>>工程师</option>
                    <option value="助理工程师" <?php if ($rows['techTitle']=='助理工程师') echo "selected=\"selected\""?>>助理工程师</option>
                    <option value="无" <?php if ($rows['techTitle']=='无') echo "selected=\"selected\""?>>无</option>
						</select>
					</div>
				</div>	
				<div class="fo-item">
						<label for="" class="layui-form-label">学历</label>
					<div class="layui-input-inline">
						<select name="eduBackground" id="eduBackground">
                    <option value="博士" <?php if ($rows['eduBackground']=='博士') echo "selected=\"selected\""?>>博士</option>
                    <option value="研究生" <?php if ($rows['eduBackground']=='研究生') echo "selected=\"selected\""?>>研究生</option>
                    <option value="本科" <?php if ($rows['eduBackground']=='本科') echo "selected=\"selected\""?>>本科</option>
                    <option value="大专" <?php if ($rows['eduBackground']=='大专') echo "selected=\"selected\""?>>大专</option>
                    <option value="高中" <?php if ($rows['eduBackground']=='高中') echo "selected=\"selected\""?>>高中</option>
                    <option value="中专" <?php if ($rows['eduBackground']=='中专') echo "selected=\"selected\""?>>中专</option>
						</select>
					</div>
				</div>					
				<div class="fo-item">
						<label for="" class="layui-form-label">所在党支部</label>
					<div class="layui-input-inline">
						<select name="branch" id="branch">
                    <option value="机关党支部" <?php if ($rows['branch']=='机关党支部') echo "selected=\"selected\""?>>机关党支部</option>
                    <option value="通信室党支部" <?php if ($rows['branch']=='通信室党支部') echo "selected=\"selected\""?>>通信室党支部</option>
                    <option value="通信运行室党支部" <?php if ($rows['branch']=='通信运行室党支部') echo "selected=\"selected\""?>>通信运行室党支部</option>
                    <option value="自动化数据室党支部" <?php if ($rows['branch']=='自动化数据室党支部') echo "selected=\"selected\""?>>自动化数据室党支部</option>
                    <option value="雷达室党支部" <?php if ($rows['branch']=='雷达室党支部') echo "selected=\"selected\""?>>雷达室党支部</option>
                    <option value="导航室党支部" <?php if ($rows['branch']=='导航室党支部') echo "selected=\"selected\""?>>导航室党支部</option>
                    <option value="航路导航室党支部" <?php if ($rows['branch']=='航路导航室党支部') echo "selected=\"selected\""?>>航路导航室党支部</option>
                    <option value="供电室党支部" <?php if ($rows['branch']=='供电室党支部') echo "selected=\"selected\""?>>供电室党支部</option>
                    <option value="维修室党支部" <?php if ($rows['branch']=='维修室党支部') echo "selected=\"selected\""?>>维修室党支部</option>
                    <option value="现场车队党支部" <?php if ($rows['branch']=='现场车队党支部') echo "selected=\"selected\""?>>现场车队党支部</option>
						</select>
					</div>
				</div>			
				<div class="fo-item">
						<label for="" class="layui-form-label">毕业院校</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input" name="school" value="<?php echo $rows['school']?>">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">所学专业</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input"  name="major" value="<?php echo $rows['major']?>">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">毕业时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date"  name="graduationTime" value="<?php echo $rows['graduationTime']?>">
					</div>
				</div>	
				<div class="fo-item">
						<label for="" class="layui-form-label">身份证号</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input"  name="idCard" value="<?php echo $rows['idCard']?>">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">手机号码</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input"  name="cell" value="<?php echo $rows['cell']?>">
					</div>
				</div>
               	</div>
				<div class="d-info dd clearfix">
					<div class="fo-item new new-one"><p>党籍信息:</p></div>
				<div class="fo-item">
						<label for="" class="layui-form-label">申请入党日期</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date"  name="applicationTime" value="<?php echo $rows['applicationTime']?>">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">列为积极分子日期</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date"  name="activistTime" value="<?php echo $rows['activistTime']?>">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">列为发展对象日期</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date"  name="developmentTime" value="<?php echo $rows['developmentTime']?>">
					</div>
				</div>
				<div class="fo-item">
						<label for="" class="layui-form-label">培养联系人</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input"  name="trainner" value="<?php echo $rows['trainner']?>">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">入党介绍人</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input"  name="introducer" value="<?php echo $rows['introducer']?>">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">支部大会通过时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date"  name="agreeTime" value="<?php echo $rows['agreeTime']?>">
					</div>
				</div>							
				<div class="fo-item">
						<label for="" class="layui-form-label">上级批准预备时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date"  name="probationaryTime" value="<?php echo $rows['probationaryTime']?>">
					</div>
				</div>				
				<div class="fo-item">
						<label for="" class="layui-form-label">上级批准转正时间</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date"  name="preregularTime" value="<?php echo $rows['preregularTime']?>">
					</div>
				</div>							
				<div class="fo-item">
						<label for="" class="layui-form-label">预备转正日期</label>
					<div class="layui-input-inline">
						<input type="text" class="layui-input inp-date"  name="regularTime" value="<?php echo $rows['regularTime']?>">
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
    $name = isset($_GET['name']) ? $_GET['name'] : NULL;    // 获取姓名

    $gen = !empty($_POST['gen'])?$_POST['gen']:null;
    $native = !empty($_POST['native'])?$_POST['native']:null;
    $birth = !empty($_POST['birth'])?$_POST['birth']:null;
    $remark = !empty($_POST['remark'])?$_POST['remark']:null;
    $household = !empty($_POST['household'])?$_POST['household']:null;
    $type = !empty($_POST['type'])?$_POST['type']:null;
    $branch = !empty($_POST['branch'])?$_POST['branch']:null;
    $workTime = !empty($_POST['workTime'])?$_POST['workTime']:null;
    $sector = !empty($_POST['sector'])?$_POST['sector']:null;
    $position = !empty($_POST['position'])?$_POST['position']:null;
    $techTitle= !empty($_POST['techTitle'])?$_POST['techTitle']:null;
    $eduBackground = !empty($_POST['eduBackground'])?$_POST['eduBackground']:null;
    $school = !empty($_POST['school'])?$_POST['school']:null;
    $major = !empty($_POST['major'])?$_POST['major']:null;
    $graduationTime = !empty($_POST['graduationTime'])?$_POST['graduationTime']:null;
    $idCard = !empty($_POST['idCard'])?$_POST['idCard']:null;
    $cell = !empty($_POST['cell'])?$_POST['cell']:null;
    $applicationTime = !empty($_POST['applicationTime'])?$_POST['applicationTime']:null;
    $activistTime = !empty($_POST['activistTime'])?$_POST['activistTime']:null;
    $developmentTime = !empty($_POST['developmentTime'])?$_POST['developmentTime']:null;
    $trainner = !empty($_POST['trainner'])?$_POST['trainner']:null;
    $introducer = !empty($_POST['introducer'])?$_POST['introducer']:null;
    $agreeTime = !empty($_POST['agreeTime'])?$_POST['agreeTime']:null;
    $probationaryTime = !empty($_POST['probationaryTime'])?$_POST['probationaryTime']:null;
    $preregularTime = !empty($_POST['preregularTime'])?$_POST['preregularTime']:null;
    $regularTime = !empty($_POST['regularTime'])?$_POST['regularTime']:null;

//    echo $name,$gen,$native,$birth,$remark,$household,$workTime,$sector,$position,$techTitle,$eduBackground,$school;
//    echo $major,$graduationTime,$idCard,$cell,$applicationTime,$activistTime,$developmentTime,$trainner,$introducer;
//    echo $agreeTime,$probationaryTime,$preregularTime,$regularTime,$branch,$type;
    if (isset($gen)){
        require_once 'db_login.php';
        $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        if ($conn->connect_error) die($conn->connect_error);
        mysqli_set_charset($conn, 'utf8');

        $query = "UPDATE `person` SET `applicationTime`='".$applicationTime."',`activistTime`='".$activistTime."',`developmentTime`='".$developmentTime."',`remark`='".$remark."',`gen`='".$gen."',`native`='".$native."',`birth`='".$birth."',`household`='".$household."',`type`='".$type."',`workTime`='".$workTime."',`sector`='".$sector."',`position`='".$position."',`techTitle`='".$techTitle."',`eduBackground`='".$eduBackground."',`school`='".$school."',`major`='".$major."',`graduationTime`='".$graduationTime."',`idCard`='".$idCard."',`cell`='".$cell."',`branch`='".$branch."',`trainner`='".$trainner."',`introducer`='".$introducer."',`agreeTime`='".$agreeTime."',`probationaryTime`='".$probationaryTime."',`preregularTime`='".$preregularTime."',`regularTime`='".$regularTime."' WHERE `name`='".$name."'";
        $conn->query($query);
        $conn->close();
    }
?>

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




















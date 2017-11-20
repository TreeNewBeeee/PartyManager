<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-07-02
 * Time: 22:35
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
    <script src="../js/jquery-1.7.1.js"></script>
        <script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
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
.fo-item label {
	min-width:120px;
}
    </style>
</head>

<body>
<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $authorityCode = $_SESSION['authorityCode'];
    $type = isset($_GET['type']) ? $_GET['type'] : null;
    $branch = isset($_GET['branch']) ? $_GET['branch'] : null;

//    echo $type,$branch;
} else {
    echo "<script>alert('先登陆。。。!');location.href='../index.php';</script>";
}

?>
	<div class="new-wrap">
		<div class="top-title">
			<p>
				<span class="icon-comm">发</span>
				<span class="top-t"><?php echo $type ?>发表情况-上传页</span>
			</p>
		</div>
<div id="container">

    <div id="content">
        <form action="./submitPropaganda.php" method="post" enctype="multipart/form-data" class="layui-form new-form clearfix">
<div class="d-info clearfix">
            <div class="fo-item">
						<label for="" class="layui-form-label">发布人</label>
            						<div class="layui-input-inline">
						<input type="text" class="layui-input" name="publisher" value="<?php echo $username ?>" readonly="readonly">
					</div>
            </div>
            <br>
            <?php
            switch ($type){
                case '外媒':
                    echo <<<PRINTFORM
                    <div class="fo-item">
            						<label for="" class="layui-form-label">新闻标题</label>
            						<div class="layui-input-inline">
						<input type="text" class="layui-input" name="title">
					</div>
                        </div>

                        <div class="fo-item">
                        <label for="" class="layui-form-label"> 发表刊物</label>
            						<div class="layui-input-inline">
						<input type="text" class="layui-input" name="magazing">
                       </div>
                        </div>
                        <div class="fo-item">
                          <label for="" class="layui-form-label"> 图作者</label>
            						<div class="layui-input-inline">
						<input type="text" class="layui-input" name="grapher">
                        </div>
                       </div>
                        <div class="fo-item">
                         <label for="" class="layui-form-label"> 文章作者</label>
            						<div class="layui-input-inline">
						<input type="text" class="layui-input" name="writter">
                        </div>
                       </div>
                        <div class="fo-item">
                          <label for="" class="layui-form-label">字数</label>
            						<div class="layui-input-inline">
						<input type="text" class="layui-input" name="length">
                        </div>
                       </div>
                        <div class="fo-item">
	                        <label for="" class="layui-form-label">  刊登时间</label>
	            			<div class="layui-input-inline">
								<input type="text" class="layui-input inp-date" name="publishTime">
	                      	</div>
                       </div>
                        <div class="fo-item">
                         <label for="" class="layui-form-label">附件</label>
            						<div class="layui-input-inline">
						<input type="file" name="file" id="file">
                        </div>
                        </div>
            
                        <input type="hidden" name="type" value="{$type}"/>
                        <input type="hidden" name="branch" value="{$branch}"/>

PRINTFORM;

                    break;
                case '内刊':
                    echo <<<PRINTFORM
                    <div class="fo-item">
            	            <label for="" class="layui-form-label">新闻标题</label>
	            			<div class="layui-input-inline">
								<input type="text" class="layui-input" name="title">
	                      	</div>
                        </div>
                        <br>
                        <div class="fo-item">
						<label for="" class="layui-form-label">发表位置</label>
						<div class="layui-input-inline">
							<select name="magazing">
                                          <option value="内网">内网</option>
                                          <option value="西北空管">西北空管</option>
                                        </select>
						</div>
                           </div>
                        <div class="fo-item">

                            	<label for="" class="layui-form-label"> 图作者</label>
                            	<div class="layui-input-inline">
								<input type="text" class="layui-input" name="grapher">


                            </div>
                        </div>

                        <div class="fo-item">
                        	  <label for="" class="layui-form-label">文章作者</label>
                            	<div class="layui-input-inline">
								<input type="text" class="layui-input" name="writter">
                        </div>
 						</div>
                        <div class="fo-item">
                                <label for="" class="layui-form-label">字数</label>
                            	<div class="layui-input-inline">
								<input type="text" class="layui-input" name="length">
                        </div>
						</div>
                        <div class="fo-item">
                            <label for="" class="layui-form-label">刊登时间</label>
                            <div class="layui-input-inline">
								<input type="text" class="layui-input inp-date" name="publishTime">
                        	</div>
                        </div>
                        <div class="fo-item">
                         <label for="" class="layui-form-label">附件</label>
            						<div class="layui-input-inline">
						<input type="file" name="file" id="file">
                        </div>                                   
                        <input type="hidden" name="type" value="{$type}"/>
                        <input type="hidden" name="branch" value="{$branch}"/>

PRINTFORM;
                    break;
                case '工会':
                    echo <<<PRINTFORM
                    <div class="fo-item">
                            <label for="" class="layui-form-label">新闻标题</label>
                            <div class="layui-input-inline">
								<input type="text" class="layui-input" name="title">
                        	</div>
                        </div>

                        <div class="fo-item">
                        	<label for="" class="layui-form-label">发表刊物</label>
                            <div class="layui-input-inline">
								<input type="text" class="layui-input" name="magazing">
                        	</div>
                        </div>
                        <div class="fo-item">
                        	<label for="" class="layui-form-label">图作者</label>
                            <div class="layui-input-inline">
								<input type="text" class="layui-input" name="grapher">
                        	</div>
                        </div>
                        <div class="fo-item">
                        	<label for="" class="layui-form-label">文章作者</label>
                            <div class="layui-input-inline">
								<input type="text" class="layui-input" name="writter">
                        	</div>
                        </div>
                        <div class="fo-item">
                        	<label for="" class="layui-form-label">字数</label>
                            <div class="layui-input-inline">
								<input type="text" class="layui-input" name="length">
                        	</div>
                        </div>
                        <div class="fo-item">
                        	<label for="" class="layui-form-label">刊登时间</label>
                            <div class="layui-input-inline">
								<input type="text" class="layui-input inp-date" name="publishTime">
                        	</div>
                        </div>
                        <div class="fo-item">
                        	<label for="" class="layui-form-label">附件</label>
                            <div class="layui-input-inline">
								<input type="file" name="file" id="file">
                        </div>
                        </div>
            
                        <input type="hidden" name="type" value="{$type}"/>
                        <input type="hidden" name="branch" value="{$branch}"/>

PRINTFORM;
                    break;
                case '政务信息':
                    echo <<<PRINTFORM
                    <div class="fo-item">
                    	<label for="" class="layui-form-label">政务标题</label>
                    	 <div class="layui-input-inline">
								<input type="text"  class="layui-input"  name="title">
                     	 </div>         
                       </div>
                        
                        <div class="fo-item">
                        <label for="" class="layui-form-label">文章作者</label>
                    	 <div class="layui-input-inline">
								<input type="text"  class="layui-input"  name="writter">
                     	</div>     
                      </div>                     
                        <div class="fo-item">
                        	<label for="" class="layui-form-label">刊登时间</label>
                    	 <div class="layui-input-inline">
								<input type="text" class="layui-input inp-date" name="publishTime">
                     </div>   
                       </div>
                        <div class="fo-item">
                        	<label for="" class="layui-form-label">附件</label>
                            <div class="layui-input-inline">
								<input type="file"  name="file" id="file">
                        </div>
                        </div>
            
                        <input type="hidden" name="type" value="{$type}"/>
                        <input type="hidden" name="branch" value="{$branch}"/>
                        <input type="hidden" name="magazing" value="已发表"/>

PRINTFORM;
                    break;

            }
            ?>


             <div class="info-sub">
					<input type="submit" value="提交"  name="submit"/>
				</div>
            </div>
        </form>
    </div>

</div>
</div>

</body>
<script src="../js/jquery-1.7.1.js" type="text/javascript" charset="utf-8"></script>
<script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="../layui/lay/modules/laydate.js" type="text/javascript" charset="utf-8"></script>
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
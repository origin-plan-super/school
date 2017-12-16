<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>课程信息</title>
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/amazeui/css/amazeui.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/a/css/a.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/examInfo/css/examInfo.css" />
</head>

<body>
	<div class="information-top">
		<img src="/school/Public/assets/img/3.jpg" />
	</div>
	<div class="container-fluid">
		<!--报名课程开始-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4">
				<span>报名课程</span>
			</div>
			<div class="col-xs-8 sign-list-8">
				<span id="sign-curriculum"><?php echo ($subject["subject_title"]); ?></span>
			</div>
		</div>
		<!--报名课程结束-->
		<!--授课老师开始-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4">
				<span>授课老师</span>
			</div>
			<div class="col-xs-8 sign-list-8">
				<span id="sign-teacher"><?php echo ($subject["teacher"]); ?></span>
			</div>
		</div>
		<!--授课老师结束-->
		<!--上课时间开始-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4">
				<span>上课时间</span>
			</div>
			<div class="col-xs-8 sign-list-8">
				<span id="sign-time"><?php echo ($subject["date"]); ?></span>
			</div>
		</div>
		<!--上课时间结束-->
		<!--上课地点开始-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4">
				<span>上课地点</span>
			</div>
			<div class="col-xs-8 sign-list-8">
				<span id="sign-time"><?php echo ($subject["location"]); ?></span>
			</div>
		</div>
		<!--上课地点结束-->
		<!--教学安排开始、-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4">
				<span>教学安排</span>
			</div>
			<div class="col-xs-8 sign-list-8">
				<span id="sign-time"><?php echo ($subject["arrange"]); ?></span>
			</div>
		</div>
		<!--教学安排结束-->
		<!--老师简介开始、-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4-introduce">
				<span>教师简介</span>
			</div>
			<div class="col-xs-8 sign-list-8-introduce">
				<span id="sign-time"><?php echo ($subject["teacher_info"]); ?></span>
			</div>
		</div>
		<!--老师简介结束-->

		<!--课程简述开始-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4-introduce">
				<span>课程简述</span>
			</div>
			<div class="col-xs-8 sign-list-8-introduce">
				<span id="sign-time"><?php echo ($subject["subject_info"]); ?></span>
			</div>
		</div>
		<a href="/school/index.php/Home/Subject/enlist/subject_id/<?php echo ($subject["subject_id"]); ?>/type/<?php echo ($type); ?>" class="am-btn am-btn-primary am-btn-block a-sing">立即报名</a>

	</div>


	<script src="/school/Public/vendor/jquery/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/vendor/amazeui/js/amazeui.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/a/js/a.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/examInfo/js/examInfo.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		//			页面跳转
		$(document).on("click", ".a-sing", function () {
			window.location.href = "../enlist/enlist.html"
		})
	</script>
</body>

</html>
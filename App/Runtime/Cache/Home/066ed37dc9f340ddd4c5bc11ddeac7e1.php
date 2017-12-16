<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>教师<?php echo ($teacher["teacher_name"]); ?>的信息</title>
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/amazeui/css/amazeui.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/a/css/a.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/teacher/css/teacher.css" />
	<style type="text/css">
		.user-head {
			background-image: url(/school/Public/assets/img/17.png);
		}
	</style>
</head>

<body>
	<!--顶部图片 加头像 开始-->
	<div class="user-head">
		<img src="/school/<?php echo ($teacher["teacher_head"]); ?>" />
		<span class="user-name"><?php echo ($teacher["teacher_name"]); ?></span>
	</div>
	<!--顶部图片 加头像 结束-->
	<!--通过info-list改变下边列表距离顶部的距离-->
	<div class="container-fluid info-list">
		<!--报名课程开始-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4">
				<span>姓名</span>
			</div>
			<div class="col-xs-8 sign-list-8">
				<span><?php echo ($teacher["teacher_name"]); ?></span>
			</div>
		</div>
		<!--报名课程结束-->
		<!--授课老师开始-->

		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4">
				<span>学历</span>
			</div>
			<div class="col-xs-8 sign-list-8">
				<span><?php echo ($teacher["teacher_level"]); ?></span>
			</div>
		</div>
		<!--授课老师结束-->
		<!--上课时间开始-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4">
				<span>毕业院校</span>
			</div>
			<div class="col-xs-8 sign-list-8">
				<span><?php echo ($teacher["teacher_home"]); ?></span>
			</div>
		</div>
		<!--上课时间结束-->
		<!--上课地点开始-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4">
				<span>毕业专业</span>
			</div>
			<div class="col-xs-8 sign-list-8">
				<span><?php echo ($teacher["teacher_major"]); ?></span>
			</div>
		</div>
		<!--上课地点结束-->
		<!--教学安排开始、-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4">
				<span>授课方向</span>
			</div>
			<div class="col-xs-8 sign-list-8">
				<span><?php echo ($teacher["teachar_direction"]); ?></span>
			</div>
		</div>
		<!--教学安排结束-->

		<!--资格证书开始-->
		<div class="row sign-all">
			<div class="col-xs-4 sign-list-4">
				<span>资格证书</span>
			</div>
			<div class="col-xs-8 sign-list-8">
				<span><?php echo ($teacher["teacher_certificate"]); ?></span>
			</div>
		</div>
		<!--资格证书结束-->

	</div>
	<script src="/school/Public/vendor/jquery/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/vendor/amazeui/js/amazeui.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/a/js/a.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/teacher/js/teacher.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>
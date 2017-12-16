<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>报名页面</title>
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/amazeui/css/amazeui.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/a/css/a.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/enlist/css/enlist.css" />
</head>

<body>

	<div class="enlist-top">
		<img src="/school/Public/assets/img/1.jpg" />
	</div>

	<div class="container-fluid">


		<?php if($_GET['type']== 3): ?><!-- 企业预约 -->

			<form id="a-form" action="" method="post">

				<input type="hidden" name="type" value='<?php echo ($_GET['type']); ?>'>
				<input type="hidden" name="subject_id" value='<?php echo ($_GET['subject_id']); ?>'>
				<input type="hidden" name="_repeat_code" value='<?php echo ($_repeat_code); ?>'>

				<div class="row sign-all">
					<div class="col-xs-4 sign-list-4">
						<span>企业名称</span>
					</div>
					<div class="col-xs-8 sign-list-8">
						<input type="text" name="firm_name" placeholder="请输入企业名称">
					</div>
				</div>
				<div class="row sign-all">
					<div class="col-xs-4 sign-list-4">
						<span>企业地址</span>
					</div>
					<div class="col-xs-8 sign-list-8">
						<input type="text" name="firm_location" placeholder="请输入企业地址">
					</div>
				</div>
				<div class="row sign-all">
					<div class="col-xs-4 sign-list-4">
						<span>联系人</span>
					</div>
					<div class="col-xs-8 sign-list-8">
						<input type="text" name="firm_people" placeholder="请输入联系人">
					</div>
				</div>
				<div class="row sign-all">
					<div class="col-xs-4 sign-list-4">
						<span>联系方式</span>
					</div>
					<div class="col-xs-8 sign-list-8">
						<input type="text" name="firm_phone" placeholder="请输入联系方式">
					</div>
				</div>

				<button type="submit" class="am-btn am-btn-primary am-btn-block a-submit">提交信息</button>
			</form>

			<?php else: ?>
			<!-- 学生报名 -->
			<form id="a-form" action="" method="post">
				<input type="hidden" name="subject_id" value='<?php echo ($_GET['subject_id']); ?>'>
				<input type="hidden" name="_repeat_code" value='<?php echo ($_repeat_code); ?>'>

				<div class="row sign-all">
					<div class="col-xs-4 sign-list-4">
						<span>姓名</span>
					</div>
					<div class="col-xs-8 sign-list-8">
						<input type="text" name="user_name" placeholder="请输入姓名">
					</div>
				</div>
				<div class="row sign-all">
					<div class="col-xs-4 sign-list-4">
						<span>性别</span>
					</div>
					<div class="col-xs-8 sign-list-8">
						<label for="">
							<input type="radio" value="男" name="user_sex">男
						</label>
						<label for="">
							<input type="radio" value="女" name="user_sex">女
						</label>
					</div>
				</div>
				<div class="row sign-all">
					<div class="col-xs-4 sign-list-4">
						<span>年龄</span>
					</div>
					<div class="col-xs-8 sign-list-8">
						<input type="text" name="user_age" placeholder="请输入年龄">
					</div>
				</div>
				<div class="row sign-all">
					<div class="col-xs-4 sign-list-4">
						<span>邮箱</span>
					</div>
					<div class="col-xs-8 sign-list-8">
						<input type="email" name="user_mail" placeholder="请输入邮箱">
					</div>
				</div>
				<div class="row sign-all">
					<div class="col-xs-4 sign-list-4">
						<span>手机号</span>
					</div>
					<div class="col-xs-8 sign-list-8">
						<input type="text" name='user_phone' placeholder="请输入手机号">
					</div>
				</div>
				<button type="submit" class="am-btn am-btn-primary am-btn-block a-submit">提交信息</button>
			</form><?php endif; ?>


	</div>
	<script src="/school/Public/vendor/jquery/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/vendor/amazeui/js/amazeui.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/a/js/a.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/enlist/js/enlist.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title><?php echo ($exam["exam_title"]); ?>课程</title>
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/amazeui/css/amazeui.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/a/css/a.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/exam/css/exam.css" />
	<style>
		.am-btn {

			background-image: url(/school/Public/assets/img/13.jpg);
		}
	</style>
</head>

<body>
	<div class="">
		<!--首页轮播开始-->
		<div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}'>
			<ul class="am-slides">
				<li>
					<img src="/school/Public/assets/img/1.jpg">
				</li>
				<li>
					<img src="/school/Public/assets/img/2.jpg">
				</li>
				<li>
					<img src="/school/Public/assets/img/17.png">
				</li>
				<li>
					<img src="/school/Public/assets/img/4.jpg">
				</li>
			</ul>
		</div>
		<!--首页轮播结束-->

		<!--标题开始-->
		<div class="exam-title" id="exam-title">
			<?php echo ($exam["exam_title"]); ?>课程
		</div>
		<!--标题结束-->

		<div class="container index-container">
			<div class="row">
				<?php if(is_array($subject)): $i = 0; $__LIST__ = $subject;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="col-xs-4">
						<a href="/school/index.php/Home/subject/subject/subject_id/<?php echo ($vol["subject_id"]); ?>/type/<?php echo ($type); ?>">
							<button type="button" class="am-btn am-btn-warning am-round"><?php echo ($vol["subject_title"]); ?></button>
						</a>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>

			</div>
		</div>
		<!--底部的图片 固定定位在底部 开始-->
		<img src="/school/Public/assets/img/17.png" class="am-img-responsive a-opacity" alt="" />
		<!--底部的图片-->
	</div>

	<script src="/school/Public/vendor/jquery/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/vendor/amazeui/js/amazeui.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/a/js/a.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/exam/js/exam.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>
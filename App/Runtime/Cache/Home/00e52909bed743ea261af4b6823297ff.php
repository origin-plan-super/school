<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/amazeui/css/amazeui.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/a/css/a.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/index/css/index.css" />
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

		<!--选项卡开始-->
		<div data-am-widget="tabs" class="am-tabs am-tabs-d2">
			<ul class="am-tabs-nav am-cf">
				<li class="am-active a-font">
					<a href="[data-tab-panel-0]">总&nbsp&nbsp&nbsp&nbsp校</a>
				</li>
				<li class="a-font">
					<a href="[data-tab-panel-1]">分&nbsp&nbsp&nbsp&nbsp校</a>
				</li>
			</ul>
			<div class="am-tabs-bd">
				<div data-tab-panel-0 class="am-tab-panel am-active">
					<div class="container index-container">
						<div class="row">

							<?php if(is_array($master)): $i = 0; $__LIST__ = $master;if( count($__LIST__)==0 ) : echo "没有相关数据" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="col-xs-4">
									<a href="/school/index.php/Home/Exam/exam/exam_id/<?php echo ($vol["exam_id"]); ?>">
										<button type="button" class="am-btn am-btn-warning am-round"><?php echo ($vol["exam_title"]); ?></button>
									</a>
								</div><?php endforeach; endif; else: echo "没有相关数据" ;endif; ?>

						</div>
					</div>
				</div>
				<div data-tab-panel-1 class="am-tab-panel ">
					<div class="container index-container">


						<div class="row">

							<?php if(is_array($branch)): $i = 0; $__LIST__ = $branch;if( count($__LIST__)==0 ) : echo "没有相关数据" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="col-xs-4">
									<a href="/school/index.php/Home/Exam/exam/exam_id/<?php echo ($vol["exam_id"]); ?>">
										<button type="button" class="am-btn am-btn-warning am-round"><?php echo ($vol["exam_title"]); ?></button>
									</a>
								</div><?php endforeach; endif; else: echo "没有相关数据" ;endif; ?>

						</div>

					</div>
				</div>
			</div>
		</div>
		<!--选项卡结束-->

		<!--底部的图片 固定定位在底部 开始-->
		<img src="/school/Public/Home/dist/images/qie.png" class="am-img-responsive a-opacity" alt="" />
		<!--底部的图片-->
	</div>
	<script src="/school/Public/vendor/jquery/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/vendor/amazeui/js/amazeui.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/a/js/a.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/index/js/index.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>
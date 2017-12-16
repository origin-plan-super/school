<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>传统礼仪</title>
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/amazeui/css/amazeui.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/a/css/a.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/tradition/css/tradition.css" />
</head>

<body>
	<!--顶部大图开始-->
	<div class="hongqiao-top">
		<img src="/school/Public/assets/img/1.jpg" />
	</div>
	<!--顶部大图结束-->

	<!--课程内容开始-->
	<div class="">
		<!--课程内容的标题开始-->
		<div class="hongqiao-title">
			<span id="">课程内容</span>
		</div>
		<!--课程内容的标题结束-->
		<!--图文详情开始-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<?php if(is_array($paper[0])): $i = 0; $__LIST__ = $paper[0];if( count($__LIST__)==0 ) : echo "没有课程内容" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="row a-hongqiao-all">
							<a href="/school/index.php/Home/Paper/show/paper_id/<?php echo ($vol["paper_id"]); ?>">
								<div class="col-xs-4 a-xs-4">
									<img src="/school/<?php echo ($vol["paper_head"]); ?>" />
								</div>
								<div class="col-xs-8 a-xs-8">
									<span id=""><?php echo ($vol["paper_title"]); ?></span>
								</div>
							</a>
						</div><?php endforeach; endif; else: echo "没有课程内容" ;endif; ?>

				</div>
			</div>
		</div>
		<!--图文详情结束-->
	</div>
	<!--课程内容结束-->

	<!--教材开始-->
	<div class="">
		<!--教材标题开始-->
		<!--教材的详情是 bookDet这个页面     每个课程详情的row里边加了一个a标签把这个图片和文字包起来包起来-->
		<div class="hongqiao-title">
			<span id="">教材</span>
		</div>
		<!--教材标题结束-->
		<!--教材开始-->
		<div class="container-fluid">
			<div class="row">

				<?php if(is_array($paper[1])): $i = 0; $__LIST__ = $paper[1];if( count($__LIST__)==0 ) : echo "没有教材" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="col-xs-6">
						<a href="/school/index.php/Home/Paper/show/paper_id/<?php echo ($vol["paper_id"]); ?>">
							<div class="book-list">
								<img src="/school<?php echo ($vol["paper_head"]); ?>" />
								<div class="goods-info">
									<div><?php echo ($vol["paper_title"]); ?></div>
								</div>
							</div>
						</a>
					</div><?php endforeach; endif; else: echo "没有教材" ;endif; ?>

			</div>
		</div>
		<!--教材结束-->
	</div>
	<!--教材结束-->

	<!--安排开始-->
	<div class="">
		<!--安排的标题开始-->
		<div class="hongqiao-title">
			<span id="">安排</span>
		</div>
		<!--安排的标题结束-->
		<!--图文详情开始-->
		<div class="container-fluid">


			<?php if(is_array($paper[2])): $i = 0; $__LIST__ = $paper[2];if( count($__LIST__)==0 ) : echo "没有安排" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="row a-hongqiao-all">
					<a href="/school/index.php/Home/Paper/show/paper_id/<?php echo ($vol["paper_id"]); ?>">
						<div class="col-xs-4 a-xs-4">
							<img src="/school/<?php echo ($vol["paper_head"]); ?>" />
						</div>
						<div class="col-xs-8 a-xs-8">
							<span id=""><?php echo ($vol["paper_title"]); ?></span>
						</div>
					</a>
				</div><?php endforeach; endif; else: echo "没有安排" ;endif; ?>



		</div>
		<!--图文详情结束-->
	</div>
	<!--安排结束-->

	<!--视频开始-->
	<div class="">
		<!--视频的标题开始-->
		<div class="hongqiao-title">
			<span id="">视频</span>
		</div>
		<!--视频的标题结束-->
		<!--视频开始-->
		<div class="container-fluid">
			<div class="row">


				<?php if(is_array($paper[3])): $i = 0; $__LIST__ = $paper[3];if( count($__LIST__)==0 ) : echo "没有视频" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="col-xs-12">

						<video controls loop>
							<source src="/school/<?php echo ($vol["video"]); ?>" type="video/mp4">
						</video>

						<p><?php echo ($vol["paper_title"]); ?></p>

					</div><?php endforeach; endif; else: echo "没有视频" ;endif; ?>


			</div>
		</div>
		<!--视频结束-->
	</div>
	<!--视频结束-->
	<script src="/school/Public/vendor/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/vendor/amazeui/js/amazeui.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/a/js/a.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/tradition/js/tradition.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>
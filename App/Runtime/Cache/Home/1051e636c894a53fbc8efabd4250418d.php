<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>虹桥面塑</title>
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/amazeui/css/amazeui.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/a/css/a.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/panel/css/panel.css" />
</head>

<body>
	<!--顶部大图开始-->
	<div class="hongqiao-top">
		<img src="/school/Public/assets/img/1.jpg" />
	</div>
	<!--顶部大图结束-->

	<!--课程简介开始-->
	<div class="">
		<!--课程简介的标题开始-->

		<!--课程简介的详情是 couDet这个页面     每个课程详情的row里边加了一个a标签把这个图片和文字包起来包起来-->
		<div class="hongqiao-title">
			<span id="">课程简介</span>
		</div>
		<!--课程简介的标题结束-->
		<!--图文详情开始-->
		<div class="container-fluid">



			<?php if(is_array($paper[0])): $i = 0; $__LIST__ = $paper[0];if( count($__LIST__)==0 ) : echo "没有课程简介" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="row a-hongqiao-all">
					<a href="/school/index.php/Home/Paper/show/paper_id/<?php echo ($vol["paper_id"]); ?>">

						<div class="col-xs-4 a-xs-4">
							<img src="/school/<?php echo ($vol["paper_head"]); ?>" />
						</div>
						<div class="col-xs-8 a-xs-8">
							<span id="">
								<?php echo ($vol["paper_title"]); ?>
							</span>
						</div>
					</a>
				</div><?php endforeach; endif; else: echo "没有课程简介" ;endif; ?>

		</div>
		<!--图文详情结束-->
	</div>
	<!--课程简介结束-->

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


				<?php if(is_array($paper[1])): $i = 0; $__LIST__ = $paper[1];if( count($__LIST__)==0 ) : echo "没有教材信息" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="col-xs-6">
						<a href="/school/index.php/Home/Paper/show/paper_id/<?php echo ($vol["paper_id"]); ?>">
							<div class="book-list">
								<img src="/school/<?php echo ($vol["paper_head"]); ?>" />
								<div class="goods-info">
									<div><?php echo ($vol["paper_title"]); ?></div>
								</div>
							</div>
						</a>
					</div><?php endforeach; endif; else: echo "没有教材信息" ;endif; ?>

			</div>

		</div>
		<!--教材结束-->
	</div>
	<!--教材结束-->

	<!--作品展示开始-->
	<div class="">
		<!--作品展示标题开始-->
		<!--作品展示的详情是 workDet这个页面     每个课程详情的row里边加了一个a标签把这个图片和文字包起来包起来-->
		<div class="hongqiao-title">
			<span id="">作品展示</span>
		</div>
		<!--作品展示的标题结束-->

		<!--列表开始-->
		<div class="container-fluid">
			<div class="row">


				<?php if(is_array($paper[2])): $i = 0; $__LIST__ = $paper[2];if( count($__LIST__)==0 ) : echo "没有作品信息" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="col-xs-6">
						<a href="/school/index.php/Home/Paper/show/paper_id/<?php echo ($vol["paper_id"]); ?>">
							<div class="book-list">
								<img src="/school/<?php echo ($vol["paper_head"]); ?>" />
								<div class="goods-info">
									<div><?php echo ($vol["paper_title"]); ?></div>
								</div>
							</div>
						</a>
					</div><?php endforeach; endif; else: echo "没有作品信息" ;endif; ?>








			</div>
		</div>
		<!--列表结束-->
	</div>
	<!--作品展示结束-->
	<script src="/school/Public/vendor/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/vendor/amazeui/js/amazeui.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/a/js/a.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/panel/js/panel.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>独具匠心</title>

	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/amazeui/css/amazeui.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/a/css/a.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/originality/css/originality.css" />

</head>

<body>
	<!--顶部大图开始-->
	<div class="hongqiao-top">
		<img src="/school/Public/assets//img/1.jpg" />
	</div>
	<!--顶部大图结束-->

	<!--课程简介开始-->
	<div class="">
		<!--学员作品集的标题开始-->
		<div class="hongqiao-title">
			<span id="">学员作品集</span>
		</div>
		<!--学员作品集的标题结束-->

		<!--图文详情开始-->
		<div class="container-fluid">

			<?php if(is_array($paper)): $i = 0; $__LIST__ = $paper;if( count($__LIST__)==0 ) : echo "没有学员作品！" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="row a-hongqiao-all">
					<a href="/school/index.php/Home/Paper/show/paper_id/<?php echo ($vol["paper_id"]); ?>">
						<div class="col-xs-4 a-xs-4">
							<img src="/school/<?php echo ($vol["paper_head"]); ?>" />
						</div>
						<div class="col-xs-8 a-xs-8">
							<span id=""><?php echo ($vol["paper_title"]); ?></span>
						</div>
					</a>
				</div><?php endforeach; endif; else: echo "没有学员作品！" ;endif; ?>

		</div>
		<!--图文详情结束-->
	</div>

	<script src="/school/Public/vendor/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/vendor/amazeui/js/amazeui.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/a/js/a.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/originality/js/originality.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title><?php echo ($title); ?></title>
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/amazeui/css/amazeui.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/icon/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/a/css/a.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/ebook-list/css/ebook-list.css" />

</head>

<body>

	<!--顶部大图 开始-->
	<div class="a-top">
		<img src="/school/Public/assets/img/1.jpg" class="am-img-responsive a-opacity" alt="" />
		<form action="" method="">
			<div class="a-sousuo">
				<div class="col-xs-10">
					<div class="am-form-group am-form-warning">
						<input type="text" class="am-form-field" name="key" placeholder="搜索" autocomplete="off">
					</div>
				</div>
				<div class="col-xs-2">
					<button type="submit" class="iconfont icon-fangdajing dis-button"></button>
				</div>
			</div>
		</form>
	</div>

	<!--顶部大图结束-->

	<!--选项卡开始-->
	<div data-am-widget="tabs" class="am-tabs am-tabs-default" ;style="margin-top:167.39px">
		<!--三个顶部选项卡开始-->
		<ul class="am-tabs-nav am-cf">
			<li class="am-active a-li-1">
				<a href="[data-tab-panel-0]"><?php echo ($book_class[0]["book_class_title"]); ?></a>
			</li>
			<li class="a-li-2">
				<a href="[data-tab-panel-1]"><?php echo ($book_class[1]["book_class_title"]); ?></a>
			</li>
			<li class="a-li-3">
				<a href="[data-tab-panel-2]"><?php echo ($book_class[2]["book_class_title"]); ?></a>
			</li>
		</ul>
		<!--三个顶部选项卡结束-->

		<!--选项卡下边的对应内容的开始-->
		<div class="am-tabs-bd">
			<!--第一个内容的开始-->
			<div data-tab-panel-0 class="am-tab-panel am-active">
				<div class="container-fluid">

					<?php if(is_array($book[0])): $i = 0; $__LIST__ = $book[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="/school/index.php/Home/Book/ebook/book_id/<?php echo ($vol["book_id"]); ?>">
							<div class="row a-all">
								<div class="col-xs-3 a-list3">
									<img class="" src="/school/<?php echo ($vol["book_head"]); ?>" />
								</div>
								<div class="col-xs-9 a-list9">
									<span class="a-title"><?php echo ($vol["book_title"]); ?></span>
									<span class="a-info"><?php echo (htmlspecialchars_decode($vol["book_author"])); ?></span>
								</div>
							</div>
						</a><?php endforeach; endif; else: echo "" ;endif; ?>

					<!--搜索不到的样式  开始  样式在a.css里边-->
					<div class="a-empty active">
						<div class="a-empty-body">
							<i class="fa fa-book a-empty-icon"></i>
							<div class="a-empty-title">
								没有更多内容了
							</div>
						</div>
					</div>
					<!--搜索不到的样式  结束  样式在a.css里边-->
				</div>
			</div>
			<!--第一个内容的结束-->

			<!--第二个内容的开始-->
			<div data-tab-panel-1 class="am-tab-panel ">
				<div class="container-fluid">
					<!--a标签跳转开始-->
					<?php if(is_array($book[1])): $i = 0; $__LIST__ = $book[1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="/school/index.php/Home/Book/ebook/book_id/<?php echo ($vol["book_id"]); ?>">
							<div class="row a-all">
								<div class="col-xs-3 a-list3">
									<img class="" src="/school/<?php echo ($vol["book_head"]); ?>" />
								</div>
								<div class="col-xs-9 a-list9">
									<span class="a-title"><?php echo ($vol["book_title"]); ?></span>
									<span class="a-info"><?php echo (htmlspecialchars_decode($vol["book_author"])); ?></span>
								</div>
							</div>
						</a><?php endforeach; endif; else: echo "" ;endif; ?>
					<!--a标签跳转结束-->
					<!--搜索不到的样式  开始  样式在a.css里边-->
					<div class="a-empty active">
						<div class="a-empty-body">
							<i class="fa fa-book a-empty-icon"></i>
							<div class="a-empty-title">
								没有更多内容了
							</div>
						</div>
					</div>
					<!--搜索不到的样式  结束  样式在a.css里边-->
				</div>
			</div>
			<!--第二个内容的结束-->

			<!--第三个内容的开始  标题a-title分两行 就a-title的用两个-->
			<div data-tab-panel-2 class="am-tab-panel ">
				<div class="container-fluid">
					<!--a标签的跳转 开始-->
					<?php if(is_array($book[2])): $i = 0; $__LIST__ = $book[2];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="/school/index.php/Home/Book/ebook/book_id/<?php echo ($vol["book_id"]); ?>">
							<div class="row a-all">
								<div class="col-xs-3 a-list3">
									<img class="" src="/school/<?php echo ($vol["book_head"]); ?>" />
								</div>
								<div class="col-xs-9 a-list9">
									<span class="a-title"><?php echo ($vol["book_title"]); ?></span>
									<span class="a-info"><?php echo (htmlspecialchars_decode($vol["book_author"])); ?></span>
								</div>
							</div>
						</a><?php endforeach; endif; else: echo "" ;endif; ?>
					<!--a标签的跳转 结束-->
					<!--搜索不到的样式  开始  样式在a.css里边-->
					<div class="a-empty active">
						<div class="a-empty-body">
							<i class="fa fa-book a-empty-icon"></i>
							<div class="a-empty-title">
								没有更多内容了
							</div>
						</div>
					</div>
					<!--搜索不到的样式  结束  样式在a.css里边-->
				</div>
			</div>
			<!--第三个内容的结束-->
		</div>
		<!--选项卡对应内容的结束-->
	</div>
	<!--选项卡结束-->
	<script src="/school/Public/vendor/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/vendor/amazeui/js/amazeui.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/a/js/a.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/ebook-list/js/ebook-list.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>
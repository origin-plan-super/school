<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="google" content="notranslate">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>电子书</title>
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/vendor/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/a/css/a.css" />
	<link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/ebook/css/ebook.css" />
	<script src="/school/Public/vendor/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>

	<style>
		.modal-backdrop {
			z-index: 0;
		}

		#home {
			word-wrap: unset;
			overflow: auto;
		}

		.modal-content {
			border: none;
		}
	</style>
</head>

<body>
	<!--最外层的div开始-->
	<div class="ebook-all">
		<div class="container-fluid detail-all">
			<!--顶部的图片和右侧信息  开始-->
			<div class="col-xs-12 detail-top">
				<div class="col-xs-3">
					<img src="/school/<?php echo ($book["book_head"]); ?>" />
				</div>
				<div class="col-xs-9 detail-9">
					<span class="a-title"><?php echo ($book["book_title"]); ?></span>
					<!--a.css里边有让a-name样式两行之后是省略号的-->
					<!-- <p class="a-info">编著：丁大头 丁晓头</p>
						<p class="a-info">副主编：工时费 那才叫</p>
						<p class="a-info">参编:李孝友&nbsp&nbsp李孝友&nbsp&nbsp丁晓头&nbsp&nbsp丁晓头</p> -->
					<div class="a-name" id="book_author">
						<?php echo (htmlspecialchars_decode($book["book_author"])); ?>
					</div>

				</div>
			</div>
			<!--顶部的图片和右侧信息  结束-->
			<div>
				<!--下边两个选项卡开始-->
				<div class="">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<!--a标签添加的id是用于修改框架中的样 式   id="ebook-title-1"-->
							<a href="#home" aria-controls="home" role="tab" data-toggle="tab" id="ebook-title-1">内容简介</a>
						</li>
						<li role="presentation">
							<!--a标签添加的id是用于修改框架中的样 式   id="ebook-title-2"-->
							<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" id="ebook-title-2">出版信息</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<!--第一个开始-->
						<div role="tabpanel" class="tab-pane active detail-one-list" id="home">
							<?php echo (htmlspecialchars_decode($book["book_info"])); ?>
						</div>

						<!--第一个结束-->

						<!--第二个开始-->
						<div role="tabpanel" class="tab-pane" id="profile" style="padding:5px 10px">
							<?php echo (htmlspecialchars_decode($book["book_info_2"])); ?>
						</div>
						<!--第二个结束、-->
					</div>
				</div>
				<!--下边两个选项卡结束-->
			</div>

			<!--内容目录开始-->
			<div class="content">
				内容目录
			</div>
			<!--内容目录结束-->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 detail-12">
						<!--1.概述   开始-->
						<div>
							<ul>
								<!--1.title-head 这个类名是显示第一个标题的样式 左边右边padding减小-->
								<!--2.pdf-display 这个类是用来点击x跳转pdf页面的类名-->

								<?php if(is_array($book["book_list"])): $i = 0; $__LIST__ = $book["book_list"];if( count($__LIST__)==0 ) : echo "此电子书没有内容！" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i; if($vol["type"] == 'audio'): ?><li class='li-item audio-display <?php if($vol["is_head"] == 1): ?>title-head<?php endif; ?>' data-src="/school/<?php echo ($vol["file_src"]); ?>">
											<span><?php echo ($vol["title"]); ?></span>

											<i class="fa fa-play fr"></i>
											<audio controls class="audio-item"></audio>
										</li><?php endif; ?>

									<?php if($vol["type"] == 'video'): ?><li class='li-item video-display <?php if($vol["is_head"] == 1): ?>title-head<?php endif; ?>' data-src="/school/<?php echo ($vol["file_src"]); ?>">
											<span><?php echo ($vol["title"]); ?></span>
											<i class="fa fa-play fr"></i>
										</li><?php endif; ?>
									<?php if($vol["type"] == pdf): ?><li class='li-item <?php if($vol["is_head"] == 1): ?>title-head<?php endif; ?> pdf-display' data-src="/school/<?php echo ($vol["file_src"]); ?>">
											<span><?php echo ($vol["title"]); ?></span>
											<i class="fa fa-play fr"></i>
										</li><?php endif; endforeach; endif; else: echo "此电子书没有内容！" ;endif; ?>

							</ul>
						</div>
						<!--1.概述结束-->
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--最外层的div结束-->

	<!--模态框  开始-->
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="_modal">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" z-index='99999999999'>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<video width="320" src="" height="240" controls id="video">
						<source type="video/mp4">
					</video>
				</div>
			</div>

		</div>
	</div>
	<!--模态框结束-->

	<script src="/school/Public/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/a/js/a.js" type="text/javascript" charset="utf-8"></script>
	<script src="/school/Public/Home/dist/ebook/js/ebook.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function () {
			//			pdf
			$(document).on("click", ".pdf-display", function () {
				var src = $(this).attr('data-src');
				var title = $(this).find('span').text();
				localStorage.pdf_url = src;
				localStorage.pdf_title = title;


				window.location.href = "/school/index.php/Home/Book/pdf";
			})
			//			视频
			$(document).on("click", ".video-display", function () {

				var src = $(this).attr('data-src');


				$("#video").attr('src', src);

				var $this = $(this);


				$('.modal-title').text($this.find('span').text());
				$("#_modal").modal('show');


			})

			$('#myModal').on('hide.bs.modal', function (e) {

				$("#video").attr('src', '');

			})

			//			音频
			$(document).on("click", ".audio-display", function () {

				var src = $(this).attr('data-src');

				var _src = $(this).find("audio").attr('src');


				$("audio").each(function (index) {
					this.pause();
				});


				if (_src == "" || _src == null) {
					$(this).find("audio").attr('src', src);
				}


				$(this).siblings().removeClass("active");
				$(this).toggleClass("active");


				//控制暂停 播放的符号
				$(this).siblings().find(".fa").addClass("fa-play");
				$(this).siblings().find(".fa").removeClass("fa-pause");
				$(this).find("i").toggleClass("fa-play");
				$(this).find("i").toggleClass("fa-pause");


			})

		})

		$('#home *').each(function (params) {
			$(this).removeAttr('style');
		});
		$('#profile *').each(function (params) {
			$(this).removeAttr('style');
		});
		$('#book_author *').each(function (params) {
			$(this).removeAttr('style');
		});

	</script>
</body>

</html>
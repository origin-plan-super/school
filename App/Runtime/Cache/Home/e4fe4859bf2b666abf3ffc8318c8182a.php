<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php echo ($paper["paper_title"]); ?></title>
    <link rel="stylesheet" type="text/css" href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/school/Public/vendor/amazeui/css/amazeui.css" />
    <link rel="stylesheet" type="text/css" href="/school/Public/Home/dist/a/css/a.css" />
</head>

<body>

    <div class="container-fluid">
        <!--顶部的大图开始-->
        <div class="row">
            <div class="col-xs-12 det-12">
                <div class="p-0 m-0 goods-list" data-am-widget="paragraph" data-am-paragraph="{ tableScrollable: true, pureview: true }">
                    <img src="/school/Public/assets/img/1.jpg" />
                </div>
            </div>
        </div>
        <!--顶部的大图结束-->
        <div class="row" style="padding:10px" data-am-widget="paragraph" data-am-paragraph="{ tableScrollable: true, pureview: true }">
            <!--作品的详情开始-->
            <!--每一个作品下边都有这个人的名字和时间 还有文字的详情-->
            <?php echo (htmlspecialchars_decode($paper["content"])); ?>
            <!--作品的详情结束-->
        </div>
    </div>



    <script src="/school/Public/vendor/jquery/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/school/Public/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/school/Public/vendor/amazeui/js/amazeui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/school/Public/Home/dist/a/js/a.js" type="text/javascript" charset="utf-8"></script>
    <script src="/school/Public/Home/dist/stuDet/js/stuDet.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>
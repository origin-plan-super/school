<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>虹桥镇社区学校管理系统</title>
    <!-- css -->
<link href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/school/Public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/school/Public/vendor/animate/animate.css" rel="stylesheet" type="text/css">
<link href="/school/Public/vendor/spinkit/spinkit.css" rel="stylesheet" type="text/css">
<link href="/school/Public/vendor/layui/css/layui.css" rel="stylesheet" type="text/css">


<!-- js -->
<script src="/school/Public/vendor/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="/school/Public/vendor/vue/vue.js"></script>
<script src="/school/Public/vendor/layer/layer.js"></script>
<script src="/school/Public/vendor/layui/layui.js"></script>

<script src="/school/Public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--  -->
<script src='/school/Public/vendor/mTips/mTips.js'></script>

<script src="/school/Public/Admin/dist/tool/tool.js"></script>

<style>
    /* .save-tool {
        position: fixed;
        right: 10px;
        bottom: 80px;
    }

    .save-tool .layui-btn {
        background-color: rgba(0, 0, 0, 0.8);
        height: 50px;
        line-height: 50px;
        text-align: center;
        color: #eee;
    } */

    body {}

    .layui-black {
        /* border-radius: 1px; */
        color: #fff;
        text-align: center;
        background-color: #41464b;
        background-color: #666;
        transition: all 0.2s;
    }


    .layui-black:hover {
        background-color: #41464b;
        background-color: #666;
        opacity: 1;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, .5);
    }

    .layui-btn-danger {
        background-color: rgb(253, 51, 51);
    }

    .layui-btn-danger:hover {
        background-color: rgb(253, 51, 51);
        box-shadow: 0 2px 6px 0 rgba(253, 51, 51, .5);
    }

    .form-black .layui-laypage .layui-laypage-curr .layui-laypage-em {
        background-color: #41464b;
        background-color: #666;
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, .5);
    }

    .form-black .layui-laypage a:hover {
        color: #777;
        text-shadow: 0 0 2px rgba(0, 0, 0, .2);
    }

    .layui-link {
        background-color: transparent;
        color: #333333;
    }

    .tooltip {
        z-index: 99999;
    }

    .layui-form-checked[lay-skin=primary] i {
        border-color: #41464b;
        border-color: #666;
        background-color: #41464b;
        background-color: #666;
        color: #fff;
    }

    .layui-form-checkbox[lay-skin=primary]:hover i {
        border-color: #41464b;
        border-color: #666;
        color: #fff;
    }

    .layui-ss {
        text-align: right;
    }

    .layui-input-sm {
        height: 30px;
        line-height: 30px;
        padding: 0 10px;
        font-size: 12px;
    }
</style>

<script>

    function getLocalTime(nS) {
        return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/, ' ');
    }

    function saveInfo(save, f) {
        (function () {
            var url = '/school/index.php/Admin/Use/saveField';
            var obj = save;
            var fun = function (res) {

                try {
                    res = JSON.parse(res);
                } catch (error) {
                    //转换错误
                    layer.msg('异步接口出错！', {
                        anim: 6
                    });
                    return
                }


                if (f != null) {
                    f(res);
                    return;
                }
                if (res.res > 0) {
                    layer.msg('修改成功！');
                } else {
                    layer.msg('修改失败：' + res.msg, {
                        anim: 6
                    });
                }


            };
            $.post(url, obj, fun);

        }());

    }
    function del(delObj, f) {

        (function () {

            var url = '/school/index.php/Admin/Use/del';
            var obj = delObj;
            var fun = function (res) {

                try {
                    res = JSON.parse(res);
                } catch (error) {
                    //转换错误
                    layer.msg('异步接口出错！', {
                        anim: 6
                    });
                    return
                }
                if (res.res > 0) {
                    layer.msg('删除成功！');
                    if (f != null) {
                        f(res);
                    }

                } else {
                    layer.msg('删除失败：' + res.msg, {
                        anim: 6
                    });
                }
            };
            $.post(url, obj, fun);

        }());
    }

    function delAll(obj, f) {

        (function () {

            var url = '/school/index.php/Admin/Use/delAll';
            var fun = function (res) {

                try {
                    res = JSON.parse(res);
                } catch (error) {
                    //转换错误
                    layer.msg('异步接口出错！', {
                        anim: 6
                    });
                    return
                }

                if (res.res > 0) {
                    layer.msg('删除成功！');
                    if (f != null) {
                        f(res);
                    }


                } else {
                    layer.msg('删除失败：' + res.msg, {
                        anim: 6
                    });
                }
            };
            $.post(url, obj, fun);

        })();

    }
    //将字符串按照格式转化成数组或者json
    function strToArr(str, code, f) {

        var array = str.split(code);
        var arr = [];

        for (var i = 0; i < array.length; i++) {
            var element = array[i];
            if (f != null) {

                if (typeof (f) == 'string') {
                    arr[i] = {};
                    arr[i][f] = element;

                } else {
                    arr[i] = f(i, arr, element);
                }


            } else {
                arr[i] = element;
            }
        }
        return arr;

    }


    //回调控制
    var callback = function () {
        this._no;
        this._yes;
        this.yes = function (f) {
            this._yes = f;
            return this;
        };
        this.no = function (f) {
            this._no = f;
            return this;
        };
    }

    function addAll(obj) {

        var _callback = new callback();

        (function () {

            var url = '/school/index.php/Admin/Use/addAll';
            var fun = function (res) {

                try {
                    res = JSON.parse(res);
                    _callback._yes(res);
                } catch (error) {
                    //异步接口出错！
                    e(error);
                    _callback._no(res);
                }

            };
            $.post(url, obj, fun);

        }());

        return _callback;

    }

    var HtmlUtil = {
        /*1.用浏览器内部转换器实现html转码*/
        htmlEncode: function (html) {
            //1.首先动态创建一个容器标签元素，如DIV
            var temp = document.createElement("div");
            //2.然后将要转换的字符串设置为这个元素的innerText(ie支持)或者textContent(火狐，google支持)
            (temp.textContent != undefined) ? (temp.textContent = html) : (temp.innerText = html);
            //3.最后返回这个元素的innerHTML，即得到经过HTML编码转换的字符串了
            var output = temp.innerHTML;
            temp = null;
            return output;
        },
        /*2.用浏览器内部转换器实现html解码*/
        htmlDecode: function (text) {
            //1.首先动态创建一个容器标签元素，如DIV
            var temp = document.createElement("div");
            //2.然后将要转换的字符串设置为这个元素的innerHTML(ie，火狐，google都支持)
            temp.innerHTML = text;
            //3.最后返回这个元素的innerText(ie支持)或者textContent(火狐，google支持)，即得到经过HTML解码的字符串了。
            var output = temp.innerText || temp.textContent;
            temp = null;
            return output;
        }
    };



    function Base64() {

        // private property  
        _keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
        // public method for encoding  
        this.encode = function (input) {
            var output = "";
            var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
            var i = 0;
            input = _utf8_encode(input);
            while (i < input.length) {
                chr1 = input.charCodeAt(i++);
                chr2 = input.charCodeAt(i++);
                chr3 = input.charCodeAt(i++);
                enc1 = chr1 >> 2;
                enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                enc4 = chr3 & 63;
                if (isNaN(chr2)) {
                    enc3 = enc4 = 64;
                } else if (isNaN(chr3)) {
                    enc4 = 64;
                }
                output = output +
                    _keyStr.charAt(enc1) + _keyStr.charAt(enc2) +
                    _keyStr.charAt(enc3) + _keyStr.charAt(enc4);
            }
            return output;
        }

        // public method for decoding  
        this.decode = function (input) {
            var output = "";
            var chr1, chr2, chr3;
            var enc1, enc2, enc3, enc4;
            var i = 0;
            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
            while (i < input.length) {
                enc1 = _keyStr.indexOf(input.charAt(i++));
                enc2 = _keyStr.indexOf(input.charAt(i++));
                enc3 = _keyStr.indexOf(input.charAt(i++));
                enc4 = _keyStr.indexOf(input.charAt(i++));
                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;
                output = output + String.fromCharCode(chr1);
                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }
            }
            output = _utf8_decode(output);
            return output;
        }

        // private method for UTF-8 encoding  
        _utf8_encode = function (string) {
            string = string.replace(/\r\n/g, "\n");
            var utftext = "";
            for (var n = 0; n < string.length; n++) {
                var c = string.charCodeAt(n);
                if (c < 128) {
                    utftext += String.fromCharCode(c);
                } else if ((c > 127) && (c < 2048)) {
                    utftext += String.fromCharCode((c >> 6) | 192);
                    utftext += String.fromCharCode((c & 63) | 128);
                } else {
                    utftext += String.fromCharCode((c >> 12) | 224);
                    utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                    utftext += String.fromCharCode((c & 63) | 128);
                }

            }
            return utftext;
        }

        // private method for UTF-8 decoding  
        _utf8_decode = function (utftext) {
            var string = "";
            var i = 0;
            var c = c1 = c2 = 0;
            while (i < utftext.length) {
                c = utftext.charCodeAt(i);
                if (c < 128) {
                    string += String.fromCharCode(c);
                    i++;
                } else if ((c > 191) && (c < 224)) {
                    c2 = utftext.charCodeAt(i + 1);
                    string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                    i += 2;
                } else {
                    c2 = utftext.charCodeAt(i + 1);
                    c3 = utftext.charCodeAt(i + 2);
                    string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                    i += 3;
                }
            }
            return string;
        }
    }
    $(function () {

        $(document).on('mouseenter', '[title]', function (params) {

            var tips = $(this).attr('data-tips') ? $(this).attr('data-tips') : '3';
            var color = $(this).attr('data-color') ? $(this).attr('data-color') : '#666';

            layer.tips(this.title, this, {
                tips: [tips, color]
            });

        });
        $(document).on('mouseleave', '[title]', function (params) {
            layer.closeAll('tips')
        });

    })


</script>
    <link href="/school/Public/Admin/dist/index/index.css" rel="stylesheet" type="text/css">

    <style>
    </style>
</head>

<body>
    <div class="o-nav">
        <div class="o-nav-left">

            <div class="o-nav-item">
                <a href="javascript:;" data-src='Index/home'>
                    <i class="fa fa-home fa-fw"></i>
                    首页
                </a>

            </div>
            <div class="o-nav-item">
                <a href="javascript:;">
                    <i class="fa fa-mortar-board fa-fw"></i>
                    课程页面
                </a>
                <div class="o-nav-item-s">
                    <ul>
                        <li>
                            <a href='<?php echo U("home/index/index");?>' target="_blank">
                                <i class="fa fa-mortar-board fa-fw"></i>
                                首页
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo U("home/build/build");?>' target="_blank">
                                <i class="fa fa-mortar-board fa-fw"></i>
                                楼宇
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="o-nav-item">
                <a href="javascript:;">
                    <i class="fa fa-book fa-fw"></i>
                    学习大厅
                </a>
                <div class="o-nav-item-s">
                    <ul>
                        <li>
                            <a href='<?php echo U("home/book/showList","type=1");?>' target="_blank">
                                <i class="fa fa-book fa-fw"></i>
                                看书坊
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo U("home/book/showList","type=2");?>' target="_blank">
                                <i class="fa fa-volume-down fa-fw"></i>
                                听书吧
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo U("home/book/showList","type=3");?>' target="_blank">
                                <i class="fa fa-youtube-play fa-fw"></i>
                                微课堂
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="o-nav-item">
                <a href="javascript:;">
                    <i class="fa fa-file-text fa-fw"></i>
                    好学虹桥
                </a>
                <div class="o-nav-item-s">
                    <ul>
                        <li>
                            <a href='<?php echo U("home/paper/panel");?>' target="_blank">
                                <!-- <i class="fa fa-bell fa-fw"></i> -->
                                虹桥面塑
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo U("home/paper/tradition");?>' target="_blank">
                                <!-- <i class="fa fa-bell fa-fw"></i> -->
                                传统礼仪
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo U("home/paper/originality");?>' target="_blank">
                                <!-- <i class="fa fa-bell fa-fw"></i> -->
                                独具匠心
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="o-nav-right">
            <div class="o-nav-item">
                <a href="javascript:;" data-src=' '>
                    <!-- <i class="fa fa-home"></i> -->
                    <img src="/school/<?php echo (session('admin_head_img')); ?>" alt=""><?php echo (session('admin_name')); ?>
                    <span class="spot spot-danger"></span>
                </a>
                <div class="o-nav-item-s">
                    <ul>
                        <li>
                            <a href="">
                                <i class="fa fa-bell fa-fw"></i>
                                消息
                                <span class="spot spot-danger"></span>
                            </a>
                        </li>
                        <li>
                            <a href="" data-src='Config/user '>
                                <i class="fa fa-cog fa-fw"></i>
                                个人设置
                            </a>
                        </li>
                        <li class="line"></li>
                        <li>
                            <a href="/school/index.php/Admin/Login/sinOut">
                                <i class="fa fa-sign-out fa-fw"></i>
                                退出登录
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="o-nav-list">

        <div class="o-nav-item">
            <a href="" class="o-nav-logo">
                <!-- <i class="fa fa-home"></i> -->
                虹桥镇社区学校
            </a>

        </div>

        <div class="o-nav-item">
            <a href="" class="">
                <i class="fa fa-mortar-board fa-fw"></i>
                科目管理
            </a>
            <div class="o-nav-list-s">
                <ul>
                    <li>
                        <a href="javascript:;" data-src='school/showList/school_id/1 '>
                            <i class="fa fa-mortar-board fa-fw"></i>
                            总校
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-src='school/showList/school_id/2 '>
                            <i class="fa fa-mortar-board fa-fw"></i>
                            分校
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-src='school/showList/school_id/3 '>
                            <i class="fa fa-mortar-board fa-fw"></i>
                            楼宇
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="o-nav-item">
            <a href="" class="">
                <i class="fa fa-id-card fa-fw"></i>
                师资管理
            </a>
            <div class="o-nav-list-s">
                <ul>
                    <li>
                        <a href="javascript:;" data-src='teacher/showList '>
                            <i class="fa fa-id-card fa-fw"></i>
                            师资列表
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="o-nav-item">
            <a href="" class="">
                <i class="fa fa-book fa-fw"></i>
                电子书管理
            </a>
            <div class="o-nav-list-s">

                <ul>
                    <li>
                        <a href="javascript:;" data-src='Book/bookClass '>
                            <i class="fa fa-tags fa-fw"></i>
                            电子书分类列表
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-src='Book/showList '>
                            <i class="fa fa-book fa-fw"></i>
                            电子书列表
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="o-nav-item">
            <a href="" class="">
                <i class="fa fa-file-text fa-fw"></i>
                图文详情管理
            </a>
            <div class="o-nav-list-s">

                <ul>
                    <li>
                        <a href="/school/index.php/Admin/Paper/add" target="_black" ddata-src='Paper/add '>
                            <i class="fa fa-plus fa-fw"></i>
                            发布文章
                        </a>
                    </li>
                    <li>
                        <a href="" data-src='Paper/showList '>
                            <i class="fa fa-file-text fa-fw"></i>
                            文章列表
                        </a>
                    </li>

                    <!-- <li>
                        <a href="javascript:;" data-src='Pages/showList '>
                            <i class="fa fa-desktop fa-fw"></i>
                            页面管理
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-src='info/showList/pages_id/1 '>
                            <i class="fa fa-file-text fa-fw"></i>
                            <span id="pages1"><?php echo ($pages1); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-src='info/showList/pages_id/2 '>
                            <i class="fa fa-file-text fa-fw"></i>
                            <span id="pages2"><?php echo ($pages2); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-src='info/showList/pages_id/3 '>
                            <i class="fa fa-file-text fa-fw"></i>
                            <span id="pages3"><?php echo ($pages3); ?></span>
                        </a>
                    </li> -->
                </ul>

            </div>
        </div>



        <div class="o-nav-item">
            <a href="" class="">
                <i class="glyphicon glyphicon-list-alt"></i>
                报名预约管理
            </a>
            <div class="o-nav-list-s">
                <ul>
                    <li>
                        <a href="javascript:;" data-src='Order/showList '>
                            <i class="glyphicon glyphicon-list-alt"></i>
                            报名列表
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-src='Firm/showList '>
                            <i class="glyphicon glyphicon-briefcase"></i>
                            企业预约
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="o-nav-item" id="vo">
            <a href="javascript:;">
                <i class="fa fa-cogs fa-fw"></i>
                系统设置
            </a>
            <div class="o-nav-list-s">
                <ul>
                    <li>
                        <a href="javascript:;" data-src='Config/showList '>
                            <i class="fa fa-id-card"></i>
                            管理员管理
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-src=' '>
                            <i class="fa fa-pie-chart"></i>
                            统计
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-src=' '>
                            <i class="fa fa-info-circle"></i>
                            关于
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="footer">
            <a href="">上海 © 信久网络</a>
        </div>
    </div>

    <div class="o-iframe-box">
        <iframe id="iframe" name="iframe" src="" frameborder="0"></iframe>
    </div>


    <script src="/school/Public/Admin/dist/index/index.js"></script>
    <script>


        srcEvent.config.url = "/school/index.php/Admin";
        srcEvent.init();
        window['a '] = 1;

    </script>

</body>

</html>
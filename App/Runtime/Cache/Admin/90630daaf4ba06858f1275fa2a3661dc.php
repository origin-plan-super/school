<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css -->
<link href="/school/Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/school/Public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/school/Public/vendor/animate/animate.css" rel="stylesheet" type="text/css">
<link href="/school/Public/vendor/spinkit/spinkit.css" rel="stylesheet" type="text/css">
<link href="/school/Public/vendor/layui/css/layui.css" rel="stylesheet" type="text/css">


<!-- js -->
<script src="/school/Public/vendor/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="/school/Public/vendor/jqueryUI/jqueryUI.js" type="text/javascript" charset="utf-8"></script>
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

    .layui-form-select dl dd.layui-this {
        background-color: #666;
        color: #fff;
    }

    /* a:focus,
    a:active,
    a:visited {} */
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
    }

    function delAll(obj, f) {


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

    }



    /**
     * 创建时间：2017年9月15日 18:31:36
     * 修改时间：2017年9月15日 18:31:36
     * ===========================================
     * 作者：代码狮
     * ===========================================
     * QQ：1173197065
     * 微信：ajs0314
     * GitHub：https://github.com/ALNY-AC
     * ===========================================
     * 如发现有bug，请速联系作者。
     * 后来者不懂的地方，请联系作者。
     * ===========================================
     * 因为客户浏览器不统一，所以不实用es6语法
     * ===========================================
     * @author 代码狮
     * @param str string 必须，要转换的字符串，比如：1,2,3 或者1 2 3 或者 1|2|3|，分隔符自定。
     * @param code string 必须，要当做分隔符的字符串，自定。
     * @param f function|string 必须，当为string的时候，为指定键名，当为function的时候，则为调用函数
     */
    function strToArr(str, code, f) {

        // 将字符串按照code分割成数组
        var array = str.split(code);
        // 创建一个空数组，用于返回
        var arr = [];

        // 开始str分割后的数组
        for (var i = 0; i < array.length; i++) {
            // 获得每个元素
            var item = array[i];
            // 当f函数 不为空的时候
            if (f != null) {

                // 判断是不是字符串
                if (typeof (f) == 'string') {
                    //如果是字符串
                    arr[i] = {};        //创建一个json
                    arr[i][f] = item;   //让f当做键名，直接将item赋值给他
                }
                //判断是不是函数
                if (typeof (f) == 'function') {
                    //当f为function的时候
                    //调用这个函数，并且传值进去
                    /**
                    //  * @param i int 当前循环的索引值
                    //  * @param arr array 当前的这个数组
                    //  * @param item string str分割后的数组的元素
                     */
                    arr[i] = f(i, arr, item);
                }


            } else {
                arr[i] = item;
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
            return false;

        });
        $(document).on('mouseleave', '[title]', function (params) {
            layer.closeAll('tips');
            return false;
        });

    })


</script>
    <link href="/school/Public/Admin/dist/ctos/ctos.css" rel="stylesheet" type="text/css">
    <link href="/school/Public/Admin/dist/book/book.css" rel="stylesheet" type="text/css">
    <link href="/school/Public/vendor/summernote/summernote.css" rel="stylesheet" type="text/css">

    <style>
        body {
            padding: 15px;
            padding-top: 0;
            padding-bottom: 500px;
        }

        .o-panel {
            box-shadow: 0 1px 5px 1px rgba(0, 0, 0, 0.1);
        }

        #book_head_img {
            max-width: 200px;
            border-radius: 7px;
        }

        .placeholder {
            background-color: #ddd;
            border: #666 dashed 3px;
            margin: 10px 0;
            height: 50px;
            width: 100%;
            display: block;
        }
    </style>

    <title>【<?php echo ($book["book_title"]); ?>】的创作</title>
</head>

<body>
    <!-- 写作 -->

    <div class="page-header">
        <h1 class='text-muted'><?php echo ($book["book_title"]); ?>
            <small>创作</small>
        </h1>
    </div>

    <ol class="breadcrumb">
        <li>
            电子书管理
        </li>
        <li>
            电子书列表
        </li>
        <li class="active">【<?php echo ($book["book_title"]); ?>】的创作</li>

    </ol>


    <div class="_box">

        <div class="o-panel">
            <div class="o-panel-head">
                <div class="o-panel-title">
                    发布文章
                </div>
            </div>
            <div class="o-panel-body">

                <form class="layui-form">
                    <div class="form-group">
                        <label>文章标题</label>
                        <input type="text" value="<?php echo ($book["book_title"]); ?>" autocomplete="off" class="o-form-control" name="book_title" placeholder="文章标题">
                    </div>
                    <div class="form-group" id="is_head">
                        <label>封面图</label>
                        <button type='button' class="layui-btn layui-black" id="upload_head">
                            <i class="layui-icon">&#xe67c;</i>
                            上传封面图（最大8M）
                        </button>
                    </div>
                    <div class="form-group" id="is_head">
                        <label> </label>
                        <img src="/school/<?php echo ($book["book_head"]); ?>" alt="请上传图片" id="book_head_img">
                        <input type="hidden" name="book_head" value='<?php echo ($book["book_head"]); ?>' id="book_head">
                    </div>

                    <div class="form-group">
                        <label>文章类型</label>
                        <select name="book_type" lay-verify="" lay-filter='l1' id="l1">
                            <option value="">选择文章类型</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>分类</label>
                        <select name="book_class_id" lay-verify="">
                            <?php if(is_array($book_class)): $i = 0; $__LIST__ = $book_class;if( count($__LIST__)==0 ) : echo "没有分类数据" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i; if($book["book_class_id"] == $vol["book_class_id"]): ?><option value="<?php echo ($vol["book_class_id"]); ?>" selected><?php echo ($vol["book_class_title"]); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo ($vol["book_class_id"]); ?>"><?php echo ($vol["book_class_title"]); ?></option><?php endif; endforeach; endif; else: echo "没有分类数据" ;endif; ?>


                        </select>
                    </div>

                    <div class="form-group">
                        <label>作者</label>
                        <!-- <textarea cols="5" rows="5" class="o-form-control" name="book_author" placeholder="（在列表中显示）"><?php echo ($book["book_author"]); ?></textarea> -->
                        <div id="book_author" class='summernote'><?php echo (htmlspecialchars_decode($book["book_author"])); ?></div>
                    </div>
                    <div class="form-group">
                        <label>内容简介</label>
                        <!-- <textarea cols="5" rows="5" class="o-form-control" name="book_author" placeholder="（在列表中显示）"><?php echo ($book["book_author"]); ?></textarea> -->
                        <div id="book_info" class='summernote'><?php echo (htmlspecialchars_decode($book["book_info"])); ?></div>
                    </div>

                    <div class="form-group">
                        <label>出版信息</label>
                        <!-- <textarea cols="5" rows="5" class="o-form-control" name="book_author" placeholder="（在列表中显示）"><?php echo ($book["book_author"]); ?></textarea> -->
                        <div id="book_info_2" class='summernote'><?php echo (htmlspecialchars_decode($book["book_info_2"])); ?></div>
                    </div>


                    <div class="text-right">
                        <button type="button" class="btn btn-default o-btn" lay-submit lay-filter="save">保存</button>
                    </div>
                </form>

            </div>
            <div class="o-panel-footer">
            </div>
        </div>

    </div>

    <div class="page-header">
        <h1 class='text-muted'><?php echo ($book["book_title"]); ?>
            <small>章节列表</small>
        </h1>
    </div>
    <div class="book-list">

        <div class="o-panel">

            <div class="o-panel-body">
                <ul id='book_list'>

                    <?php if(empty($book["book_list"])): ?><li class="book-item" data-item-type=''>

                            <div class="book-item-body">

                                <sapn class="book-item-title">章节</sapn>
                                <sapn class="book-item-tool">
                                    <i class='fa fa-header book-item-up' data-tips='3' data-color='#666' title='设置章节头'></i>
                                    <i class='fa fa-edit book-item-edit' data-tips='3' data-color='#666' title='编辑'></i>
                                    <i class='fa fa-plus book-item-add' data-tips='3' data-color='#666' title='新增章节'></i>
                                    <i class='fa fa-arrows book-item-move' data-tips='3' data-color='#666' title='移动'></i>
                                    <i class='fa fa-remove book-item-remove' data-tips='3' data-color='#E74C3C' title='删除章节'></i>
                                </sapn>

                            </div>

                            <div class="book-item-footer">

                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label>章节标题</label>
                                            <input type="text" value="章节" autocomplete="off" class="o-form-control edit-title" placeholder="文章标题">
                                        </div>
                                        <div class="form-group">
                                            <label>章节类型</label>
                                            <label>
                                                视频
                                                <input type="radio" name="<?php echo ($i); ?>_item_type" value="video">
                                            </label>
                                            <label>
                                                音频
                                                <input type="radio" name="<?php echo ($i); ?>_item_type" value="audio">
                                            </label>
                                            <label>
                                                pdf
                                                <input type="radio" name="<?php echo ($i); ?>_item_type" value="pdf">
                                            </label>
                                        </div>
                                        <div class="form-group">

                                            <button type='button' class="layui-btn layui-black layui-btn-sm up-file up-video">
                                                <i class="layui-icon">&#xe67c;</i>
                                                上传视频
                                            </button>

                                            <button type='button' class="layui-btn layui-black layui-btn-sm up-file up-audio">
                                                <i class="layui-icon">&#xe67c;</i>
                                                上传音频
                                            </button>

                                            <button type='button' class="layui-btn layui-black layui-btn-sm up-file up-pdf">
                                                <i class="layui-icon">&#xe67c;</i>
                                                上传pdf
                                            </button>

                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class='file-src' value=''>

                                            <div class="file-box">
                                                <p>
                                                    <video controls class="video">
                                                        <source src="" />
                                                    </video>
                                                </p>
                                                <p>
                                                    <audio controls class="audio">
                                                        <source src="" />
                                                    </audio>
                                                </p>
                                                <p>
                                                    <a class="pdf" href="" target="_blank" class="pdf-src">查看pdf</a>
                                                </p>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </li><?php endif; ?>


                    <?php if(is_array($book["book_list"])): $i = 0; $__LIST__ = $book["book_list"];if( count($__LIST__)==0 ) : echo "请继续添加章节" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li class='book-item  <?php if($vol["is_head"] == 1): ?>book-head<?php endif; ?>' data-item-type='<?php echo ($vol["type"]); ?>'>

                            <div class="book-item-body">

                                <sapn class="book-item-title"><?php echo ($vol["title"]); ?></sapn>
                                <sapn class="book-item-tool">
                                    <i class='fa fa-header book-item-up' data-tips='3' data-color='#666' title='设置章节头'></i>
                                    <i class='fa fa-edit book-item-edit' data-tips='3' data-color='#666' title='编辑'></i>
                                    <i class='fa fa-plus book-item-add' data-tips='3' data-color='#666' title='新增章节'></i>
                                    <i class='fa fa-arrows book-item-move' data-tips='3' data-color='#666' title='移动'></i>
                                    <i class='fa fa-remove book-item-remove' data-tips='3' data-color='#E74C3C' title='删除章节'></i>
                                </sapn>

                            </div>

                            <div class="book-item-footer">
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label>章节标题</label>
                                            <input type="text" value="<?php echo ($vol["title"]); ?>" autocomplete="off" class="o-form-control edit-title" placeholder="文章标题">
                                        </div>
                                        <div class="form-group">
                                            <label>章节类型</label>
                                            <label>
                                                视频

                                                <?php if($vol["type"] == "video" ): ?><input type="radio" checked name="<?php echo ($i); ?>_item_type" value="video">
                                                    <?php else: ?>
                                                    <input type="radio" name="<?php echo ($i); ?>_item_type" value="video"><?php endif; ?>

                                            </label>
                                            <label>
                                                音频
                                                <?php if($vol["type"] == "audio"): ?><input type="radio" checked name="<?php echo ($i); ?>_item_type" value="audio">
                                                    <?php else: ?>
                                                    <input type="radio" name="<?php echo ($i); ?>_item_type" value="audio"><?php endif; ?>
                                            </label>
                                            <label>
                                                pdf
                                                <?php if($vol["type"] == "pdf"): ?><input type="radio" checked name="<?php echo ($i); ?>_item_type" value="pdf">
                                                    <?php else: ?>
                                                    <input type="radio" name="<?php echo ($i); ?>_item_type" value="pdf"><?php endif; ?>
                                            </label>



                                        </div>
                                        <div class="form-group">


                                            <?php if($vol["type"] == "video"): ?><button type='button' style="display: block" class="layui-btn layui-black layui-btn-sm up-file up-video">
                                                    <i class="layui-icon">&#xe67c;</i>
                                                    上传视频
                                                </button>

                                                <?php else: ?>

                                                <button type='button' style="display: none" class="layui-btn layui-black layui-btn-sm up-file up-video">
                                                    <i class="layui-icon">&#xe67c;</i>
                                                    上传视频
                                                </button><?php endif; ?>

                                            <?php if($vol["type"] == "audio"): ?><button type='button' style="display: block" class="layui-btn layui-black layui-btn-sm up-file up-audio">
                                                    <i class="layui-icon">&#xe67c;</i>
                                                    上传音频
                                                </button>

                                                <?php else: ?>

                                                <button type='button' style="display: none" class="layui-btn layui-black layui-btn-sm up-file up-audio">
                                                    <i class="layui-icon">&#xe67c;</i>
                                                    上传音频
                                                </button><?php endif; ?>



                                            <?php if($vol["type"] == "pdf"): ?><button type='button' style="display: block" class="layui-btn layui-black layui-btn-sm up-file up-pdf">
                                                    <i class="layui-icon">&#xe67c;</i>
                                                    上传pdf
                                                </button>

                                                <?php else: ?>

                                                <button type='button' style="display: none" class="layui-btn layui-black layui-btn-sm up-file up-pdf">
                                                    <i class="layui-icon">&#xe67c;</i>
                                                    上传pdf
                                                </button><?php endif; ?>


                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class='file-src' value='<?php echo ($vol["file_src"]); ?>'>

                                            <div class="file-box">

                                                <p>

                                                    <?php if($vol["type"] == "video"): ?><video controls class="video" src='/school/<?php echo ($vol["file_src"]); ?>' style="display: block">

                                                        </video>
                                                        <?php else: ?>
                                                        <video controls class="video" style="display: none">
                                                        </video><?php endif; ?>


                                                </p>
                                                <p>

                                                    <?php if($vol["type"] == "audio"): ?><audio controls class="audio" src='/school/<?php echo ($vol["file_src"]); ?>' style="display: block">

                                                        </audio>
                                                        <?php else: ?>
                                                        <audio controls class="audio" style="display: none">
                                                        </audio><?php endif; ?>

                                                </p>
                                                <p>

                                                    <?php if($vol["type"] == "pdf"): ?><a class="pdf" href="/school/<?php echo ($vol["file_src"]); ?>" style="display: block" target="_blank" class="pdf-src">查看pdf</a>
                                                        <?php else: ?>
                                                        <a class="pdf" href="/school/<?php echo ($vol["file_src"]); ?>" style="display: none" target="_blank" class="pdf-src">查看pdf</a><?php endif; ?>
                                                </p>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </li><?php endforeach; endif; else: echo "请继续添加章节" ;endif; ?>


                    <!-- <hr> -->
                </ul>
            </div>
        </div>
    </div>

    <script src="/school/Public/Admin/dist/linkage/linkage.js" type="text/javascript" charset="utf-8"></script>
    <script src="/school/Public/Admin/dist/book/book.js" type="text/javascript" charset="utf-8"></script>
    <script src="/school/Public/vendor/summernote/summernote.js" type="text/javascript" charset="utf-8"></script>
    <script src="/school/Public/vendor/summernote/lang/summernote-zh-CN.js" type="text/javascript" charset="utf-8"></script>

    <script>



        bookTool.init(function () {

            // bookTool.sort();
            // var list = bookTool.getList();
            // w(list);

        });


        $(function () {
            $('.summernote').summernote({
                height: 300,
                // tabsize: 2,
                lang: 'zh-CN'
            });
        })



        layui.use(['form', 'upload'], function () {
            var form = layui.form;
            upload = layui.upload;

            form.on('submit(save)', function (data) {
                // console.log(data.elem) //被执行事件的元素DOM对象，一般为button对象
                // console.log(data.form) //被执行提交的form对象，一般在存在form标签时才会返回
                // console.log(data.field); //当前容器的全部表单字段，名值对形式：{name: value}


                (function () {


                    data.field.book_list = bookTool.getList();

                    data.field.book_author = $('.summernote').eq(0).summernote('code')
                    data.field.book_info = $('.summernote').eq(1).summernote('code')
                    data.field.book_info_2 = $('.summernote').eq(2).summernote('code')

                    var url = '/school/index.php/Admin/book/saveField';
                    var obj = {
                        table: 'book',
                        id: "<?php echo ($book["book_id"]); ?>",
                        save: data.field
                    };
                    var fun = function (res) {
                        w(res);
                        try {
                            res = JSON.parse(res);
                        } catch (error) {
                            //转换错误
                            layer.msg('接口错误！', {
                                anim: 6
                            });
                            return;
                        }

                        if (res.res >= 0) {
                            layer.msg('保存成功~');

                        } else {
                            layer.msg('保存失败~', {
                                anim: 6
                            });
                        }

                    };
                    $.post(url, obj, fun);

                }());

                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });


            // 

            //执行实例-上传头像
            var uploadInst = upload.render({
                elem: '#upload_head' //绑定元素
                , url: '/school/index.php/Admin/Use/upFile' //上传接口
                , accept: 'file' //允许上传的文件类型
                // , exts: 'csv'
                // , auto: false
                , data: {
                    src: '/book/img/',
                    del_src: '<?php echo ($book["book_head"]); ?>'
                }
                , drag: true
                , done: function (res) {
                    //上传完毕回调
                    this.data.del_src = res.data.src;

                    if (res.code == 0) {
                        //成功
                        $('#book_head_img').attr('src', '/school/' + res.data.src)
                        $('#book_head').val(res.data.src);
                    }
                }
                , error: function (res) {
                    //请求异常回调
                    layer.msg('上传文件时出错！', {
                        anim: 6
                    });
                }
            });

            //执行实例-上传视频
            var uploadInst = upload.render({
                elem: '.up-file' //绑定元素
                , url: '/school/index.php/Admin/Use/upFile' //上传接口
                , accept: 'file' //允许上传的文件类型
                // , exts: 'csv'
                // , auto: false
                , data: {
                    // src: '/book/video/',
                    // del_src: '<?php echo ($book["video"]); ?>'
                }
                , drag: true
                , before: function () {

                    var item = this.item;
                    var $parents = $(item).parents('.book-item');
                    var type = $parents.attr('data-item-type');

                    this.data.src = '/book/' + type + '/';
                    this.data.del_src = $parents.find('.file-src').val();
                    w(this.data.del_src);

                }
                , done: function (res) {
                    //上传完毕回调
                    w(res);

                    this.data.del_src = res.data.src;

                    if (res.code == 0) {
                        //成功
                        var item = this.item;
                        var $parents = $(item).parents('.book-item');
                        var type = $parents.attr('data-item-type');
                        $parents.find('.file-src').val(res.data.src);

                        $parents.find('.video,.audio,.pdf').css('display', 'none');

                        if (type != 'pdf') {


                            $parents.find('.' + type).attr('src', '/school/' + res.data.src);
                            $parents.find('.' + type).css('display', 'block');


                        } else {
                            $parents.find('.pdf').attr('href', '/school/' + res.data.src);
                            $parents.find('.pdf').show();
                        }

                    }
                }
                , error: function (res) {
                    //请求异常回调
                    layer.msg('上传文件时出错！', {
                        anim: 6
                    });
                }
            });

            var arr = [
                { id: 1, title: 'pdf' },
                { id: 2, title: '音频' },
                { id: 3, title: '视频' },
            ];


            for (var i = 0; i < arr.length; i++) {
                var item = arr[i];

                var selected = '<?php echo ($book["book_type"]); ?>' == item.id ? 'selected' : '';
                $('#l1').append('<option value="' + item.id + '"' + selected + '>' + item.title + '</option>');

            }
            form.render('select'); //刷新select选择框渲染

            // linkage(arr, form, ['<?php echo ($book["pages_title"]); ?>', '<?php echo ($book["book_type"]); ?>']);


        });



        //jqueryUI

        //==========================================
        //jqui
        $("#book_list").sortable({
            placeholder: "placeholder", //占位符
            items: ".book-item", //谁能动
            handle: ".book-item-move", //拖拽句柄
            revert: 250,
            opacity: 0.9,
            start: function (event, ui) {
                //开始
                ui.item.css('transform', 'rotateZ(-3deg)');

            },
            stop: function (event, ui) {
                ui.item.removeAttr('style');

                bookTool.sort();
                // prompt.show({
                //     text: '放置成功~',
                // });

            },

        });
        $("#book_list").disableSelection();



    </script>

</body>

</html>
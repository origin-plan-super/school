// @ts-nocheck

function test(params) {

    var item = $('.book-item').clone().removeClass('hide');


    for (var i = 0; i <= 21; i++) {
        var d = item.clone();
        d.attr('data-item-type', 'pdf');
        // d.find('.file-src').val('book/book.js');

        if (i % 5 == 0) {

            d.addClass('book-head');
            d.find('.book-item-title').text(i);
            d.find('.edit-title').val(i);

        } else {

            d.find('.book-item-title').text(i + '.' + i);
            d.find('.edit-title').val(i + '.' + i);

        }
        $('#book_list').append(d);

    }

}


var bookTool = (function () {

    var obj = {
        list: [],
        init: function (f) {

            // test();

            $(document).on('click', '.book-item-edit', function () {
                //编辑

                var $parent = $(this).parents('.book-item');
                $parent.siblings().find('.panel').slideUp(250);

                var $panel = $parent.find('.panel');

                console.log($panel);
                $panel.slideToggle(250);

                return false;

            });

            $(document).on('click', '.book-item-up', function () {
                //设置成标题     
                var $this = $(this);
                var $parent = $this.parents('.book-item');
                $parent.toggleClass('book-head');

            });
            $(document).on('click', '.book-item-add', function () {
                //新增章节     
                var $this = $(this);
                var $parent = $this.parents('.book-item');
                $new = $parent.clone();

                $new.find('.edit-title').val('章节标题');
                $new.find('.book-item-title').text('章节标题');
                $new.find('video').attr('src', '');
                $new.find('audio').attr('src', '');
                $new.find('.pdf').attr('href', '');
                $parent.after($new);
                // video
                // 
                setLoad($new.find('.up-file'));

                console.log('添加');


            });

            $(document).on('click', '.book-item-remove', function () {
                //新增章节     
                var $this = $(this);
                var $parent = $this.parents('.book-item');
                $parent.remove();

            });

            $(document).on('change', '[type="radio"]', function () {
                var $this = $(this);
                var type = $this.val();
                var $parent = $this.parents('.book-item');
                $parent.attr('data-item-type', type);

                $parent.find('.up-file').hide();
                $parent.find('.up-' + type).show();

                console.log($this.val());

                return false;
            });

            $(document).on('input onpropertychange', '.edit-title', function () {

                var $this = $(this);
                var val = $this.val();
                var $parent = $this.parents('.book-item');

                $parent.find('.book-item-title').text(val);

            });
            if (f != null) {
                f();
            }
        },
        sort: function () {

            var arr = [];

            $('.book-item').each(function (index) {


                var $this = $(this);
                //创建基本json
                var item = {};
                var type = $this.attr('data-item-type');
                var title = $this.find('.edit-title').val();
                var file_src = $this.find('.file-src').val();
                var is_head = $this.hasClass('book-head') ? 1 : 0;

                item.type = type;
                item.title = title;
                item.file_src = file_src;
                item.is_head = is_head;
                arr.push(item);

            });
            bookTool.list = arr;

        },
        getList: function () {

            bookTool.sort();
            return bookTool.list;
        },
        getStringJson: function () {

            var str = JSON.stringify(bookTool.list);
            return str;
        }
    }
    return obj;
}());

/*
// * 过滤函数
// */
// function htmlEncode(str) {
//     str = str.replace(/s+/ig, '');
//     str = str.replace(/&/g, '');
//     str = str.replace(/</g, '');
//     str = str.replace(/>/g, '');
//     str = str.replace(/(?:t| |v|r)*n/g, '<br />');
//     str = str.replace(/t/g, '    ');
//     str = str.replace(/x22/g, '"');
//     str = str.replace(/x27/g, "'");
//     str = str.replace(/"/g, "");
//     return str;

// }
// @ts-nocheck
//联动下拉菜单


function linkage(arr, form, active) {

    console.log(active);


    for (var i = 0; i < arr[0].length; i++) {
        var item = arr[0][i];
        // var selected = (item.title == title ? 'selected ="selected "' : '')
        var selected = item.title == active[0] ? 'selected' : '';
        $('#l1').append('<option value="' + item.title + '"' + selected + '>' + item.title + '</option>');
    }


    //如果有默认二级菜单
    if (active[1]) {
        $('#l2').empty();


        for (var i = 0; i < arr[1].length; i++) {
            var item = arr[1][i];
            if (item.super == active[0]) {
                var selected = item.title == active[1] ? 'selected' : '';

                if (selected !== '') {

                    if (active[1] == '视频') {

                        w(active[1]);
                        $('#is_video').show();
                        $('#is_head').hide();
                        $('#is_content').hide();

                    } else {

                        $('#is_video').hide();
                        $('#is_head').show();
                        $('#is_content').show();

                    }
                }


                $('#l2').append('<option value="' + item.title + '"' + selected + '>' + item.title + '</option>');
            }
        }

    }


    form.on('select(l1)', function (data) {
        //获得一级id
        var title = data.value;

        // is_video

        //如果是视频

        //清空二级
        $('#l2').empty();
        //遍历插入

        for (var i = 0; i < arr[1].length; i++) {
            var item = arr[1][i];
            if (item.super == title) {
                $('#l2').append('<option value="' + item.title + '">' + item.title + '</option>');
            }
        }
        form.render('select'); //刷新select选择框渲染


    });

    form.on('select(l2)', function (data) {
        var title = data.value;
        //如果是视频


        if (title == '视频') {
            $('#is_video').show();
            $('#is_head').hide();
            $('#is_content').hide();

        } else {
            $('#is_video').hide();
            $('#is_head').show();
            $('#is_content').show();
        }


    });

    form.render('select'); //刷新select选择框渲染



}



// var linkage = function (arr, form, brand_id, class1_id, class2_id) {


//     w(arr);
//     return;

//     for (var i = 0; i < arr[0].length; i++) {
//         var item = arr[0][i];
//         var selected = (item.brand_id == brand_id ? 'selected ="selected "' : '')
//         $('#se_brand').append('<option value="' + item.brand_id + '"' + selected + '>' + item.brand_title + '</option>');
//     }

//     if (brand_id != null) {

//         var super_id;

//         for (var i = 0; i < arr[1].length; i++) {
//             var item = arr[1][i];
//             if (item.brand_id == brand_id) {
//                 var selected = (item.class_id == class1_id ? 'selected ="selected "' : '')
//                 if (item.class_id == class1_id) {
//                     super_id = item.class_id;
//                 }
//                 $('#se_class_1').append('<option value="' + item.class_id + '"' + selected + '>' + item.class_title + '</option>');
//             }
//         }

//         for (var i = 0; i < arr[2].length; i++) {
//             var item = arr[2][i];
//             if (item.super_id == super_id) {
//                 var selected = (item.class_id == class2_id ? 'selected ="selected "' : '')
//                 w(item.class_id);
//                 $('#se_class_2').append('<option value="' + item.class_id + '"' + selected + '>' + item.class_title + '</option>');
//             }
//         }

//     }


//     form.on('select(' + 'se_brand' + ')', function (data) {
//         //获得一级id
//         var id = data.value;
//         //清空一级class元素
//         $('#se_class_1').empty();
//         //遍历插入
//         for (var i = 0; i < arr[1].length; i++) {
//             var item = arr[1][i];
//             if (item.brand_id == id) {
//                 $('#se_class_1').append('<option value="' + item.class_id + '">' + item.class_title + '</option>');
//             }
//         }

//         form.render('select'); //刷新select选择框渲染

//     });


//     form.on('select(' + 'se_class_1' + ')', function (data) {
//         //获得一级id
//         var id = data.value;
//         //清空一级class元素
//         $('#se_class_2').empty();
//         //遍历插入
//         for (var i = 0; i < arr[2].length; i++) {
//             var item = arr[2][i];
//             if (item.super_id == id) {
//                 $('#se_class_2').append('<option value="' + item.class_id + '">' + item.class_title + '</option>');
//             }
//         }

//         form.render('select'); //刷新select选择框渲染

//     });

//     form.render('select'); //刷新select选择框渲染

// }
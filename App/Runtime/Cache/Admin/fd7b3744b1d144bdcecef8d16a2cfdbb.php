<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>初始化</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: rgb(30, 30, 30);
            color: #ccc;
        }

        .box {
            width: 350px;
            margin: 0 auto;
            box-shadow: 0 5px 30px 5px rgba(0, 0, 0, 0.5);

        }

        .panel {
            position: relative;
            width: 100%;

        }

        .panel-simple {
            color: #ccc;
        }

        .panel-head {
            padding: 15px 0;
        }

        .panel-title {
            text-align: center;
        }

        .panel-body {
            position: relative;
            background-color: #ffffff;
            color: #333;
            padding: 20px;
        }

        .panel-footer {}


        .panel-simple .panel-head {
            background-color: #2a2a2a;
            color: #fff;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-input {

            display: block;
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border-radius: 2px;
            border: solid 1px #ccc;
            transition: all 0.3s;
            line-height: 1.4;

        }

        .form-input:focus {
            outline: none;
            border-color: #888;
        }

        .btn-black {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border-radius: 2px;
            border: solid 1px #ccc;
            color: #fff;
            transition: all 0.3s;
            line-height: 1.4;
            background-color: #2a2a2a;
        }

        .btn-black:focus {
            outline: none;
            border-color: #888;
        }

        hr {
            border: none;
            border-bottom: solid 1px #aaa;
        }

        .config-title {
            border-bottom: solid 1px #eee;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="box">
        <div class="panel panel-simple">
            <div class="panel-head">
                <div class="panel-title">初始化</div>
            </div>
            <div class="panel-body">

                <form action="init" method="post" class="form">
                    <h3 class="config-title">账户配置</h3>
                    <div class="form-group">
                        <input type="text" class="form-input" name="admin_id" id="" placeholder="初始化管理账户">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="admin_pwd" id="" placeholder="初始化密码">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="admin_pwd_2" id="" placeholder="再次输入密码">
                    </div>

                    <h3 class="config-title">项目配置</h3>

                    <div class="form-group">
                        <input type="text" class="form-input" name="app_name" id="" placeholder="请输入项目名">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-black" name="" id="" value="提交">
                    </div>
                </form>

            </div>
            <div class="panel-footer"></div>
        </div>

    </div>


    <script>


    </script>






</body>

</html>
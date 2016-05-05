<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="{{URL::asset('assets/image/Find.ico')}}">
    <title>搜索首页</title>
    <script src="{{URL::asset('assets/js/jquery-1.12.3.min.js')}}"></script>
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Microsoft YaHei';
            background: url("{{URL::asset('assets/image/background.jpg')}}") no-repeat;
            background-size: cover;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        /*.title {*/
        /*font-size: 96px;*/
        /*}*/
        .title {
            color: #ffffff;
            font-size: 96px;
            display: inline-block;
            margin: 0;
        }

        .find_icon {
            display: inline-block;
        }

        .btn {
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            background: none repeat scroll 0 0 transparent;
            cursor: inherit;
            display: block;
        }

        .btn-upload {
            position: relative;
            vertical-align: middle;
            display: table-cell;
            width: 88px;
        }

        .table {
            display: table;
            width: 100%;;
        }

        .form-control {
            position: relative;
            z-index: 2;
            float: left;
            margin-bottom: 0;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            display: table-cell;
            width: 79%;
            border-radius: 0;
        }

        .btn_sub {
            float: left;
            position: relative;
            vertical-align: middle;
            display: table-cell;
            width: 14%;
            height: 48px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .white{
            width: 600px;
            height: 400px;
            background: #fff;
            opacity: 0.3;
            z-index: 0;
            position: absolute;
            margin: auto;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="white"></div>
        <div>
            <img src="{{URL::asset('assets/image/Find.png')}}" class="find_icon">
            <p class="title">图片搜索</p>
        </div>
        <form method="post" action="{{URL::route('search')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="table">
                <div class="btn btn-upload" style="border-top-right-radius:0;border-bottom-right-radius: 0;">
                    <img src="{{URL::asset('assets/image/folder.png')}}" class="folder_icon">
                    选择图片
                    <input type="file" name="pic" id="f">
                </div>
                <div class="form-control"></div>
                <button type="submit" class="btn btn_sub">搜索</button>
            </div>
        </form>
    </div>
</div>
<script>

    f.onchange = function (event) {
        var folder_name = f.files[0].name;
        $('.form-control').text(folder_name)

    }


</script>
</body>
</html>

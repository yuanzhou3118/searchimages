<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="{{URL::asset('assets/image/Find.ico')}}">
    <script src="{{URL::asset('assets/js/jquery-1.12.3.min.js')}}"></script>
    <title>搜索结果页面</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        font-size: 16px;;
        font-family: tahoma, arial, "Microsoft YaHei", "\5b8b\4f53", sans-serif;
    }

    .msg {
        width: 664px;
        border-top: 1px solid #ebebeb;
        padding: 20px 0;
    }

    .card-title {
        line-height: 18px;
        font-size: 18px;
    }

    ul {
        list-style: none;
    }

    li {
        position: relative;
    }

    .source-card-topic-title {
        padding: 20px 0 4px;
    }

    .sameInfo {
        min-height: 110px;
    }

    .source-card-topic-title .source-card-topic-title-link {
        display: inline-block;
        vertical-align: middle;
        max-width: 560px;
        color: #00c;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .source-card-topic-footer {
        margin-left: 80px;
        font-size: 12px;
        color: green;
    }

    .clearfix:after {
        content: ".";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
    }

    .source-card-topic-same-image {
        float: left;
    }
    .wrapper{
        position: relative;
        padding-bottom: 20px;
        margin: 79px 120px 0;
        z-index: 1;
        min-width: 400px;
    }
    .header {
        position: fixed;
        height: 70px;
        width: 100%;
        border-bottom: 1px solid #ebebeb;
        top: 0;
        box-shadow: 0 0 3px rgba(150, 150, 150, .2);
        background: #fff;
        z-index: 2;
    }

    #guessWord {
        padding: 20px 0;
        width: 640px;
    }

    #guessWord:after {
        content: ".";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
    }
    .guessImageContainer{
        position: relative;
        float: left;
        min-width: 100px;
        max-width: 200px;
        height: 115px;
        overflow: hidden;
    }
    .guess-info{
        position: relative;
        float: left;
        max-width: 420px;
        height: 115px;
        margin-left: 20px;
    }
    .header .search{
        position: absolute;
        top: 17px;
        left: 175px;
    }
    a{
        text-decoration: none;
    }
    .btn{
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

</style>
<style>
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
    .btn_sub{
        float: left;
        position: relative;
        vertical-align: middle;
        display: table-cell;
        width: 14%;
        height:48px;
        border-top-left-radius:0;
        border-bottom-left-radius: 0;
    }
    .form{
        width: 60%;
        display: inline-block;
        margin: 10px;
        overflow: hidden;
    }
    .index_link{
        vertical-align: top;
        display: inline-block;
        margin-top: 8px;
    }
</style>
<body>
<section>
    <div class="header">
        <a href="{{URL::route('index')}}" class="index_link"><h1 style="margin:10px;">图片搜索</h1></a>
        <form method="post" action="{{URL::route('search')}}" enctype="multipart/form-data" class="form">
            {{csrf_field()}}
            <div class="table">
                <div class="btn btn-upload" style="border-top-right-radius:0;border-bottom-right-radius: 0;">
                    <img src="{{URL::asset('assets/image/folder.png')}}" class="folder_icon">
                    选择图片
                    <input type="file" name="pic" id="f" >
                </div>
                <div class="form-control"></div>
                <button type="submit" class="btn btn_sub">搜索</button>
            </div>
        </form>
    </div>
    <div class="wrapper">
        <div id="guessWord">
            <div class="guessImageContainer"><img src="{{$search_images}}" style="position: relative;display: block;margin: 0 auto;" height="115px;"></div>
            <div class="guess-info clearfix">
                @if($response['extra']['errno'] == 0)
                    <div id="result"><p>成功找到了<span class="samenum">{{$response['extra']['samenum']}}</span>条数据</p></div>
                    <p>对该图片的最佳猜测 ：
                        @foreach($response['data']['guessWord'] as $item)
                            <span class="guessWord">{{$item}}</span>
                        @endforeach
                    </p>
            </div>


        </div>
        <div class="msg">
            <div class="card-header">
                <div class="card-title">图片来源</div>
            </div>
            <ul class="clearfix">
                @if($response['extra']['samenum'] > 0)
                    @foreach($response['data']['sameInfo'] as $item)
                        <li class="sameInfo">
                            <div class="source-card-topic-title">
                                <a href="{{$item['fromURL']}}" target="_blank" class="source-card-topic-title-link">
                                    <p>{{$item['fromPageTitle']}}</p></a>
                            </div>
                            <a href="{{$item['fromURL']}}" target="_blank" class="source-card-topic-same-image"><img
                                        src="{{$item['objURL']}}" width="70px" height="70px"></a>
                            <div class="source-card-topic-footer">
                                <p class="fromURLHost">{{$item['fromURLHost']}}</p>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>

        @elseif($response['extra']['errno'] == 1) {
        <div class="result">非法参数</div> $result = '非法参数';
        }
        @elseif($response['extra']['errno'] == 2) {
        <div class="result">图片下载失败</div>
        }
        @elseif($response['extra']['errno'] == 3) {
        <div class="result">URL格式错误，url需要编码</div>
        }
        @elseif($response['extra']['errno'] == 4) {
        <div class="result">图片过大，小于10M</div>
        }
        @elseif($response['extra']['errno'] == 5) {
        <div class="result">图片格式错误</div>
        }
        @elseif($response['extra']['errno'] == 6){
        <div class="result">未找到图片相关信息</div>
        }
        @endif
    </div>

</section>

</body>
<script>
    f.onchange = function (event) {
        var folder_name = f.files[0].name;
        $('.form-control').text(folder_name)

    }
</script>

</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Search</title>
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
        margin: 57px 120px 0;
        z-index: 1;
        min-width: 400px;
    }
    .header {
        position: fixed;
        height: 56px;
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
</style>
<body>
<section>
    <div class="header">
        <a href="{{URL::route('index')}}"><h1 style="margin:10px;">图片搜索</h1></a>
        <form method="post" action="{{URL::route('search')}}" enctype="multipart/form-data" class="search">
            {{csrf_field()}}
            <input type="file" name="pic">
            <button type="submit">搜索</button>
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


</html>


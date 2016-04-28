<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>



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
            font-family: 'Lato';
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

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <form method="post" action="{{URL::route('search')}}"  enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="file" name="pic">
            <button type="submit">搜索</button>
        </form>
    </div>
</div>
</body>
</html>

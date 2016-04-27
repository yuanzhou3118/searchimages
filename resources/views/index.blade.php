<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Weather</title>
    <link rel="stylesheet" href="{{URL::asset('assets/css/weather.css')}}">
    <script type="text/javascript" src="{{URL::asset('assets/javascript/weather.min.js')}}"></script>
</head>
<body>
<script type="text/javascript">
    window.weatherUrl = '{{URL::route('wechat.content.weather.sanya')}}';
</script>
<script type="text/template" id="tpltoday">
    <div class="city"><%= city %></div>
<section>
    <div class="left">
        <div class="weathericon"><img src="{!! URL::asset('assets/images/weather/<%= weathericon[today.type] %>_0.png') !!}"></div>
        <div class="air"><%= today.aqi?"<span>空气质量："+today.aqi+" ( "+getiaqi(today.aqi)+" )</span>":"" %></div>
    </div>
    <div class="right">
        <div class="temp"><span><%= parseInt(today.curTemp) %></span>℃</div>
        <div class="weather"><%= today.type %></div>
        <div class="wind"><%= today.fengxiang %> <%= today.fengli %></div>
        <div class="date"><%= today.date %></div>
    </div>
</section>
</script>
<script type="text/template" id="tpllife">
<li>
  <p class="logo"><a href="{{URL::route('wechat.content.invitation')}}"><img src="{{URL::asset('assets/images/weather/logo_gold.png')}}"/></a></p>
  </li>
<% _.each(index, function (item) { %>
  <li >
    <p class="<%= item.code %>">
        <span><%= item.name %><br>
        <%= item.index %></span>
    </p>
  </li>
<% }); %>
</script>
<script type="text/template" id="tplforecast">
<% _.each(forecast, function (item) { %>
  <li>
    <p><%= item.date %></p>
    <p><%= item.type %></p>
    <p><%= item.fengxiang %> <%= item.fengli %></p>
    <p><%= item.lowtemp %> - <%= item.hightemp %></p>
  </li>
<% }); %>
</script>
<div class="today">
</div>
<ul class="forecast">
</ul>
<ul class="life">

</ul>
</body>
</html>


@extends('backend/master')
@section('title', 'Page Title')
@section('content')

    <div class="am-g am-margin-top">




<form action="{{url('/backend/curl')}}" method="get">
    <div class="am-u-sm-2">
        网址
    </div>
    <div class="am-u-sm-10">
    <input type="text" name="url" value="{{$url}}" style="width: 400px;">
    </div>
    <br />
    <div class="am-margin">
        <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
        {{--<button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>--}}
    </div>
</form>
    </div>



<br />
<b>
    @if(isset($message['message']))
    {{$message['message']}}
    @endif
</b>


@if(isset($datas['douban'])&&!isset($message['message']))
<h1><a href="{{url('/backend/docurl')}}?url={{$url}}">确定</a> </h1>
@endif

<br />
@if(isset($datas['douban']))
<strong>豆瓣号</strong>:{{$datas['douban']}}
<br />
<strong>imdb:</strong>{{$datas['imdb']}}
<br />
<strong>标题</strong>:{{$datas['title'][0]}}
<br />
<strong>父标题</strong>:{{$datas['title'][1]}}
<br />
<strong>别名:</strong>
<br />
@foreach ($datas['alias'] as $v)
     {{ $v }}<br />
@endforeach
<strong>简介:</strong>{{$datas['summary']}}
<br />
<strong>评分:</strong>{{$datas['num']}}
<br />
<strong>日期:</strong>{{$datas['date']}}
<br />
<strong>图片:</strong><img src="{{$datas['pic']}}" />
<br />
<strong>类型:</strong>
<br />
@foreach ($datas['type'] as $v)
    {{ $v }}<br />
@endforeach
<strong>导演:</strong>
<br />
@foreach ($datas['director'] as $v)
    {{ $v }}<br />
@endforeach
<strong>作者:</strong>
<br />
@foreach ($datas['writer'] as $v)
    {{ $v }}<br />
@endforeach
<strong>主演:</strong>
<br />
@foreach ($datas['cast'] as $v)
    {{ $v }}<br />
@endforeach
<strong>地区:</strong>
<br />
@foreach ($datas['area'] as $v)
    {{ $v }}<br />
@endforeach

@endif

@stop
@section('js')
    @stop
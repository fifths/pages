@extends('backend/layer')
@section('title', 'Page Title')
@section('content')

        <form class="am-form" method="post" action="{{url('backend/category/update/'.$category->id)}}">

            @if  (Session::get('message'))
                <div class="am-alert @if  (Session::get('message.errcode')=='0')am-alert-success @endif @if (Session::get('message.errcode')>'0')am-alert-danger @endif" data-am-alert>
                    <button type="button" class="am-close">&times;</button>
                    <p>{{Session::get('message.message')}}</p>
                </div>
            @endif

            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="am-g am-margin-top">
                <div class="am-u-sm-2">
                    名称
                </div>
                <div class="am-u-sm-10">
                    <input type="text" name="name" value="{{$category->name}}">
                </div>
            </div>

            <div class="am-g am-margin-top">
                <div class="am-u-sm-2">
                    排序
                </div>
                <div class="am-u-sm-10">
                    <input type="text" name="sort" value="{{$category->sort}}" placeholder="100">
                </div>
            </div>


            <div class="am-margin" style="text-align: center">
                <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
                {{--<button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>--}}
            </div>
        </form>


@stop

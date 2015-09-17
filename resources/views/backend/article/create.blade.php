@extends('backend/layer')
@section('title', 'Page Title')
@section('content')

        <form class="am-form" action="{{url('backend/article/store')}}" method="post">
            @if  (Session::get('message'))
            <div class="am-alert @if  (Session::get('message.errcode')=='0')am-alert-success @endif @if (Session::get('message.errcode')>'0')am-alert-danger @endif" data-am-alert>
                <button type="button" class="am-close">&times;</button>
                <p>{{Session::get('message.message')}}</p>
            </div>
            @endif

            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="am-g am-margin-top">
                <div class="am-u-sm-2">
                    图片
                </div>
                <div class="am-u-sm-10">
                    <input type="text" name="picture">
                </div>
            </div>



                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        日期
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="date" class="am-form-field" placeholder="日历组件" data-am-datepicker readonly/></p>
                    </div>
                </div>

            <div class="am-g am-margin-top">
                <div class="am-u-sm-2">
                    评分
                </div>
                <div class="am-u-sm-10">
                    <input type="text" name="score" placeholder="10.0">
                </div>
            </div>

            <div class="am-g am-margin-top">
                <div class="am-u-sm-2">
                    标题
                </div>
                <div class="am-u-sm-10">
                    <input type="text" name="title">
                </div>
            </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        父标题
                    </div>
                    <div class="am-u-sm-10">
                        <input type="text" name="other_title">
                    </div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        内容
                    </div>
                    <div class="am-u-sm-10">
                        <textarea rows="10" placeholder="" name="content"></textarea>
                    </div>
                </div>



                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        排序
                    </div>
                    <div class="am-u-sm-10">
                        <input type="text" name="sort" placeholder="100">
                    </div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        地区
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="area[]"></p>
                    </div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        主演
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="cast[]"></p>
                    </div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        导演
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="director[]"></p>
                    </div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        编剧
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="writer[]"></p>
                    </div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        又名
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="alias[]"></p>
                        <p><input type="text" name="alias[]"></p>
                    </div>
                </div>
                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        类型
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="category[]"></p>
                        <p><input type="text" name="category[]"></p>
                        <p><input type="text" name="category[]"></p>
                    </div>
                </div>
                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        标签
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="tag[]"></p>
                        <p><input type="text" name="tag[]"></p>
                        <p><input type="text" name="tag[]"></p>
                    </div>
                </div>



                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        豆瓣
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="douban[]"></p>
                    </div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        imdb
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="imdb[]"></p>
                    </div>
                </div>


                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        下载
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="download[]"></p>
                        <p><input type="text" name="download[]"></p>
                        <p><input type="text" name="download[]"></p>
                    </div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        发布
                    </div>
                    <div class="am-u-sm-10">
                        <label class="am-radio">
                            <input type="radio" name="status" value="0" data-am-ucheck>
                            发布
                        </label>
                        <label class="am-radio">
                            <input type="radio" name="status" value="1" data-am-ucheck checked>
                            不发布
                        </label>
                    </div>
                </div>




            <div class="am-margin" style="text-align: center">
                <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
                {{--<button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>--}}
            </div>
        </form>


@stop

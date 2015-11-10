@extends('backend/layer')
@section('title', 'Page Title')
@section('content')

        <form class="am-form" action="{{url('backend/article/update/'.$article->id)}}" method="post" enctype="multipart/form-data">
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
                    <img src="/uploads/{{$article->picture}}" style="height:120px;border:1px solid #abc" />
                    <br /><br />
                    <input type="file" name="picture">
                </div>
            </div>

                {{--<form class="am-form" method="POST" action="/manage/user/updatePhoto" enctype="multipart/form-data">
                    <div class="am-form-group">
                        <input type="file" name="myfile" id="user-pic">
                        <p class="am-form-help">请选择要上传的文件...</p>
                        <button type="submit" class="am-btn am-btn-primary am-btn-xs">保存</button>
                    </div>
                </form>--}}


                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        年份
                    </div>
                    <div class="am-u-sm-10">
                        <p><input type="text" name="date" value="{{$article->date}}" class="am-form-field" placeholder="日历"  /></p>
                    </div>
                </div>

            <div class="am-g am-margin-top">
                <div class="am-u-sm-2">
                    评分
                </div>
                <div class="am-u-sm-10">
                    <input type="text" name="score" value="{{$article->score}}" placeholder="10.0">
                </div>
            </div>

            <div class="am-g am-margin-top">
                <div class="am-u-sm-2">
                    标题
                </div>
                <div class="am-u-sm-10">
                    <input type="text" name="title" value="{{$article->title}}">
                </div>
            </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        子标题
                    </div>
                    <div class="am-u-sm-10">
                        <input type="text" name="other_title" value="{{$article->other_title}}">
                    </div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        下载
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="download">添加</button>
                    </div>
                    <div class="am-u-sm-5">
                        @if (isset($downloads))
                            @foreach ($downloads as $download)
                                <p><a href="/download/{{$download->path}}">{{basename($download->path)}}</a>  <span d_id="{{$download->id}}">删除</span></p>
                            @endforeach
                        @endif
                    </div>
                    <div class="am-u-sm-5"></div>
                </div>



                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        内容
                    </div>
                    <div class="am-u-sm-10">
                        <textarea rows="10" placeholder="" name="content">{{$article->content}}</textarea>
                    </div>
                </div>



                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        豆瓣
                    </div>
                    <div class="am-u-sm-5">
                        <p><input type="text" name="douban" value="{{$article->douban}}"></p>
                    </div>
                    <div class="am-u-sm-5"></div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        imdb
                    </div>
                    <div class="am-u-sm-5">
                        <p><input type="text" name="imdb" value="{{$article->imdb}}"></p>
                    </div>
                    <div class="am-u-sm-5"></div>
                </div>




                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        排序
                    </div>
                    <div class="am-u-sm-10">
                        <input type="text" name="sort" placeholder="100" value="{{$article->sort}}">
                    </div>
                </div>

                <div class="am-margin" style="text-align: center">
                    <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
                    {{--<button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>--}}
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        1.又名
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="alias">添加</button>
                    </div>
                    <div class="am-u-sm-5">
                        @if (isset($info[1]))
                        @foreach ($info[1] as $alias)
                            <p><input type="text" name="alias[]" value="{{$alias['content']}}"><span class="ll-destroy" l-data-modal="{target: '{{ url('/backend/articleinfo/destroy/'.$alias['id']) }}'}">删除</span></p>
                        @endforeach
                        @endif
                    </div>
                    <div class="am-u-sm-5"></div>
                </div>

                <hr />

                {{--<div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        2.标签
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="tag">添加</button>
                    </div>
                    <div class="am-u-sm-5">
                        @if (isset($info[2]))
                        @foreach ($info[2] as $tag)
                            <p><input type="text" name="tag[]" value="{{$tag['content']}}"><span class="ll-destroy" l-data-modal="{target: '{{ url('/backend/articleinfo/destroy/'.$tag['id']) }}'}">删除</span></p>
                        @endforeach
                            @endif
                    </div>
                    <div class="am-u-sm-5"></div>
                </div>

                <hr />--}}


                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        3.地区
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="area">添加</button>
                    </div>
                    <div class="am-u-sm-5">
                        @if (isset($info[3]))
                        @foreach ($info[3] as $area)
                            <p><input type="text" name="area[]" value="{{$area['content']}}"><span class="ll-destroy" l-data-modal="{target: '{{ url('/backend/articleinfo/destroy/'.$area['id']) }}'}">删除</span></p>
                        @endforeach
                            @endif
                    </div>
                    <div class="am-u-sm-5"></div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        4.导演
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="director">添加</button>
                    </div>
                    <div class="am-u-sm-5">
                        @if (isset($info[4]))
                        @foreach ($info[4] as $director)
                            <p><input type="text" name="director[]" value="{{$director['content']}}"><span class="ll-destroy" l-data-modal="{target: '{{ url('/backend/articleinfo/destroy/'.$director['id']) }}'}">删除</span></p>
                        @endforeach
                            @endif
                    </div>
                    <div class="am-u-sm-5"></div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        5.编剧
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="writer">添加</button>
                    </div>
                    <div class="am-u-sm-5">
                        @if (isset($info[5]))
                        @foreach ($info[5] as $writer)
                            <p><input type="text" name="writer[]" value="{{$writer['content']}}"><span class="ll-destroy" l-data-modal="{target: '{{ url('/backend/articleinfo/destroy/'.$writer['id']) }}'}">删除</span></p>
                        @endforeach
                            @endif
                    </div>
                    <div class="am-u-sm-5"></div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        6.主演
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="cast">添加</button>
                    </div>
                    <div class="am-u-sm-5">
                        @if (isset($info[6]))
                        @foreach ($info[6] as $cast)
                            <p><input type="text" name="cast[]" value="{{$cast['content']}}"><span class="ll-destroy" l-data-modal="{target: '{{ url('/backend/articleinfo/destroy/'.$cast['id']) }}'}">删除</span></p>
                        @endforeach
                            @endif
                    </div>
                    <div class="am-u-sm-5"></div>
                </div>



                <hr />
                {{--<div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        8.其他
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="other">添加</button>
                    </div>
                    <div class="am-u-sm-5">
                        @if (isset($info[8]))
                        @foreach ($info[8] as $other)
                            <p><input type="text" name="other[]"  value="{{$other['content']}}"><span class="ll-destroy" l-data-modal="{target: '{{ url('/backend/articleinfo/destroy/'.$other['id']) }}'}">删除</span></p>
                        @endforeach
                            @endif
                    </div>
                    <div class="am-u-sm-5"></div>
                </div>
                <hr />--}}




                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        11.类型
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="category">添加</button>
                    </div>
                    <div class="am-u-sm-5">
                        @if (isset($info[11]))
                        @foreach ($info[11] as $category)
                            <p><input type="text" name="category[]" value="{{$category['content']}}"><span class="ll-destroy" l-data-modal="{target: '{{ url('/backend/articleinfo/destroy/'.$category['id']) }}'}">删除</span></p>
                        @endforeach
                            @endif
                    </div>
                    <div class="am-u-sm-5"></div>
                </div>
                <hr />






                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        发布
                    </div>
                    <div class="am-u-sm-10">
                        <label class="am-radio">
                            <input type="radio" name="status" value="1" data-am-ucheck @if ($article['status'] === 1)checked @endif>
                            发布
                        </label>
                        <label class="am-radio">
                            <input type="radio" name="status" value="0" data-am-ucheck @if ($article['status'] === 0)checked @endif>
                            不发布
                        </label>
                    </div>
                </div>


                <div class="am-margin" style="text-align: center">
                    <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
                    {{--<button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>--}}
                </div>
        </form>

       {{-- <form class="am-form" action="#" name="l-tags">
                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        1.又名
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="alias">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        @foreach ($info[1] as $alias)
                            <p><input type="text" name="alias[]" value="{{$alias['content']}}" readonly></p>
                        @endforeach
                    </div>
                </div>

                <hr />

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        2.标签
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="tag">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        @foreach ($info[2] as $tag)
                            <p><input type="text" name="tag[]" value="{{$tag['content']}}" readonly></p>
                        @endforeach
                    </div>
                </div>

                <hr />


                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        3.地区
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="area">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        @foreach ($info[3] as $area)
                            <p><input type="text" name="area[]" value="{{$area['content']}}" readonly></p>
                        @endforeach
                    </div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        4.导演
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="director">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        @foreach ($info[4] as $director)
                            <p><input type="text" name="director[]" value="{{$director['content']}}" readonly></p>
                        @endforeach
                    </div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        5.编剧
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="writer">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        @foreach ($info[5] as $writer)
                            <p><input type="text" name="writer[]" value="{{$writer['content']}}" readonly></p>
                        @endforeach
                    </div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        6.主演
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="cast">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        @foreach ($info[6] as $cast)
                            <p><input type="text" name="cast[]" value="{{$cast['content']}}" readonly></p>
                        @endforeach
                    </div>
                </div>
                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        7.imdb
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="imdb">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        @foreach ($info[7] as $imdb)
                            <p><input type="text" name="imdb[]" value="{{$imdb['content']}}" readonly></p>
                        @endforeach
                    </div>
                </div>


                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        8.其他
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="other">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        @foreach ($info[8] as $other)
                            <p><input type="text" name="other[]"  value="{{$other['content']}}" readonly></p>
                        @endforeach
                    </div>
                </div>
                <hr />

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        9.下载
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="download">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        @foreach ($info[9] as $download)
                            <p><input type="text" name="download[]" value="{{$download['content']}}" readonly></p>
                        @endforeach
                    </div>
                </div>

                <hr />

                <div class="am-g am-margin-top">
                <div class="am-u-sm-2">
                    10.豆瓣
                    　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="douban">添加</button>
                </div>
                <div class="am-u-sm-10">
                    @foreach ($info[10] as $douban)
                        <p><input type="text" name="douban[]" value="{{$douban['content']}}" readonly></p>
                    @endforeach
                </div>
                </div>

                <hr />
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-2">
                        11.类型
                        　<button type="button" class="am-btn am-btn-primary btn-loading-example l-b-add" l-s-data="category">添加</button>
                    </div>
                    <div class="am-u-sm-10">
                        @foreach ($info[11] as $category)
                            <p><input type="text" name="category[]" value="{{$category['content']}}" readonly></p>
                        @endforeach
                    </div>
                </div>
                <hr />
</form>--}}










@stop
@section('js')
    <script>
        $(function(){
            $('.l-b-add').on('click',function(){
                var me=$(this);
                type=me.attr('l-s-data');
                if(type=='download'){
                    text='file';
                }else{
                    text='text';
                }
                var html='<p><input type="'+text+'" name="'+type+'[]"></p>';
                var nextd=me.parent().next().append(html);
                console.log(nextd);
            });


            $('.ll-destroy').on('click', function() {
                //询问框
                var it=$(this);
                var json=it.attr('l-data-modal');
                var obj=eval("("+json+")");
                var target=obj.target;
                var _token=$("input[name='_token']").val();

                if(obj){
                    layer.confirm('是否删除该条信息？', {
                        btn: ['确定', '取消'], //按钮
                        shade: 0.8
                    }, function () {
                        $.post(target,{_token:_token},function(result){
                            console.log(result);
                            if(result.errcode=='0'){
                                layer.msg(result.message, {icon: 1});
                                //console.log(parseInt($('.l-total').html()));
                                it.parent().remove();
                            }else{
                                layer.msg(result.message, {icon: 2});
                            }
                        },'json');
                    }, function () {
                        //layer.msg('么么哒', {shift: 6});
                    });
                }
            });


        })
    </script>
@stop
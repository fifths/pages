@extends('backend/master')
@section('title', $title)
@section('content')
    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">{{$title}}</strong> {{--/
            <small>Table</small>--}}
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <button type="button" class="am-btn am-btn-default l-layer"
                            l-data-modal="{target: '{{ url('/backend/category/create') }}', title: '添加'}"
                            ><span class="am-icon-plus"></span> 添加</button>
                    {{--<button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
                    <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核
                    </button>--}}
                    {{--<button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除--}}
                    </button>
                </div>
            </div>
        </div>
        {{--<div class="am-u-sm-12 am-u-md-3">
            <div class="am-form-group">
                <select data-am-selected="{btnSize: 'sm'}">
                    <option value="option1">所有类别</option>
                    <option value="option2">IT业界</option>
                    <option value="option3">数码产品</option>
                    <option value="option3">笔记本电脑</option>
                    <option value="option3">平板电脑</option>
                    <option value="option3">只能手机</option>
                    <option value="option3">超极本</option>
                </select>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
            <div class="am-input-group am-input-group-sm">
                <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
            </div>
        </div>--}}
    </div>

    <div class="am-g">
        <div class="am-u-sm-12">

                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        {{--<th class="table-check"><input type="checkbox"/></th>--}}
                        <th class="table-id">ID</th>
                        <th class="table-title">标题</th>
                        <th class="">排序</th>
                        <th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    @foreach ($categorys as $category)

                        <tr>
                            {{--<td><input type="checkbox"/></td>--}}
                            <td>{{$category['id']}}</td>
                            <td>{{$category['mark']}}{{$category['name']}}</td>
                            <td class="am-hide-sm-only">{{$category['sort']}}</td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary l-layer" l-data-modal="{target: '{{ url('/backend/category/edit/'.$category['id']) }}', title: '添加'}"><span
                                                    class="am-icon-pencil-square-o"></span> 编辑
                                        </button>
                                        {{--<button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span
                                                    class="am-icon-copy"></span> 复制
                                        </button>--}}
                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only l-destroy" l-data-modal="{target: '{{ url('/backend/category/destroy/'.$category['id']) }}'}" >
                                            <span class="am-icon-trash-o"></span> 删除
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>



            <div class="am-margin am-cf">
                <hr/>
                <p class="am-fl">共 <span class="l-total">{{$categorys->total()}}</span> 条记录</p>
{{--                <ol class="am-pagination am-fr">
                    <li class="am-disabled"><a href="#">&laquo;</a></li>
                    <li class="am-active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>

                </ol>
<hr />--}}
                <span class="am-fr">
                <?php echo $categorys->render(); ?>
                </span>
            </div>

        </div>

    </div>
@stop
{{--@section('js')
    <script>
        $(function(){
            $('.s-layer').on('click',function(){
                //iframe层-父子操作
                layer.open({
                    type: 2,
                    area: ['700px', '600px'],
                    fix: false, //不固定
                    maxmin: true,
                    content: '{{url('backend/category/create')}}'
                });
            })
        })
    </script>
@stop--}}

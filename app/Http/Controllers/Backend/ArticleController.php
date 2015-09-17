<?php

namespace App\Http\Controllers\Backend;

use App\Article;
use App\ArticleInfo;
use App\Info;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles=Article::orderBy('sort','desc')->orderBy('id','asc')->paginate(10);
        //无限级分类
        //$category=unlimitedForLevel($data);
        $title='文章列表';
        return view('backend.article.index')->with('articles',$articles)->with('title',$title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $time=date('Y-m-d',time());
        $picture=$request->input('picture');
        $date=$request->input('date')?:$time;
        $title=$request->input('title');
        $other_title=$request->input('other_title');
        $content=$request->input('content');
        $sort=$request->input('sort')?:100;
        $score=$request->input('score')?:'10.0';
        $status=$request->input('status')?:0;

        //$area=$request->input('area');




        if($title!=''){
            $Article=new Article;
            $Article->date=$date;
            $Article->title=$title;
            $Article->other_title=$other_title;
            $Article->content=$content;
            $Article->sort=$sort;
            $Article->score=$score;
            $Article->status=$status;
            $Article->picture=$picture;
            $rs=$Article->save();
            if($rs){
                $article_id=$Article->id;

                //类型添加
                $category=$request->input('category');
                foreach($category as $v){
                    if($v!=''){
                        $info=Info::where('content','=',$v)->first();
                        if($info){
                            $info_id=$info->id;
                        }else{
                            $Info=new Info;
                            $Info->content=$v;
                            $Info->save();
                            $info_id=$Info->id;
                        }
                        //echo $info_id,'<br />';
                        $ArticleInfo= new ArticleInfo;
                        $ArticleInfo->article_id=$article_id;
                        $ArticleInfo->info_id=$info_id;
                        $ArticleInfo->type_id=11;
                        $ArticleInfo->save();
                    }
        }




                $message=array(
                    'errcode'=>0,
                    'message'=>'success'
                );
                return redirect()->back()->with('message',$message);
            }
        }
        $message=array(
            'errcode'=>1,
            'message'=>'failed!'
        );
        return redirect()->back()->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

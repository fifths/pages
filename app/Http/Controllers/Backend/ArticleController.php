<?php

namespace App\Http\Controllers\Backend;

use App\Download;
use DB;
use App\Article;
use App\ArticleInfo;
use App\Info;
use App\Picture;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    /**
     * 文章视图
     */
    public function index()
    {
        $articles = Article::where('status', '>=', '0')->orderBy('id', 'desc')->paginate(10);
        //无限级分类
        //$category=unlimitedForLevel($data);
        $title = '文章列表';
        return view('backend.article.index')->with('articles', $articles)->with('title', $title);
    }

    /**
     * 添加文章视图
     */
    public function create()
    {
        return view('backend.article.create');
    }


    /**
     * 添加文章
     */
    public function store(Request $request)
    {
        $time = date('Y-m-d', time());
        $picture = $request->file('picture');
        $date = $request->input('date') ?: $time;
        $title = $request->input('title');
        $other_title = $request->input('other_title');
        $content = $request->input('content');
        $sort = $request->input('sort') ?: 100;
        $score = $request->input('score') ?: '10.0';
        $status = $request->input('status') ?: 0;


        //type=1 alias 又名
        $alias = $request->input('alias');
        //type=2 tag 标签
        $tag = $request->input('tag');
        //type=3 area 地区
        $area = $request->input('area');
        //type=4 director 导演
        $director = $request->input('director');
        //type=5 writer 编剧
        $writer = $request->input('writer');
        //type=6 cast 主演
        $cast = $request->input('cast');
        //type=7 imdb imdb
        $imdb = $request->input('imdb');
        //type=8 other 其他
        $other = $request->input('other');
        //type=9 download 下载地址
        $downloads = $request->file('download');
        //type=10 douban 豆瓣
        $douban = $request->input('douban');
        //type=11 douban 类型
        $category = $request->input('category');


        //die();
        if ($title != '') {

            if ($picture && $picture->isValid()) {
                $clientName = $picture->getClientOriginalName();
                //$tmpName = $file->getFileName();
                //$realPath = $file -> getRealPath();
                $entension = $picture->getClientOriginalExtension();
                //$mimeTye = $file -> getMimeType();
                //$size=$file->getClientSize();
                $pass_type = array('jpg', 'jpeg', 'gif', 'bmp', 'png');
                if (!in_array($entension, $pass_type)) {
                    $message = array(
                        'errcode' => 1,
                        'message' => '上传文件类型不正确!'
                    );
                    return redirect()->back()->with('message', $message);
                }
                $time = time();
                $newName = date('Ymdhis', $time) . 'e' . substr(md5($clientName . $time), 8, 16) . "." . $entension;

                $path = $picture->move(base_path() . '/public/uploads/' . date('Ym', $time), $newName);
                if ($path) {
                    /*$Picture=new Picture;
                    $Picture->name=$newName;
                    $Picture->save();
                    $picture_id=$Picture->id;*/
                    $picture = date('Ym', $time) . '/' . $newName;
                }
            }


            $Article = new Article;
            $Article->date = trim($date);
            $Article->title = trim($title);
            $Article->other_title = trim($other_title);
            $Article->content = trim($content);
            $Article->sort = trim($sort);
            $Article->score = trim($score);
            $Article->status = trim($status);
            $Article->picture = $picture ?: '';
            $Article->imdb = $imdb;
            $Article->douban = $douban;
            $rs = $Article->save();
            if ($rs) {
                $article_id = $Article->id;


                foreach ($downloads as $v) {
                    if ($v && $v->isValid()) {
                        $originName = $v->getClientOriginalName();
                        $tmpName = $v->getFileName();
                        $times = time();
                        $path = $v->move(base_path() . '/public/download/' . date('Ym', $times), $originName);
                        $Download=new Download();
                        $Download->type=1;
                        $Download->path=date('Ym', $times).'/'.$originName;
                        $Download->sort=100;
                        $Download->article_id=$article_id;
                        $Download->save();
                    }
                }


                $data = array();
                $data[1] = $alias;
                $data[2] = $tag;
                $data[3] = $area;
                $data[4] = $director;
                $data[5] = $writer;
                $data[6] = $cast;
                //$data[7] = $imdb;
                $data[8] = $other;
                //$data[9] = $download;
                //$data[10] = $douban;
                $data[11] = $category;
                foreach ($data as $k => $v) {
                    if ($v != '') {
                        foreach ($v as $kk => $vv) {
                            if ($vv != '') {
                                $content = trim($vv);
                                $info = Info::where('content', '=', $content)->first();
                                if ($info) {
                                    $info_id = $info->id;
                                } else {
                                    $Info = new Info;
                                    $Info->content = $content;
                                    $Info->save();
                                    $info_id = $Info->id;
                                }
                                //echo $info_id,'<br />';
                                $ArticleInfo = new ArticleInfo;
                                $ArticleInfo->article_id = $article_id;
                                $ArticleInfo->info_id = $info_id;
                                $ArticleInfo->type_id = $k;
                                $ArticleInfo->save();
                            }
                        }
                    }
                }

                $message = array(
                    'errcode' => 0,
                    'message' => 'success'
                );
                return redirect()->back()->with('message', $message);
            }
        }
        $message = array(
            'errcode' => 1,
            'message' => 'failed!'
        );
        return redirect()->back()->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 修改文章视图
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return redirect('backend/article/index');
        }
        /*$picture=$article->picture;
        $pic='';
        if($picture){
            $picturename=$picture->name;
            $pic='/uploads/'.date('Ym',strtotime($picture->created_at)).'/'.$picturename;
        }*/

        //find tag content
        $results = DB::select('SELECT a.id,a.type_id,b.content FROM `lee_article_info` AS a LEFT JOIN `lee_info` AS b ON a.info_id=b.id WHERE article_id = ?', [$id]);
        $info = array();
        foreach ($results as $k => $v) {
            //subgroup
            $data = array();
            $data['id'] = $v->id;
            $data['content'] = $v->content;
            $info[$v->type_id][] = $data;
        }

        $download=Download::where('article_id','=',$id)->where('type','=',1)->get();



        /*foreach($info[2] as $v=>$k){
            var_dump($k['id']);
        }*/

        //return $info;
        return view('backend.article.edit')->with('article', $article)->with('info', $info)->with('downloads',$download);
    }

    /**
     * 修改文章
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if ($article->picture) {
            unlink(base_path() . '/public/uploads/' . $article->picture);
        }
        if ($article) {
            $picture = $request->file('picture');
            //$picture_id=0;
            if ($picture && $picture->isValid()) {
                $clientName = $picture->getClientOriginalName();
                //$tmpName = $file->getFileName();
                //$realPath = $file -> getRealPath();
                $entension = $picture->getClientOriginalExtension();
                //$mimeTye = $file -> getMimeType();
                //$size=$file->getClientSize();
                $pass_type = array('jpg', 'jpeg', 'gif', 'bmp', 'png');
                if (!in_array($entension, $pass_type)) {
                    $message = array(
                        'errcode' => 1,
                        'message' => '上传文件类型不正确!'
                    );
                    return redirect()->back()->with('message', $message);
                }
                $time = time();
                $newName = date('Ymdhis', $time) . 'e' . substr(md5($clientName . $time), 8, 16) . "." . $entension;
                $path = $picture->move(base_path() . '/public/uploads/' . date('Ym', $time), $newName);
                if ($path) {
                    /*$Picture=new Picture;
                    $Picture->name=$newName;
                    $Picture->save();
                    $picture_id=$Picture->id;*/
                    $picture = date('Ym', $time) . '/' . $newName;
                }
            }

            $time = date('Y-m-d', time());
            $date = $request->input('date') ?: $time;
            $title = $request->input('title');
            $other_title = $request->input('other_title');
            $content = $request->input('content');
            $sort = $request->input('sort') ?: 100;
            $score = $request->input('score') ?: '10.0';
            $status = $request->input('status') ?: 0;
            $imdb = $request->input('imdb');
            $douban = $request->input('douban');

            $article->date = trim($date);
            $article->title = trim($title);
            $article->other_title = trim($other_title);
            $article->content = trim($content);
            $article->sort = trim($sort);
            $article->score = trim($score);
            $article->status = trim($status);
            $article->imdb = $imdb;
            $article->douban = $douban;
            if (isset($picture)) {
                $article->picture = $picture;
            }
            $rs = $article->save();


            //type=1 alias 又名
            $alias = $request->input('alias');
            //type=2 tag 标签
            $tag = $request->input('tag');
            //type=3 area 地区
            $area = $request->input('area');
            //type=4 director 导演
            $director = $request->input('director');
            //type=5 writer 编剧
            $writer = $request->input('writer');
            //type=6 cast 主演
            $cast = $request->input('cast');
            //type=7 imdb imdb
            //$imdb = $request->input('imdb');
            //type=8 other 其他
            $other = $request->input('other');
            //type=9 download 下载地址
            $download = $request->input('download');
            //type=10 douban 豆瓣
            //$douban = $request->input('douban');
            //type=11 douban 类型
            $category = $request->input('category');

            $article_id = $article->id;
            $data = array();
            $data[1] = $alias;
            $data[2] = $tag;
            $data[3] = $area;
            $data[4] = $director;
            $data[5] = $writer;
            $data[6] = $cast;
            //$data[7] = $imdb;
            $data[8] = $other;
            $data[9] = $download;
            //$data[10] = $douban;
            $data[11] = $category;
            foreach ($data as $k => $v) {
                if ($v != '') {
                    foreach ($v as $kk => $vv) {
                        if ($vv != '') {
                            $content = trim($vv);
                            $info = Info::where('content', '=', $content)->first();
                            if ($info) {
                                $info_id = $info->id;
                            } else {
                                $Info = new Info;
                                $Info->content = $content;
                                $Info->save();
                                $info_id = $Info->id;
                            }
                            $articleinfo = ArticleInfo::where('article_id', '=', $article_id)->where('info_id', '=', $info_id)->where('type_id', '=', $k)->first();
                            if (!$articleinfo) {
                                $ArticleInfo = new ArticleInfo;
                                $ArticleInfo->article_id = $article_id;
                                $ArticleInfo->info_id = $info_id;
                                $ArticleInfo->type_id = $k;
                                $ArticleInfo->save();
                            }
                            //echo $info_id,'<br />';
                        }
                    }
                }
            }


            if ($rs) {
                $message = array(
                    'errcode' => 0,
                    'message' => 'success'
                );
                return redirect()->back()->with('message', $message);
            }
        }

        $message = array(
            'errcode' => 404,
            'message' => 'not found!'
        );
        return redirect()->back()->with('message', $message);
        //echo isset($picture_id);


    }

    /**
     * 删除文章
     * @param $id
     * @return string
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->status = -1;
            $rs = $article->save();
            if ($rs) {
                $data = array(
                    'errcode' => 0,
                    'message' => 'success'
                );
                return json_encode($data);
            }
        }
        $data = array(
            'errcode' => 1,
            'message' => 'failed!'
        );
        return json_encode($data);
    }
}

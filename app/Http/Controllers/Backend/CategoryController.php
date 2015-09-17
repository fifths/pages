<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * 分类列表
     * @return $this
     */
    public function index()
    {
        $category=Category::orderBy('sort','desc')->orderBy('id','asc')->paginate(10);
        //无限级分类
        //$category=unlimitedForLevel($data);
        $title='分类列表';
        return view('backend.category.index')->with('categorys',$category)->with('title',$title);
    }


    /**
     * 添加分类视图
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * 添加分类
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $sort=$request->input('sort')?:'100';
        if($name!=''){
            $Category=new Category;
            $Category->name=$name;
            $Category->parent_id=0;
            $Category->sort=$sort;
            $rs=$Category->save();
            if($rs){
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
        $category=Category::find($id);
        return view('backend.category.edit')->with('category',$category);
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
        $category=Category::find($id);
        if($category){
            $name = $request->input('name');
            $sort=$request->input('sort')?:'100';
            $category->name=$name;
            $category->sort=$sort;
            $rs=$category->save();
            if($rs){
                $message=array(
                    'errcode'=>0,
                    'message'=>'success'
                );
                return redirect()->back()->with('message',$message);
            }
            $message=array(
                'errcode'=>1,
                'message'=>'failed!'
            );
            return redirect()->back()->with('message',$message);
        }
        $message=array(
            'errcode'=>404,
            'message'=>'not found!'
        );
        return redirect()->back()->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $rs=Category::destroy($id);
        if($rs){
            $data=array(
                'errcode'=>0,
                'message'=>'success'
            );
            return json_encode($data);
        }
        $data=array(
            'errcode'=>1,
            'message'=>'failed!'
        );
        return json_encode($data);
    }
}

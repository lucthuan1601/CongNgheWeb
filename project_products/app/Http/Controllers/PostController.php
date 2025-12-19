<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        DB::table('posts')->insert([
            'title'=>$request->get('title'),
            'content'=>$request->get('content')
        ]);
        return redirect()->route('posts.index')->with('message','Đã thêm bài viết mới !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = DB::table('posts')->where('id',$id)->first();
        if(!$post){
            abort(404);
        }
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, string $id)
    {
        
        DB::table('posts')->where('id',$id)->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'updated_at'=>now()
        ]);
        return redirect()->route('posts.index')->with('message','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('posts')->where('id',$id)->delete();
        return Redirect()->route('posts.index')->with('message','xóa thành công');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
       
    }

    public function index(Request $request){
        if($request->search){
            //serch data
            $all_posts = $this->post->latest()->where('description', 'LIKE', '%'.$request->search.'%')->paginate(10);
        }else{
             $all_posts = $this->post->latest()->withTrashed()->paginate(10);

       }
       return view('admin.posts.index')
       ->with('all_posts', $all_posts)
       ->with('search', $request->search);
       
    }

    public function hide($id){
        $this->post->destroy($id);

        return redirect()->back();
    }

    public function visible($id){
        $this->post->onlyTrashed()->findOrFail($id)->restore();
        
        return redirect()->back();
    }
}

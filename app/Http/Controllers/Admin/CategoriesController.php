<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Post;

class CategoriesController extends Controller
{
    private $category;
    private $post;

    public function __construct(Category $category, Post $post)
    {
        $this->category = $category;
        $this->post = $post;
    }

    public function index()
    {
        $all_categories = $this->category->orderBy('name')->paginate(10);
    
        // count uncategorized posts
        $all_posts = $this->post->all();
        $uncategorized_count = 0;
        foreach($all_posts as $post){
            if($post->categoryPosts->count() == 0){
                $uncategorized_count++; // add 1 to $uncategorized_count
            }
        }
    
        return view('admin.categories.index')
            ->with('all_categories', $all_categories)
            ->with('uncategorized_count', $uncategorized_count);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'new_category' => 'required|max:50|unique:categories,name'
        ]);

        $category = new Category();
        $category->name = $request->new_category;
        $category->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()->back();
    }

    public function update($category_id, Request $request)
    {
        $request->validate([
            'name'.$category_id => 'required|max:50|unique:categories,name'
        ],[
            "name$category_id.required" => 'You cannot post an empty category.',
            "name$category_id.max"      => 'Maximum of 50 characters only.',
            "name$category_id.unique"   => 'The new name has already been taken.'
        ]);
        
        $category = $this->category->findOrFail($category_id);
        $category->name = $request->input('name'.$category_id);
        $category->save();

        return redirect()->back();
    }
}

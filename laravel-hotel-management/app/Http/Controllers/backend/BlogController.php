<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Unique;
use Intervention\Image\Facades\Image;

use function PHPUnit\Framework\returnCallback;

class BlogController extends Controller
{
    public function BlogCategory(){
        $category = BlogCategory::latest()->get();
        return view('backend.category.blog_category', compact('category'));
    }

    public function BlogCategoryStore(Request $request){
       BlogCategory::insert([
        'category_name' => $request->category_name,
        'category_slug' =>strtolower(str_replace(' ', '-', $request->category_name))

        ]);

        $notification = array(
            'message' => 'Category Blog Insert Successfully',
            'alert type' => 'success',
            );
            return redirect()->back()->with($notification);
    }

    public function EditBlogCategory(Request $request, $id){
        $categories = BlogCategory::find($id);
        return response()->json($categories);
    }

    public function UpdateBlogCategory(Request $request){
        $cat_id = $request->cat_id;
  
        BlogCategory::find($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'Category Blog Update Successfully',
            'alert type' => 'success',
            );
            return redirect()->back()->with($notification);
    }

    public function DeleteBlogCategory($id){
    BlogCategory::find($id)->delete();

    $notification = array(
    'message' => 'Category Blog Delete Successfully',
    'alert type' => 'success',
    );
    return redirect()->back()->with($notification);
}


// Blog Post All Method Start

public function AllBlogPost(){
    $allPost = BlogPost::latest()->get();
    return view('backend.post.all_post', compact('allPost'));
}

public function AddBlogPost(Request $request){

    $blogCategory = BlogCategory::latest()->get();
    return view('backend.post.add_blog_post', compact('blogCategory'));
}

public function StoreBlogPost(Request $request){

    $image = $request->file('post_image');
    $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
    Image::make($image)->resize(550,670)->save('upload/post/'.$name_gen);
    $save_url = 'upload/post/'.$name_gen;

    BlogPost::insert([
        'blogcat_id' => $request->blogcat_id,
        'post_title' => $request->post_title,
        'user_id' =>  Auth::user()->id,
        'post_slug' => strtolower(str_replace('  ', '-', $request->post_title)),
        'short_descp' => $request->short_descp,
        'long_descp' => $request->long_descp,
        'post_image' => $save_url,

    ]);

    $notification = array(
        'message' => 'Blog Post Insert Successfully',
        'alert type' => 'success',
        );
        return redirect()->route('all.blog.post')->with($notification);
}

public function EditBlogPost(Request $request, $id){
    $blogCategory = BlogCategory::get();
    $blogpost = BlogPost::find($id);
    return view('backend.post.edit_blog_post', compact('blogCategory', 'blogpost'));
}

public function UpdatePostBlog(Request $request ){
    $blogpost_id = $request->id;
  if($request->file('post_image')){
    $image = $request->file('post_image');
    $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
    Image::make($image)->resize(550,670)->save('upload/post/'.$name_gen);
    $save_url = 'upload/post/'.$name_gen;

    BlogPost::findOrFail($blogpost_id)->update([
        'blogcat_id' => $request->blogcat_id,
        'post_title' => $request->post_title,
        'user_id' => Auth::user()->id,
        'post_title' => $request->post_title,
        'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
        'short_descp' => $request->short_descp,
        'long_descp' => $request->long_descp,
        'post_image' => $save_url
    ]);
    $notification = array(
        'message'=> 'Blog Post Data Update With Image Successfully',
        'alert-type'=> 'success',
    );
    return redirect()->route('all.blog.post')->with($notification);
  }

  else{
    BlogPost::findOrFail($blogpost_id)->update([
        'blogcat_id' => $request->blogcat_id,
        'post_title' => $request->post_title,
        'user_id' => Auth::user()->id,
        'post_title' => $request->post_title,
        'post_slug' => strtolower(str_replace(' ','-', $request->post_title)),
        'short_descp' => $request->short_descp,
        'long_descp' => $request->long_descp
    ]);

    $notification = array(
        'message'=> 'Team Data Update WithOut Image Successfully',
        'alert-type'=> 'success',
    );
    return redirect()->route('all.blog.post')->with($notification);
  }

} 

public function DeletePostBlog(Request $request, $id){
  $blogpost = BlogPost::findOrFail($id);
    $image = $blogpost->post_image;
    unlink($image);
    BlogPost::findOrFail($id)->delete();

    $notification = array(
        'message'=> 'post Blog Data Delete Successfully',
        'alert-type'=> 'success',
    );
    return redirect()->back()->with($notification);

}

public function BlogDetails($slug){
    $blogDetails = BlogPost::where('post_slug', $slug)->firstOrFail();
    $blogCategory = BlogCategory::latest()->get();
    $lblog = BlogPost::latest()->limit(3)->get();
    
return view('frontend.blog.blog_details', compact('blogDetails', 'blogCategory', 'lblog'));

}

public function BlogCatList(Request $request,  $id){
  
    $blog = BlogPost::where('blogcat_id', $id)->get();
    $blogCategory = BlogCategory::latest()->get();
    $lblog = BlogPost::latest()->limit(3)->get();
    return view('frontend.blog.blog_cat_list', compact('blog', 'blogCategory', 'lblog'));
}

}
    


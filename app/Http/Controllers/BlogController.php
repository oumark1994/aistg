<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    //
     //
     public function index(){
        $blogs = Blog::get();
        return view('admin.blogs')->with('blogs',$blogs);
    }
    public function newblog(){
        return view('admin.newblog');
       
    }
    public function addblog(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description'=>'required',
            'blog_date'=>'required',
            'blog_image'=>'image|nullable',
           ]);
        // print($request->input('product_category'));
        if($request->hasFile('blog_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('blog_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('blog_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('blog_image')->storeAs('public/blog_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->blog_date = $request->input('blog_date');
        $blog->blog_image = $fileNameToStore;
        $blog->save();
        return redirect('/blogs')->with('status','The blog has been inserted successfully');

    }
 
    public function editblog($id){

        $blog = Blog::find($id);
        return view('admin.editblog')->with('blog',$blog);
    }
    public function updateblog(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description'=>'required',
            'blog_date'=>'required',
           ]);
        // print($request->input('product_category'));
        $blog =  Blog::find($request->input('id'));
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->blog_date = $request->input('blog_date');

        if($request->hasFile('blog_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('blog_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('blog_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('blog_image')->storeAs('public/blog_images',$fileNameToStore);
            if($blog->blog_image != 'noimage.jpg'){
                Storage::delete('public/blog_images/'.$blog->blog_image);
            }
            $blog->blog_image = $fileNameToStore;

        }
        $blog->update();
        return redirect('/blogs')->with('status','The blog has been modified with success ');

    }
    public function deleteblog($id){
        $blog = Blog::find($id);
        if($blog->blog_image != 'noimage.jpg'){
            Storage::delete('public/blog_images/'.$blog->blog_image);
        }
        $blog->delete();
        return redirect('/blogs')->with('status','The blog has been deleted successfully! '); 
       }
}

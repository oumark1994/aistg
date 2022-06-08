<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function index(){
        $galleries = Gallery::get();
        return view('admin.galleries')->with('galleries',$galleries);
    }
    public function newgallerie(){
        $categories = Category::All()->pluck('name','name');

        return view('admin.newgallerie')->with('categories',$categories);
       
    }
    public function addgallerie(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description'=>'required',
            'categorie'=>'required',
            'galery_image'=>'image|nullable',
           ]);
        // print($request->input('product_category'));
        if($request->hasFile('galery_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('galery_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('galery_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('galery_image')->storeAs('public/gallerie_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $gallerie = new Gallery();
        $gallerie->title = $request->input('title');
        $gallerie->description = $request->input('description');
        $gallerie->categorie = $request->input('categorie');
        $gallerie->galery_image = $fileNameToStore;
        $gallerie->save();
        return redirect('/galleries')->with('status','The gallerie has been inserted successfully');

    }
 
    public function editgallerie($id){
        $categories = Category::All()->pluck('name','name');

        $gallerie = Gallery::find($id);
        return view('admin.editgallerie')->with('gallerie',$gallerie)->with('categories',$categories);

    }
    public function updategallerie(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description'=>'required',
            'categorie'=>'required',
           ]);
        // print($request->input('product_category'));
        $gallerie =  Gallery::find($request->input('id'));
        $gallerie->title = $request->input('title');
        $gallerie->description = $request->input('description');
        $gallerie->categorie = $request->input('categorie');

        if($request->hasFile('galery_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('galery_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('galery_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('galery_image')->storeAs('public/gallerie_images',$fileNameToStore);
            if($gallerie->gallerie_image != 'noimage.jpg'){
                Storage::delete('public/gallerie_images/'.$gallerie->gallerie_image);
            }
            $gallerie->galery_image = $fileNameToStore;

        }
        $gallerie->update();
        return redirect('/galleries')->with('status','The gallerie has been modified with success ');

    }
    public function deletegallerie($id){
        $gallerie = Gallery::find($id);
        if($gallerie->galery_image != 'noimage.jpg'){
            Storage::delete('public/gallerie_images/'.$gallerie->galery_image);
        }
        $gallerie->delete();
        return redirect('/galleries')->with('status','The gallerie has been deleted successfully! '); 
       }
}

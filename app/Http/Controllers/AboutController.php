<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    //
       //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(){
        $abouts = About::get();
        return view('admin.about')->with('abouts',$abouts);
    }
    public function newabout(){
        return view('admin.newabout');
       
    }
    public function addabout(Request $request){
        $this->validate($request,[
            'about' => 'required',
            'description'=>'required',
            'about_image'=>'image|nullable',
           ]);
        // print($request->input('product_category'));
        if($request->hasFile('about_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('about_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('about_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('about_image')->storeAs('public/about_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $about = new About();
        $about->about = $request->input('about');
        $about->description = $request->input('description');
        $about->about_image = $fileNameToStore;
        $about->save();
        return redirect('/abouts')->with('status','The about has been inserted successfully');

    }
    public function abouts(){
        $abouts = About::get();
        return view('admin.about')->with('abouts',$abouts);
    }
    public function editabout($id){
        $about = About::find($id);
        return view('admin.editabout')->with('about',$about);

    }
    public function updateabout(Request $request){
        $this->validate($request,[
            'about' => 'required',
            'description'=>'required',
           ]);
        // print($request->input('product_category'));
        $about =  About::find($request->input('id'));
        $about->about = $request->input('about');
        $about->description = $request->input('description');
        if($request->hasFile('about_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('about_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('about_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('about_image')->storeAs('public/about_images',$fileNameToStore);
            if($about->about_image != 'noimage.jpg'){
                Storage::delete('public/about_images/'.$about->about_image);
            }
            $about->about_image = $fileNameToStore;

        }
        $about->update();
        return redirect('/abouts')->with('status','The about has been modified with success ');

    }
    public function deleteabout($id){
        $about = About::find($id);
        if($about->about_image != 'noimage.jpg'){
            Storage::delete('public/about_images/'.$about->about_image);
        }
        $about->delete();
        return redirect('/about')->with('status','The about has been deleted successfully! ');  
      }
}

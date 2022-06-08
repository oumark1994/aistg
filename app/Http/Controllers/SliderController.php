<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(){
        $sliders = Slider::get();
        return view('admin.sliders')->with('sliders',$sliders);
    }
    public function newslider(){
        return view('admin.newslider');
       
    }
    public function addslider(Request $request){
        $this->validate($request,[
            'description1' => 'required',
            'description2'=>'required',
            'active'=>'nullable',
            'slider_image'=>'image|nullable|max:1999',
           ]);
        // print($request->input('product_category'));
        if($request->hasFile('slider_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('slider_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('slider_image')->storeAs('public/slider_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $slider = new Slider();
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');
        $slider->active = $request->input('active');
        $slider->slider_image = $fileNameToStore;
        $slider->status = 1;
        $slider->save();
        return redirect('/sliders')->with('status','The slider has been inserted successfully');

    }
    public function sliders(){
        $sliders = Slider::get();
        return view('admin.sliders')->with('sliders',$sliders);
    }
    public function editslider($id){
        $slider = Slider::find($id);
        return view('admin.editslider')->with('slider',$slider);

    }
    public function updateslider(Request $request){
        $this->validate($request,[
            'description1' => 'required',
            'description2'=>'required',
            'active'=>'required'
           ]);
        // print($request->input('product_category'));
        $slider =  Slider::find($request->input('id'));
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');
        $slider->active = $request->input('active');

        if($request->hasFile('slider_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('slider_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('slider_image')->storeAs('public/slider_images',$fileNameToStore);
            if($slider->slider_image != 'noimage.jpg'){
                Storage::delete('public/slider_images/'.$slider->slider_image);
            }
            $slider->slider_image = $fileNameToStore;

        }
        $slider->update();
        return redirect('/sliders')->with('status','The slider has been modified with success ');

    }
    public function deleteslider($id){
        $slider = Slider::find($id);
        if($slider->slider_image != 'noimage.jpg'){
            Storage::delete('public/slider_images/'.$slider->slider_image);
        }
        $slider->delete();
        return redirect('/sliders')->with('status','The slider has been deleted successfully! ');    }

public function activate_slider($id){
    $slider = Slider::find($id);
    $slider->status = 1;
    $slider->update();
    return redirect('/sliders')->with('status','Le slider  a ete activee avec succes ! ');
}
public function desactive_slider($id){
    $slider = Slider::find($id);
    $slider->status = 0;
    $slider->update();
    return redirect('/sliders')->with('status','The slider has been desable with success ! ');
}
}
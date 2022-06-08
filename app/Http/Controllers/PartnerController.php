<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    //
    public function index(){
        $partners = Partner::get();
        return view('admin.partners')->with('partners',$partners);
    }
    public function newpartner(){
        return view('admin.newpartner');
       
    }
    public function addpartner(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'partner_image'=>'image|nullable',
           ]);
        // print($request->input('product_category'));
        if($request->hasFile('partner_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('partner_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('partner_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('partner_image')->storeAs('public/partner_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $partner = new Partner();
        $partner->name = $request->input('name');
        $partner->partner_image = $fileNameToStore;
        $partner->save();
        return redirect('/partners')->with('status','The partner has been inserted successfully');

    }
    public function partners(){
        $partners = Partner::get();
        return view('admin.partner')->with('partners',$partners);
    }
    public function editpartner($id){
        $partner = Partner::find($id);
        return view('admin.editpartner')->with('partner',$partner);

    }
    public function updatepartner(Request $request){
        $this->validate($request,[
            'name' => 'required',
           ]);
        // print($request->input('product_category'));
        $partner =  Partner::find($request->input('id'));
        $partner->name = $request->input('name');
        if($request->hasFile('partner_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('partner_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('partner_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('partner_image')->storeAs('public/partner_images',$fileNameToStore);
            if($partner->partner_image != 'noimage.jpg'){
                Storage::delete('public/partner_images/'.$partner->partner_image);
            }
            $partner->partner_image = $fileNameToStore;

        }
        $partner->update();
        return redirect('/partners')->with('status','The partner has been modified with success ');

    }
    public function deletepartner($id){
        $partner = Partner::find($id);
        if($partner->partner_image != 'noimage.jpg'){
            Storage::delete('public/partner_images/'.$partner->partner_image);
        }
        $partner->delete();
        return redirect('/partners')->with('status','The partner has been deleted successfully! ');  
      }
}

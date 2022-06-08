<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    //
    public function index(){
        $members = Member::get();
        return view('admin.members')->with('members',$members);
    }
    public function newmember(){

        return view('admin.newmember');
       
    }
    public function addmember(Request $request){
        $this->validate($request,[
            'firstname' => 'required',
            'lastname'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'picture'=>'image|nullable',
           ]);
        // print($request->input('product_category'));
        if($request->hasFile('picture')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('picture')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('picture')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('picture')->storeAs('public/member_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $member = new Member();
        $member->firstname = $request->input('firstname');
        $member->lastname = $request->input('lastname');
        $member->phone = $request->input('phone');
        $member->picture = $fileNameToStore;
        $member->address = $request->input('address');

        $member->save();
        return redirect('/members')->with('status','The new member has been inserted successfully');

    }
 
    public function editmember($id){

        $member = Member::find($id);
        return view('admin.editmember')->with('member',$member);

    }
    public function updatemember(Request $request){
        $this->validate($request,[
            'firstname' => 'required',
            'lastname'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'picture'=>'image|nullable',
           ]);
        // print($request->input('product_category'));
        $member =  Member::find($request->input('id'));
        $member->firstname = $request->input('firstname');
        $member->lastname = $request->input('lastname');
        $member->phone = $request->input('phone');
        $member->address = $request->input('address');
        if($request->hasFile('picture')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('picture')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('picture')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('picture')->storeAs('public/member_images',$fileNameToStore);
            if($member->member_image != 'noimage.jpg'){
                Storage::delete('public/member_images/'.$member->member_image);
            }
            $member->picture = $fileNameToStore;

        }
        $member->update();
        return redirect('/members')->with('status','The member has been modified with success ');

    }
    public function deletemember($id){
        $member = Member::find($id);
        if($member->picture != 'noimage.jpg'){
            Storage::delete('public/member_images/'.$member->picture);
        }
        $member->delete();
        return redirect('/members')->with('status','The member has been deleted successfully! '); 
       }
       public function memberByid($id){
        $member = Member::find($id);
        return redirect('admin.member')->with('member',$member);
       }
       public function searchmember(Request $request){
        // $search_text = $_GET['search'];  
        // $members = Member::get();
        $this->validate($request,[
            'search' => 'required']);
            $search  = $request->input('search');
        $members = Member::where('firstname','LIKE',"%{$search}%")->get();
        if($members){
            return view('admin.members')->with('members',$members);

        }else{
            return redirect('/members')->with('status','Member not found'); 
        }
        // return print($products);
    }
}

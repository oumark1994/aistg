<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    //
    public function index(){
        $teams = Team::get();
        return view('admin.teams')->with('teams',$teams);
    }
    public function newteam(){

        return view('admin.newteam');
       
    }
    public function addteam(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'position'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'number'=>'required',
            'team_image'=>'image|nullable',
           ]);
        // print($request->input('product_category'));
        if($request->hasFile('team_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('team_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('team_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('team_image')->storeAs('public/team_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $team = new Team();
        $team->name = $request->input('name');
        $team->position = $request->input('position');
        $team->facebook = $request->input('facebook');
        $team->twitter = $request->input('twitter');
        $team->number = $request->input('number');
        $team->team_image = $fileNameToStore;
        $team->save();
        return redirect('/teams')->with('status','The team has been inserted successfully');

    }
 
    public function editteam($id){

        $team = Team::find($id);
        return view('admin.editteam')->with('team',$team);

    }
    public function updateteam(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'position'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'number'=>'required',           ]);
        // print($request->input('product_category'));
        $team =  Team::find($request->input('id'));
        $team->name = $request->input('name');
        $team->position = $request->input('position');
        $team->facebook = $request->input('facebook');
        $team->twitter = $request->input('twitter');
        $team->number = $request->input('number');

        if($request->hasFile('team_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('team_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('team_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('team_image')->storeAs('public/team_images',$fileNameToStore);
            if($team->team_image != 'noimage.jpg'){
                Storage::delete('public/team_images/'.$team->team_image);
            }
            $team->team_image = $fileNameToStore;

        }
        $team->update();
        return redirect('/teams')->with('status','The team has been modified with success ');

    }
    public function deleteteam($id){
        $team = Team::find($id);
        if($team->team_image != 'noimage.jpg'){
            Storage::delete('public/team_images/'.$team->team_image);
        }
        $team->delete();
        return redirect('/teams')->with('status','The team has been deleted successfully! '); 
       }
}

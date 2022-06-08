<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    //
    public function index(){
        $events = Event::get();
        return view('admin.event')->with('events',$events);
    }
    public function newevent(){
        return view('admin.newevent');
       
    }
    public function addevent(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'day'=>'required',
            'month'=>'required',
            'location'=>'required',
            'event_image'=>'image|nullable',
           ]);
        // print($request->input('product_category'));
        if($request->hasFile('event_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('event_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('event_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('event_image')->storeAs('public/event_images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $event = new Event();
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->event_day = $request->input('day');
        $event->event_month = $request->input('month');
        $event->location = $request->input('location');
        $event->event_image = $fileNameToStore;
        $event->save();
        return redirect('/events')->with('status','The event has been inserted successfully');

    }
    public function events(){
        $events = Event::get();
        return view('admin.event')->with('events',$events);
    }
    public function editevent($id){
        $event = Event::find($id);
        return view('admin.editevent')->with('event',$event);

    }
    public function updateevent(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description'=>'required',
            'day'=>'required',
            'location'=>'required',
            'month'=>'required',
           ]);
        // print($request->input('product_category'));
        $event =  Event::find($request->input('id'));
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->event_day = $request->input('day');
        $event->event_month = $request->input('month');
        $event->location = $request->input('location');

        
        if($request->hasFile('event_image')){
            //1:get file name with ext
            $fileNameWithExt = $request->file('event_image')->getClientOriginalName();
            //2:get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST FILE EXTENSION
            $extention = $request->file('event_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore  = $fileName.'_'.time().'.'.$extention;

            //uploader l'image
            $path = $request->file('event_image')->storeAs('public/event_images',$fileNameToStore);
            if($event->event_image != 'noimage.jpg'){
                Storage::delete('public/event_images/'.$event->event_image);
            }
            $event->event_image = $fileNameToStore;

        }
        $event->update();
        return redirect('/events')->with('status','The event has been modified with success ');

    }
    public function deleteevent($id){
        $event = Event::find($id);
        if($event->event_image != 'noimage.jpg'){
            Storage::delete('public/event_images/'.$event->event_image);
        }
        $event->delete();
        return redirect('/events')->with('status','The event has been deleted successfully! ');  
      }
}

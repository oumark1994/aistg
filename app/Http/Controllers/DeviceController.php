<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    //
    public function devices(){
        $devices = Device::get();
        return view('admin.devices')->with('devices',$devices);
    }
    public function newdevice(){
        return view('admin.newdevice');
       
    }
    public function adddevice(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description'=>'required',
           ]);
     
        $device = new Device();
        $device->title = $request->input('title');
        $device->description = $request->input('description');
        $device->save();
        return redirect('/devices')->with('status','The device has been inserted successfully');

    }
    // public function devices(){
    //     $devices = device::get();
    //     return view('admin.device')->with('devices',$devices);
    // }
    public function editdevice($id){
        $device = Device::find($id);
        return view('admin.editdevice')->with('device',$device);

    }
    public function updatedevice(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description'=>'required',
           ]);
        // print($request->input('product_category'));
        $device =  Device::find($request->input('id'));
        $device->title = $request->input('title');
        $device->description = $request->input('description');
        
        return redirect('/devices')->with('status','The device has been modified with success ');

    }
    public function deletedevice($id){
        $device = Device::find($id);
        $device->delete();
        return redirect('/devices')->with('status','The device has been deleted successfully! ');  
      }
}

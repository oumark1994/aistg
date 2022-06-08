<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\About;
use App\Models\Device;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Team;
use App\Models\Partner;
use App\Models\Event;
use App\Models\Blog;


class ClientController extends Controller
{
    //
    public function index(){
        $sliders = Slider::get();
        $abouts = About::get();
        $devices = Device::get();
        $galleries = Gallery::get();
        $teams = Team::get();
        $partners = Partner::get();
        $categories = Category::get();
        $blogs = Blog::orderBy('created_at','desc')->take(6)->get();
        $events = Event::get();
        return view('client.home')->with('sliders',$sliders)->with('abouts',$abouts)->with('devices',$devices)->with('galleries',$galleries)->with('categories',$categories)->with('teams',$teams)->with('partners',$partners)->with('events',$events)->with('blogs',$blogs);
    }
    public function detailgallery($id){
        $gallerie = Gallery::find($id);
        return view('client.detailgallery')->with('gallerie',$gallerie);
    }
}

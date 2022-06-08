<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Collection;

class AdminController extends Controller
{
    //
    public function index(){
        $members = Member::all()->count();
        $collectionSum = Collection::sum('amount');

        return view('admin.index')->with('members',$members)->with('collectionSum',$collectionSum);
    }
  
}

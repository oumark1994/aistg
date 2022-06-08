<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{
    //
        //
        public function index(){

            $collections = Collection::get();
            
            return view('admin.collections')->with('collections',$collections);
        }
        public function collectionByMonth(Request $request){

            // $collections = Collection::get();
            if($request->input('month') == "all"){
                $collections = Collection::orderBy('created_at','asc')->get();
                return view('admin.collections')->with('collections',$collections);


            }else{
                $collections = Collection::where('month',$request->input('month'))->orderBy('created_at','asc')->get();
                return view('admin.collections')->with('collections',$collections);

            }

           
        }
        public function newcollection(){
            $members = Member::All()->pluck('firstname','firstname');

    
            return view('admin.newcollection')->with('members',$members);
           
        }
        public function addcollection(Request $request){
            $this->validate($request,[
                'name' => 'required',
                'month'=>'required',
                'amount'=>'required',
                'payment_date'=>'required'

                
               ]);
           
            $collection = new Collection();
            $collection->name = $request->input('name');
            $collection->month = $request->input('month');
            $collection->amount = $request->input('amount');
            $collection->payment_date = $request->input('payment_date');

            $collection->total = 1000;
            $collection->balance = $collection->total - $collection->amount;
            $collection->save();
            return redirect('/collections')->with('status','The new collection has been inserted successfully');
    
        }
     
        public function editcollection($id){
    
            $collection = Collection::find($id);
            return view('admin.editcollection')->with('collection',$collection);
    
        }
        public function updatecollection(Request $request){
            $this->validate($request,[
                'name' => 'required',
                'month'=>'required',
                'amount'=>'required',
                'payment_date'=>'required',
                
               ]);
            // print($request->input('product_category'));
            $collection =  Collection::find($request->input('id'));
            $collection->name = $request->input('name');
            $collection->month = $request->input('month');
            $collection->amount = $request->input('amount');
            $collection->payment_date = $request->input('payment_date');
            $collection->total = 1000;
            $collection->balance = $collection->total - $collection->amount;
            $collection->save();
 
            $collection->update();
            return redirect('/collections')->with('status','The collection has been modified with success ');
    
        }
        public function deletecollection($id){
            $collection = Collection::find($id);
            $collection->delete();
            return redirect('/collections')->with('status','The collection has been deleted successfully!'); 
           }
           public function collectionByid($id){
            $collection = Collection::find($id);
            return redirect('admin.collection')->with('collection',$collection);
           }
}

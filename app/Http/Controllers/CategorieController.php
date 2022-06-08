<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategorieController extends Controller
{
    //
    public function index(){
        $categories = Category::get();
        return view('admin.categories')->with('categories',$categories);
    }
    public function newcategorie(){
        return view('admin.newcategorie');
       
    }
    public function addcategorie(Request $request){
        $this->validate($request,[
            'name'=>'required'
           ]);
        // print($request->input('product_category'));
       
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        return redirect('/categories')->with('status','The category has been inserted successfully');

    }
  
    public function editcategorie($id){
        $categorie = Category::find($id);
        return view('admin.editcategorie')->with('categorie',$categorie);

    }
    public function updatecategorie(Request $request){
        $this->validate($request,[
            'name' => 'required'
           ]);
        // print($request->input('product_category'));
        $category =  Category::find($request->input('id'));
        $category->name = $request->input('name');
       
        $category->update();
        return redirect('/categories')->with('status','The category has been modified with success ');

    }
    public function deletecategorie($id){
        $categorie = Category::find($id);
        $categorie->delete();
        return redirect('/categories')->with('status','The category has been deleted successfully! ');  
      }
}

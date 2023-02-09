<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    public function all(){
        $subcategories=SubCategory::select('name')->orderBy('id','DESC')->paginate(5);
        return view('admin.subcategory.index',compact('subcategories'));
    }

    public function create(){
        return view('admin.subcategory.create');
    }

    public function store(Request $request){
        $validator=Validator::make([
            'name'=>'required||unique:subcategories,name',
        ]);
        if($validator->fails()){
            return redirect()->route('admin.subcategories.create')->withInput();
        }else{
            SubCategory::create($request->all());
            return redirect()->route('admin.subcategories.all')->with('success','Brand created successfully');
        }
    }
}

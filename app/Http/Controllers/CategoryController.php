<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repository\Modules\Category\CategoryInterface;

class CategoryController extends Controller
{
    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface=$categoryInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $categories=$this->categoryInterface->index();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = $this->categoryInterface->create();
        return view('admin.category.create',compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategory $request)
    {
        $validated = $request->validated();
       
        $this->categoryInterface->store($request);

        return redirect()->route('category.index')->with('success', 'New Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories=$this->categoryInterface->show($id);
        return view('admin.category.show',compact('categories'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=$this->categoryInterface->edit($id);
        if(!$category){
            return redirect()->route('category.index')->with('errors', 'Category Is Not Found');
        }else{
            return view('admin.category.edit',compact('category'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:categories,name,'.$id,
        ]);
        $this->categoryInterface->update($id,$request);
        
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryInterface->destroy($id);
        return redirect()->route('category.index')->with('success', 'Category Deleted Successfully');
    }
}

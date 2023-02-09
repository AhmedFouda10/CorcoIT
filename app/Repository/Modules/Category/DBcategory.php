<?php

namespace App\Repository\Modules\Category;

use App\Models\Category;
use App\Repository\Modules\Category\CategoryInterface;


class DBcategory implements CategoryInterface
{
    public function index()
    {
        return Category::orderBy('id','DESC')->paginate(5);
    }

    public function create()
    {

        
        return Category::pluck('name','id')->all();
    }

    public function store($request)
    {
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        return Category::create($input);

    }

    public function show($id)
    {
        return Category::where('parent_id', '=', $id)->get();
    }

    public function edit($id)
    {
        return Category::find($id);
    }

    public function update($id, $request)
    {
        $category=Category::find($id);
        $category->name=$request->name;
        return $category->update();
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        if(!$category){
            return redirect()->route('category.index')->with('errors', 'No Exist this Category.');
        }else{
            return $category->delete();
        }
    }
}

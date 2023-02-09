<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index(){
        $news=News::orderBy('id','DESC')->paginate(5);
        return view('admin.news.index',compact('news'));
    }

    public function create()
    {
        $categories = Category::select('id','name')->get();
        return view('admin.news.create',compact('categories'));
    }

    public function show(Request $request)
    {
        // dd($request);
    }

    public function store(Request $request)
    {
        $validatoer=Validator::make($request->all(),[
            'title'=>'required',
            'body'=>'required',
            'image'=>'nullable|mimes:png,jpg',
            'category_id'=>'required'
        ]);
        if($validatoer->fails()){
            // dd($request);
            return redirect()->route('news.create')->withInput();
        }else{
            
            $check=News::where('title',$request->title)->where('category_id',$request->category_id)->first();
            if($check){
                return redirect()->route('news.create')->with('error', 'this New allready exists.');
            }else{
                $new=new News();
                $new->title=$request->title;
                $new->body=$request->body;
                $new->category_id=$request->category_id;
                if ($request->hasFile('image')) {
                    $file = $request->image;
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move('backend/assets/images/news/', $filename);
                    $new->image = $filename;
                }
                $new->save();
                return redirect()->route('news.index')->with('success', 'New added successfully.');
            }



            
        }
    }

    public function edit($id)
    {
        $categories = Category::select('id','name')->get();
        $news = News::find($id);
        return view('admin.news.edit',compact('categories','news'));
    }

    public function update(Request $request, $id)
    {
        $validatoer=Validator::make($request->all(),[
            'title'=>'required',
            'body'=>'required',
            'image'=>'nullable|mimes:png,jpg',
            'category_id'=>'required'
        ]);
        if($validatoer->fails()){
            // dd($request);
            return redirect()->route('news.edit')->withInput();
        }else{
            
            $check=News::where('title',$request->title)->where('category_id',$request->category_id)->first();
            if($check && !$check->id==$id){
                return redirect()->route('news.edit')->with('error', 'this New allready exists.');
            }else{
                $new=new News();
                $new->title=$request->title;
                $new->body=$request->body;
                $new->category_id=$request->category_id;
                if ($request->hasFile('image')) {
                    $file = $request->image;
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move('backend/assets/images/news/', $filename);
                    $new->image = $filename;
                }
                $new->update();
                return redirect()->route('news.index')->with('success', 'New updated successfully.');
            }
            
        }

    }

    public function destroy($id)
    {
        $new=News::find($id);
        if(!$new){
            return redirect()->route('news.index')->with('errors', 'No Exist this New.');
        }else{
            $path = public_path('backend/assets/images/news/' . $new->image);
                if (File::exists($path)) {
                    File::delete($path);
                }
            $new->delete();
            return redirect()->route('news.index')->with('success', 'News Deleted Successfully');
        }
    }
}

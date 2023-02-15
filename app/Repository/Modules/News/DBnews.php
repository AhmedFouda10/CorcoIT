<?php
namespace App\Repository\Modules\News;

use App\Models\Category;
use App\Models\News;
use App\Repository\Modules\News\NewsInterface;
use Illuminate\Support\Facades\File;

class DBnews implements NewsInterface
{
    public function index()
    {
        return News::orderBy('id', 'DESC')->paginate(5);
    }

    public function create()
    {
        return Category::select('id', 'name')->where('parent_id','0')->get();
        // return Category::where('parent_id', null)->orderby('name', 'asc')->get();
    }

    public function store($request)
    {
        $check = News::where('title', $request->title)->where('category_id', $request->category_id)->first();
        if ($check) {
            return redirect()->route('news.create')->with('error', 'this New allready exists.');
        } else {
            $new = new News();
            $new->title = $request->title;
            $new->body = $request->body;
            $new->category_id = $request->category_id;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('backend/assets/images/news/', $filename);
                $new->image = $filename;
            }
            return $new->save();
        }
    }

    public function edit($id)
    {
        $categories = Category::select('id', 'name')->get();
        $news = News::find($id);

        return $data = [
            'categories' => $categories,
            'news' => $news,
        ];
    }

    public function update($id, $request)
    {
        $check = News::where('title', $request->title)->where('category_id', $request->category_id)->first();
        if ($check && !$check->id == $id) {
            return redirect()->route('news.edit')->with('error', 'this New allready exists.');
        }
        else {
            $new = News::find($id);
            $new->title = $request->title;
            $new->body = $request->body;
            $new->category_id = $request->category_id;
            if ($request->hasFile('image')) {
                $path = public_path('backend/assets/images/news/' . $new->image);
                if (File::exists($path)) {
                    File::delete($path);
                }
                    $file = $request->image;
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move('backend/assets/images/news/', $filename);
                    $new->image = $filename;
                
            }
            return $new->update();
        }
    }

    public function destroy($id)
    {
        $new = News::find($id);
        if (!$new) {
            return redirect()->route('news.index')->with('errors', 'No Exist this New.');
        } else {
            $path = public_path('backend/assets/images/news/' . $new->image);
            if (File::exists($path)) {
                File::delete($path);
            }
            return $new->delete();
        }
    }

}

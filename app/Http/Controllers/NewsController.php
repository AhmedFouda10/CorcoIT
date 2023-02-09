<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddNews;
use App\Http\Requests\UpdateNews;
use App\Models\News;
use App\Repository\Modules\News\NewsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    private $newsInterface;

    public function __construct(NewsInterface $newsInterface)
    {
        $this->newsInterface = $newsInterface;
    }
    public function index()
    {
        $news = $this->newsInterface->index();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = $this->newsInterface->create();
        return view('admin.news.create', compact('categories'));
    }

    public function show($id)
    {

    }

    public function store(AddNews $request)
    {
        $validated = $request->validated();
        $this->newsInterface->store($request);
        return redirect()->route('news.index')->with('success', 'New added successfully.');
    }

    public function edit($id)
    {
        $data = $this->newsInterface->edit($id);
        $categories = $data['categories'];
        $news = $data['news'];
        return view('admin.news.edit', compact('categories', 'news'));
    }

    public function update(UpdateNews $request, $id)
    {
        $validated = $request->validated();
        $this->newsInterface->update($id ,$request);
        return redirect()->route('news.index')->with('success', 'New updated successfully.');
        
    }

    public function destroy($id)
    {
        $this->newsInterface->destroy($id);
        return redirect()->route('news.index')->with('success', 'News Deleted Successfully');
    }
}

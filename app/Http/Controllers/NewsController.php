<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
    
        $categories = Category::orderBy('id','desc')->paginate(3);
        return view('news.index', [
            'categories' => $categories
        ]);
    }

    public function categorize(int $option)
    {
        $news = News::select(['news.*', 'categories.title as category'])
            ->join('categories', 'categories.id', '=', 'category_id')
            ->where('category_id', '=', $option)
            ->get();

        return view('news.category', [
            'categoryNews' => $news,
        ]);
    }

    public function detalize(int $option, int $id)
    {
        $news = News::select(['news.*', 'link', 'author'])
            ->join('sources', 'sources.id', '=', 'source_id')
            ->where('news.id', '=', $id)
            ->get();
        return view('news.detailed', [
            'news' => $news,
        ]);
    }

    public function contact()
    {
        return view('news.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'request' => ['required', 'string']
        ]);

        //чтоб получать только те данные которые необходимы (без всяких инъекций)
        $data = $request->only(['name', 'number', 'request']);
        dd($data);
        file_put_contents('request.txt', $data);
    }
}

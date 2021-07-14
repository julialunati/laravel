<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'categories' => $this->provideCategories()
        ]);
    }

    public function categorize(int $option)
    {
        return view('news.category', [
            'categoryNews' => $this->provideSpecificCategoryNews($option),
        ]);
    }

    public function detalize(int $option, int $id)
    {
        return view('news.detailed', [
            'news' => $this->provideNewsById($id),
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

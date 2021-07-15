<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::select(['news.*', 'categories.title as category'])
            ->join('categories', 'categories.id', '=', 'category_id')
            ->get();

        return view('admin.news.index', [
            'news' => $news,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $news = News::select(['news.*', 'categories.title as category'])
        // ->join('categories', 'categories.id', '=', 'category_id')
        // ->get();
        $categories = Category::select(['id', 'title', 'created_at'])->get();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
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
            'title' => ['required', 'string']
        ]);

        $news = News::create(
            $request->only(['title', 'category_id', 'source_id', 'status', 'description'])
        );

        if ($news) {
            return redirect()->route('admin.news.index')->with('success', 'News has been successfully created.');
        }
        return back()->with('error', 'Something went wrong.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $statusNews = $news->fill(
            $request->only(['title', 'category_id', 'source_id', 'status', 'description'])
        )->save();

        if ($statusNews) {
            return redirect()->route('admin.news.index')->with('success', 'Category has been successfully updated.');
        }
        return back()->with('error', 'Something went wrong.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

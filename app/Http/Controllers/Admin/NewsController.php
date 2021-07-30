<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsUpdate;
use App\Http\Requests\NewsStore;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Dotenv\Exception\ValidationException;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::select(['news.*', 'categories.title as category'])
            ->join('categories', 'categories.id', '=', 'category_id')
            ->get();

        return view('admin.news.index', [
            'newsList' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    public function store(NewsStore $request, News $news)
    {

        $data = $request->validated();

        if($request->hasFile('image')) {
			$file = $request->file('image');
			$fileName = md5($file->getClientOriginalName() . time());
			$fileExt = $file->getClientOriginalExtension();
			$newFileName = $fileName . "." . $fileExt;
			$data['image'] = $file->storeAs('news', $newFileName, 'public');
		}
        $statusNews = $news->fill($data)->save();

        // $statusNews = News::create(
        //     $request->only(['category_id', 'source_id', 'title', 'status', 'description', 'image'])
        // );

        if ($statusNews) {
            return redirect()->route('admin.news.index')
            ->with('success', __('message.admin.news.created.success'));
        }
        return back()->with('error', __('message.admin.news.created.fail'));
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
    public function update(NewsUpdate $request, News $news)
    {
        $data = $request->validated();

        if($request->hasFile('image')) {
			$file = $request->file('image');
            // dd($file);
            //получим имя файла
			$fileName = md5($file->getClientOriginalName() . time());
            //получим расширение файла
			$fileExt = $file->getClientOriginalExtension();
            //новое имя файла
			$newFileName = $fileName . "." . $fileExt;

			$data['image'] = $file->storeAs('news', $newFileName, 'public');
		}
        $statusNews = $news->fill($data)->save();

        if ($statusNews) {
            return redirect()->route('admin.news.index')
                ->with('success', __('message.admin.news.updated.success'));
        }
        return back()->with('error', __('message.admin.news.updated.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(News $news)
    {
        $status = $news->delete();
        if ($status) {
            return response()->json(['ok' => 'ok']);
        }
    }
}

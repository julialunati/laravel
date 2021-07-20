<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('news')
            ->select(['id', 'title', 'created_at'])
            ->get();

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create(
            $request->only(['title'])
        );

        if ($category) {
            return redirect()->route('admin.categories.index')->with('success', 'Category has been successfully created.');
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $statusCategory = $category->fill(
            $request->only(['title'])
        )->save();

        if ($statusCategory) {
            return redirect()->route('admin.categories.index')->with('success', 'Category has been successfully updated.');
        }
        return back()->with('error', 'Something went wrong.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $status = $category->delete();
        if ($status) {
            return response()->json(['ok' => 'ok']);
        }
    }
}

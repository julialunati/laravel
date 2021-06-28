<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'newsList' => $this->news,
            'arr' => $this->arr
        ]);
    }

    public function show(int $id)
    {
        return "новость c id=$id";
    }

    public function display(string $city)
    {
        foreach ($this->arr as $key => $values) {
            if ($city === $key) {
                return view('news.display', [
                    'key' => $key,
                    'values' => $values
                ]);
            }
        }
    }

    public function detail(string $city, int $id)
    {
        foreach ($this->arr as $key => $values) {
            if ($city === $key) {
                return $values[$id - 1]['description'];
            }
        }
    }
}

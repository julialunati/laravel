<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'news' => $this->news
        ]);
    }

    public function categorize(string $option)
    {
        foreach ($this->news as $city => $facts) {
            if ($option === $city) {
                return view('news.category', [
                    'city' => $city,
                    'facts' => $facts
                ]);
            }
        }
    }

    public function detalize(string $option, int $id)
    {
        foreach ($this->news as $city => $facts) {
            if ($option === $city) {
                return $facts[$id - 1]['description'];
            }
        }
    }
}

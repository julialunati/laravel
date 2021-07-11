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

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Jobs\NewsJob;
use Illuminate\Http\Request;
use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class ParserController extends Controller
{
    public function __invoke(Parser $parser)
    {
        $urls = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/music.rss',
        ];

        foreach ($urls as $url) {
            dispatch(new NewsJob($url));
        }
        return redirect()->route('admin.news.index')
        ->with('success', 'News has been downloaded successfully');
    }
}

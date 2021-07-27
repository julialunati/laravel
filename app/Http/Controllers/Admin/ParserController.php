<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class ParserController extends Controller
{
    public function __invoke(Parser $parser)
    {
        $arr = $parser->getParsedList("https://news.yandex.ru/football.rss");

        // сохранение информации с открытого источника
        $category = Category::create(
            ['title' => $arr['title']]
        );

        foreach ($arr['news'] as $news){
            News::create([
                'category_id' => $category->id,
                'source_id' => 1,
                'title' => $news['title'],
                'status' => 'draft',
                'description' => $news['description'],
                ]);
        }

        return redirect()->route('admin.news.index')->with('success');
    }
}

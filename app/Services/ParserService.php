<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\News;

class ParserService implements Parser
{
    public function getParsedList(string $url): array
    {
        $xml = XmlParser::load($url);
        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        // return $data;
    }

    public function saveNewsInFile(string $url): void
    {
        $parsedList = $this->getParsedList($url);
        $serialize  = json_encode($parsedList);
        $explode = explode("/", $url);
        $fileName = end($explode);

        Storage::append('/news/' . $fileName, $serialize);
    }

    public function saveNewsInTable(string $url): void
    {

        $arr = $this->getParsedList($url);
        // сохранение информации с открытого источника
        $category = Category::create(
            ['title' => $arr['title']]
        );

        foreach ($arr['news'] as $news) {
            News::create([
                'category_id' => $category->id,
                'source_id' => 1,
                'title' => $news['title'],
                'status' => 'draft',
                'description' => $news['description'],
            ]);
        }

    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table = 'news';

    public function getNews()
    {
        return DB::table($this->table)->select(['id', 'title', 'status', 'description', 'created_at'])->get();
    }

    public function getAllNews()
    {
        return DB::table($this->table)
        ->join('categories', 'categories.id', '=', 'category_id')
        ->select(['news.*', 'categories.title as category'])
        ->get();
    }

    public function getNewsById($id)
    {
        return DB::table($this->table)
        ->join('sources', 'sources.id', '=', 'source_id')
        ->select(['news.*', 'link', 'author'])
        ->where('news.id','=',$id)
        ->get();
    }

    public function getSpecificCategoryNews($id)
    {
        return DB::table($this->table)
        ->join('categories', 'categories.id', '=', 'category_id')
        ->select(['news.*', 'categories.title as category'])
        ->where('category_id','=',$id)
        ->get();
    }
}

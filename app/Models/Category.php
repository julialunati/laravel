<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = "categories";

    public function getCategories()
    {
        return DB::table($this->table)->select(['id', 'title', 'created_at'])->get();
    }

    public function getCategoryById($id)
    {
        return DB::table($this->table)->find($id);
    }
}

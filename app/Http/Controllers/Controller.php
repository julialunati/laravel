<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\News;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function provideCategories()
    {
        $categoryModel = new Category();
        return $categoryModel->getCategories();
    }

    public function createNewsModel()
    {
        return new News();
    }

    public function provideAllNews()
    {
        // $newsModel = new News();
        // return $newsModel->getAllNews();
        return $this->createNewsModel()->getAllNews();
    }

    public function provideSpecificCategoryNews($id)
    {
        // $newsModel = new News();
        // return $newsModel->getSpecificCategoryNews($id);
        return $this->createNewsModel()->getSpecificCategoryNews($id);
    }

    public function provideNewsById($id)
    {
        // $newsModel = new News();
        // return $newsModel->getSpecificCategoryNews($id);
        return $this->createNewsModel()->getNewsById($id);
    }
}

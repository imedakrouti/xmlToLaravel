<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ImportResource;
use App\Models\Article;
use App\Models\Import;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    public function index()
    {
        $articles = Article::with('import')->get();
        //dd($articles);
        $data['Article'] =  ArticleResource::collection($articles);
        return $this->sendResponse($data, 'list of articles');
    }
}

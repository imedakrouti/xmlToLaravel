<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\ImportRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ImportResource;
use App\Models\Article;
use App\Models\Import;

class ImportController extends BaseController
{
    public function import(ImportRequest $request)
    {
        $rss = $request->siteRssUrl;
        // Download the RSS feed
        $import = $this->importFromUrl($rss);
        // Parse the XML
        $xml = simplexml_load_string($import->rawContent);
        $articles = $xml->channel->item;
        foreach ($articles as $article) {
            $articleData = [
                'externalId' => $article->guid,
                'importDate' => $import->importDate,
                'title' => $article->title,
                'description' => $article->description,
                'publicationDate' =>  Carbon::createFromFormat('D, d M Y H:i:s O', $article->pubDate),
                'link' =>  $article->link,
                'mainPicture' => (string) $article->enclosure['url'],
                'import_id' => $import->id
            ];
            Article::firstOrCreate(['externalId' => $articleData['externalId']], $articleData);
        }
        $data['import'] =  new ImportResource($import);
        return $this->sendResponse($data, 'Article saved succesfully');
    }

    public function importFromUrl($rss)
    {
        $import = Import::create([
            'importDate' => now(),
            'rawContent' => Http::get($rss)->body(),
        ]);
        return $import;
    }
}

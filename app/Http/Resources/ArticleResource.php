<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'externalId' => $this->externalId,
            'importDate' => $this->importDate,
            'title' => $this->title,
            'description' => $this->description,
            'publicationDate' =>  Carbon::createFromFormat('Y-m-d H:i:s', $this->publicationDate)->format('D, d M Y H:i:s O'),
            'link' => $this->link,
            'mainPicture' => $this->mainPicture,
            'vowel_word' => $this->VowelWord,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'import' => (new ImportResource($this->import))
        ];
    }
}

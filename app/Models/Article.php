<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['import_id', 'externalId', 'importDate', 'title', 'description', 'publicationDate', 'link', 'mainPicture'];


    public function import()
    {
        return $this->belongsTo(Import::class);
    }
}

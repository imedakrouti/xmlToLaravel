<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;

    protected $fillable = [
        'importDate',
        'rawContent',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['import_id', 'externalId', 'importDate', 'title', 'description', 'publicationDate', 'link', 'mainPicture'];
    protected $appends = ['vowel_word'];



    public function getVowelWordAttribute()
    {
        $title = $this->title;
        $words = explode(" ", $title);
        $vowels = ['a', 'e', 'i', 'o', 'u', 'y'];
        $vowelCounts = [];
        foreach ($words as $word) {
            $count = 0;
            foreach (str_split($word) as $char) {
                if (in_array(strtolower($char), $vowels)) {
                    $count++;
                }
            }
            $vowelCounts[$word] = $count;
        }
        arsort($vowelCounts);
        $mostVowels = array_keys($vowelCounts)[0];
        $longest = "";
        foreach ($vowelCounts as $word => $count) {
            if (strlen($word) > strlen($longest)) {
                $longest = $word;
            }
        }
        return ($mostVowels == $longest) ? $mostVowels : $longest;
    }

    public function import()
    {
        return $this->belongsTo(Import::class);
    }
}

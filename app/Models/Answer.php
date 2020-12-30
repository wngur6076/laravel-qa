<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        $markdown = new \League\CommonMark\CommonMarkConverter(['allow_unsafe_links' => false]);

        return $markdown->convertToHtml($this->body);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function($answer) {
            $answer->question->increment('answers_count');
            $answer->question->save();
        });
    }
}

<?php

namespace App\Models;

use App\Models\LessWord;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\UserWord;
use Auth;
use App\Models\WordAnswer;

class Word extends Model
{
    protected $fillable = [
        'content', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function wordAnswers()
    {
        return $this->hasMany(WordAnswer::class);
    }

    public function lessonWords()
    {
        return $this->hasMany(LessonWord::class);
    }

    public function userWord()
    {
        return $this->belongsToMany(User::class, 'user_words', 'word_id', 'user_id');
    }

    public function getWord($categoryId,$statusRadio)
    {
        $listWord = $this->with('category')
            ->where('category_id', $categoryId)
            ->get();
        switch ($statusRadio) {
            case 'all':
                $listWord = $this->with('category')
                    ->where('category_id', $categoryId)
                    ->get();
                break;
            case 'learn':
                $listWord = Auth::user()
                    ->userWord()
                    ->where('category_id', $categoryId)
                    ->get();
                break;
            case 'notlearn':
                $wordLearned = userWord::lists('word_id');
                $listWord = $this->whereNotIn('id', $wordLearned)
                    ->where('category_id', $categoryId)
                    ->get();
                break;
            default:
                break;
        }

        return $listWord;
    }

    public function getQuestion($categoryId)
    {
        $wordAnswerData = $this->with('wordAnswers')->where('category_id', $categoryId)->get();

        return $wordAnswerData;
    }
}

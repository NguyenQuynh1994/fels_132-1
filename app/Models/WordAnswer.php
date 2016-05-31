<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordAnswer extends Model
{
    const IS_CORRECT = 1;

    protected $fillable = [
        'content', 'word_id', 'correct',
    ];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function lessWords()
    {
        return $this->hasMany(LessWord::class);
    }

    public function getWordAnswer($wordId)
    {
        $wordAnswer = $this->where('word_id', $wordId)->get();

        return $wordAnswer;
    }

    public function createAnswer($request, $wordId)
    {
        $wordAnswer = [
            'content' => $request->content,
            'word_id' => $wordId,
            'correct' => $request->correct
        ];

        if ($this->create($wordAnswer)) {
            return true;
        }

        return false;
    }

    public function updateAnswer($request)
    {
        $wordAnswer = [
            'content' => $request->content,
            'correct' => $request->correct
        ];

        if ($this->update($wordAnswer)) {
            return true;
        }

        return false;
    }

    public function destroyAnswer($id)
    {
        if ($this->destroy($id)) {
            return true;
        }

        return false;
    }
}

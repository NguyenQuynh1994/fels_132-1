<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Word;
use App\Models\Lesson;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }

    public function createCategory($name)
    {
        if ($this->create(['name' => $name])) {
            return true;
        }

        return false;
    }

    public function updateCategory($name)
    {
        $categoryData = [
            'name' => $name
        ];

        if ($this->update($categoryData)) {
            return true;
        }

        return false;
    }

    public function destroyCategory($id)
    {
        $category = $this->find($id);
        $categoryData = $category->words()->get();

        if (!count($categoryData)) {
            if ($category->delete()) {
                return true;
            }
        }

        return false;
    }
}

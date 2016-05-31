<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Word;

class ManageWordController extends Controller
{
    public function store(Request $request)
    {
        $word = $request->only(['content', 'category_id']);
        Word::create($word);

        return redirect('admin/word');
    }

    public function create()
    {
        $categories = Category::lists('name', 'id');

        return view('admin/manageWord/create', compact('categories'));
    }

    public function index()
    {
        $words = Word::with('category')->get();

        return view('admin/manageWord/index', compact('words'));
    }

    public function edit($id)
    {
        $word = Word::findOrFail($id);
        $categories = Category::lists('name', 'id');

        return view('admin/manageWord/edit', compact('word', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $word = Word::findOrFail($id);

        if ($word->update($request->all())) {
            $flashMessage = 'Update word successfully';
        } else {
            $flashMessage = 'Failed on update word';
        }

        return redirect('admin/word');
    }

    public function destroy($id)
    {
        try {
            $word = Word::findOrFail($id);
            $word->delete();
            $flashMessage = 'Delete lesson successfully';
        } catch (ModelNotFoundException $e) {
            $flashMessage = 'Failed when try delete word';
        }

        return redirect()->route('admin.word.index')->with([
            'flash_message' => $flashMessage
        ]);
    }

    public function show($id)
    {
        $word = Word::findOrFail($id);
        $wordAnswers = $word->wordAnswers;
        session()->flash('wordId', $word->id);
        session()->flash('wordContent', $word->content);

        return view('admin.wordAnswer.index', [
            'wordAnswers' => $wordAnswers,
            'word' => $word,
        ]);
    }
}

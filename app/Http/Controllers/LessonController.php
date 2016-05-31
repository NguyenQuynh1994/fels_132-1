<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;
use App\Models\LessonWord;
use App\Models\WordAnswer;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\Word;

class LessonController extends Controller
{
    public function __construct()
    {
        session()->keep([
            'totalQuestions',
            'categoryName',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lessons = new Lesson;
        $word = new Word;
        $userId = Auth::user()->id;
        $categoryId = $request->input('categoryId');
        $category = Category::findOrFail($categoryId);
        $words = $word->getQuestion($categoryId);

        if (count($words)) {
            $lessonId = $lessons->createLesson($userId, $categoryId);
            session()->flash('categoryName', $category->name);

            return redirect()->action('LessonWordController@index', [
                'categoryId' => $categoryId,
                'lessonId' => $lessonId
            ]);
        }

        $error = 'Not enough data to create lesson';

        return redirect()->back()->with(['errors' => $error]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = new Lesson;
        $resultOptions = $lesson->createResultOption($id);
        $totalCorrect = $lesson->totalCorrect($id);

        return view('user.lesson.result', [
            'resultOptions' => $resultOptions,
            'totalCorrect' => $totalCorrect
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

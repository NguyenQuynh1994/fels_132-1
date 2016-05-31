<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\WordAnswer;
use App\Models\Word;
use Session;

class ManageWordAnswerController extends Controller
{
    public function __construct()
    {
        session()->keep([
            'wordId',
            'wordContent',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wordAnswer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wordAnswer = new WordAnswer;
        $wordId = session()->get('wordId');
        $checkCreate = $wordAnswer->createAnswer($request, $wordId);

        if ($checkCreate) {
            $error = 'Create Success';
        } else {
            $error = 'Fail, Can not create Category';
        }

        return redirect()->action('Admin\ManageWordController@show', ['wordId' => $wordId])->with(['errors' => $error]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wordAnswer = WordAnswer::findOrFail($id);

        return view('admin.wordAnswer.edit', ['wordAnswer' => $wordAnswer]);
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
        $wordAnswer = WordAnswer::findOrFail($id);
        $checkUpdate = $wordAnswer->updateAnswer($request);
        $wordId = session()->get('wordId');

        if ($checkUpdate) {
            $error = 'Update success';
        } else {
            $error = 'Fail, can not update';
        }

        return redirect()->action('Admin\ManageWordController@show', ['wordId' => $wordId])->with(['errors' => $error]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wordAnswer = new WordAnswer;
        $wordId = session()->get('wordId');
        $checkDestroy = $wordAnswer->destroyAnswer($id);

        if ($checkDestroy) {
            $error = 'Delete success';
        } else {
            $error = 'Fail, not delete';
        }

        return redirect()->action('Admin\ManageWordController@show', ['wordId' => $wordId])->with(['errors' => $error]);
    }
}

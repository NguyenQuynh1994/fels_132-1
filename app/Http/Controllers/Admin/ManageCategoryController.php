<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Word;

class ManageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $checkCreate = $category->createCategory($request->categoryName);

        if ($checkCreate) {
            $error = 'Create Success';
        } else {
            $error = 'Fail, Can not create Category';
        }

        return redirect()->route('admin.category.index')->with(['errors' => $error]);
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
        $category = Category::findOrFail($id);

        return view('admin.category.edit')->with(['category' => $category]);
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
        $category = Category::findOrFail($id);
        $checkUpdate = $category->updateCategory($request->categoryName);

        if ($checkUpdate) {
            $error = 'Update Sucess';
        } else {
            $error = 'Fail, Can not update Category';
        }

        return redirect()->route('admin.category.index')->with(['errors' => $error]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = new Category;
        $checkDelete = $category->destroyCategory($id);

        if ($checkDelete) {
            $error = 'Delete success';
        } else {
            $error = 'Fail, not delete';
        }

        return redirect()->route('admin.category.index')->with(['errors' => $error]);
    }
}

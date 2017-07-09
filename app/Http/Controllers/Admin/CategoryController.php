<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::orderBy('order', 'desc')->paginate(10);
        return view ('admin/categories.index')->with ('categories', $categories);
    }


    public function create()
    {
        return view ('admin/categories/create');
    }


    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name'    => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $category = Category::create($request->all());

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('category.show')->with('category', $category);
    }

   
    public function edit($id)
    {
        
        $category = Category::findOrFail($id);
        return view('admin/categories.edit')->with('category', $category);
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
        /*dd($request);*/
        $validator = Validator::make($request->all(), [
            'name'    => 'required|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->fill($request->all());
        $category->save();

        return redirect()->route('categories.index', $category->id);
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

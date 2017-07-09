<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Advert;
use App\Models\Category;

use Illuminate\Http\Request;
use Validator;

class AdvertController extends Controller
{
    public function index()
    {
        $adverts = Advert::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.adverts.index')->with('adverts', $adverts);
    }

    
    public function create()
    {
        $adverts = Advert::All();
        $categories = Category::all();
        return view ('admin/adverts.create')->with('categories', $categories);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number'    => 'required|max:255',
            'title'    => 'required',
            'category_id' => 'required|exists:categories,id',

        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $adverts = Advert::create($request->all());
        return redirect()->route('adverts.index');
    }

    public function show($id)
    {
        $advert = Advert::findOrFail($id);
        return view('admin.adverts.show')->with('advert', $advert);
    }

    public function edit($id)
    {
        $adverts = Advert::findOrFail($id);
        $categories = Category::all();
        return view('admin/adverts.edit')->with('adverts', $adverts)->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
     $validator = Validator::make($request->all(), [
            'number'    => 'required|max:255',
            'title'    => 'required',
            'category_id' => 'required|exists:categories,id',

        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $advert = Advert::findOrFail($id);
        $advert->fill($request->all());
        $advert->save();

        return redirect()->route('adverts.index', $advert->id);
    }

    public function destroy($id)
    {
       //
    }

}

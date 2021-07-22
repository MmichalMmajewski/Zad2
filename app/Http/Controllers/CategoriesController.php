<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Entry;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;

class CategoriesController extends Controller
{
    public function index (){
        $categories = Category::all();
        return view('categories.index', ['output_categories' => $categories]);
    }

    public function create (){
        return view('categories.create');
    }
    public function store(CategoryStoreRequest $request)
    {
        $category = new Category();

        $category->name = $request->name;

        $category->save();

        return redirect()->route('category-all')->with('message','Kategoria dodana pomyślnie');    
    }
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', ['edit_category' => $category]); 
    }
    public function update($id, CategoryStoreRequest $request)
    {
        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect()->route('category-all')->with('message','Kategoria zmieniona pomyślnie');
    }
    public function show($id)
    {
        $category = Category::with('entry')->where('id',$id)->firstorFail();

        return view('categories.single',['category' => $category]);
    }
    public function delete($id)
    {
        Category::destroy($id);

        return redirect()->route('category-all')->with('message','Kategoria usunięta');
    }
}

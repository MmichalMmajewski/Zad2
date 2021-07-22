<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Category\Category as CategoryResource;
use App\Models\Category;
use App\Models\Entry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return CategoryResource::collection($categories);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoryStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = new Category();

        $category->name = $request->name;

        $category->save();

        return new CategoryResource($category);
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CategoryStoreRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, CategoryStoreRequest $request)
    {
        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::with('entry')->findOrFail($id);

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        $categories = Category::all();

        return CategoryResource::collection($categories);
    }
}

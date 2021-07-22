<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\EntryStoreRequest;

class EntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::with('category')->get();
        return view('entries.index', ['entries' => $entries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('entries.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\EntryStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntryStoreRequest $request)
    {
        $entry = new Entry();

        $entry->name = $request->name;
        $entry->www = $request->www;
        $entry->address = $request->address;
        $entry->content = $request->content;
        $entry->category_id = $request->category_id;

        $entry->save();

        return redirect()->route('entries.index')->with('message','Wpis dodany pomyślnie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entry = Entry::with('category')->get()->where('id', $id);

        return view('entries.single', ['entry'=>$entry]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entry = Entry::find($id);
        $categories = Category::all();
        return view('entries.edit', compact('entry', 'categories') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\EntryStoreRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EntryStoreRequest $request, $id)
    {
        $entry = Entry::find($id);

        $entry->name = $request->name;
        $entry->www = $request->www;
        $entry->address = $request->address;
        $entry->content = $request->content;
        $entry->category_id = $request->category_id;
        $entry->save();

        return redirect()->route('entries.index')->with('message','Wpis zmieniony pomyślnie');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Entry::destroy($id);

        return redirect()->route('entries.index')->with('message','Wpis został usunięty');
    }
}

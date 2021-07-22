<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Entry;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Entry\Entry as EntryResource;
use App\Http\Requests\EntryStoreRequest;
use App\Http\Requests\EntryUpdateRequest;


class EntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::all();

        return EntryResource::collection($entries);
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

        return new EntryResource($entry);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entry = Entry::with('category')->findOrFail($id);

        return new EntryResource($entry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\EntryUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, EntryUpdateRequest $request)
    {
        $entry = Entry::find($id);

        $entry->name = $request->name;
        $entry->www = $request->www;
        $entry->address = $request->address;
        $entry->content = $request->content;
        $entry->category_id = $request->category_id;
        $entry->save();

        return new EntryResource($entry);
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

        $entries = Entry::all();

        return EntryResource::collection($entries);
    }
}

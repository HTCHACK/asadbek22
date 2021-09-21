<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\GalleryRequest;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        
    }

    public function index()
    {
        return response()->json([
            'all' => Gallery::all(),
            'status' => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $created = Gallery::create([
            'name' => $request->name,
            'picture' => $request->hasFile('picture') ? $request->file('picture')->storeAs('public/', Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension()) : null
        ]);

        return response()->json([
            'created' => $created,
            'status' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showGallery = Gallery::query()->where('id', $id)->get();

        return response()->json([
            'showGallery' => $showGallery,
            'status' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update([
            'name' => $request->name,
            'picture' => $request->hasFile('picture') ? $request->file('picture')->storeAs('public/', Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension()) : $gallery->picture
        ]);

        return response()->json([
            'updated' => $gallery,
            'status' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Gallery::destroy($id);

        return response()->json([
            'deleted' => $deleted,
            'status' => true
        ]);
    }

    public function userPageGallery()
    {
        return view('gallery.index', ['galleries' => Gallery::paginate(6)]);
    }
}

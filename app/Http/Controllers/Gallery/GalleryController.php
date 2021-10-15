<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\GalleryRequest;
use Illuminate\Auth\Access\Gate;
use App\Http\Resources\GalleryResource;

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
            'all' => Gallery::orderBy('created_at', 'desc')->get(),
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

        $data = $request->all();

        $file = $request->file('picture');
        $name = '/picture/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $name);
        $data['picture'] = $name;

        $gallery = Gallery::create($data);

        return new GalleryResource($gallery);
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
            $showGallery,
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
        $data = $request->all();

        if ($request->picture == $gallery->picture) {
            $gallery->update($data);
        } else {
            $file = $request->file('picture');
            $name = '/picture/' . uniqid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $data['picture'] = $name;

            $gallery->update($data);
        }



        return new GalleryResource($gallery);
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

<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\TourCategory\TourCategory;
use Illuminate\Http\Request;
use App\Http\Requests\TourCategoryRequest;

class TourCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'all' => TourCategory::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tourCategory = TourCategory::create(
            $request->all()
        );

        return response()->json([
            'created' => $tourCategory,
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
        $showTourCategory = TourCategory::query()->where('id', $id)->get();

        return response()->json([
            TourCategory::query()->where('id', $id)->get(),
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
    public function update(TourCategoryRequest $request, TourCategory $tour_category)
    {
        $data = $request->validated();
        $tour_category->update($data);

        return response()->json([
            'updated' => $tour_category,
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
        TourCategory::destroy($id);

        return response()->json(['deleted' => 'Category Successfully Deleted']);
    }
}

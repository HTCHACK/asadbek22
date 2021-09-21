<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use App\Models\Tour\Tour;
use Illuminate\Http\Request;
use App\Models\Tour\TourComments;

class TourCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'all' => TourComments::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        TourComments::create([
            'tour_id' => $id,
            'phone_number' => $request->phone_number,
            'content' => $request->content,
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', __('lang.commented_successfully'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = TourComments::find($id);
        $comment->update(['confirm'=>true]);

        return response()->json([
            'updated' => 'Successfully confirmed'
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
        TourComments::destroy($id);

        return response()->json([
            'desleted' => 'Successfully Deleted'
        ]);
    }
}

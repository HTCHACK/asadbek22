<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour\Tour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'all' => Tour::with('tourCategory')->get(),
            'status' => true
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
        Tour::create([
            'tour_category_id' => $request->tour_category_id,
            'title' => $request->title,
            'content' => $request->content,
            'phone_number' => $request->phone_number,
            'user_id' => Auth::user()->id,
            'location' => $request->location,
            'is_published' => boolval($request->is_published),
            'is_popular' => boolval($request->is_popular),
            'price' => $request->price,
            'country' => $request->country,
            'city' => $request->city,
            'is_it_here' => boolval($request->is_it_here),
            'lang' => $request->lang,
            'picture' => $request->hasFile('picture') ? $request->file('picture')->storeAs('public/images', Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension()) : null,
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
        return view('tour.show', ['tour' => Tour::findOrFail($id)]);
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
        $tour = Tour::findOrFAil($id);
        $tour->update([
            'tour_category_id' => $request->tour_category_id,
            'title' => $request->title,
            'content' => $request->content,
            'phone_number' => $request->phone_number,
            'user_id' => Auth::user()->id,
            'location' => $request->location,
            'is_published' => boolval($request->is_published),
            'is_popular' => boolval($request->is_popular),
            'price' => $request->price,
            'is_it_here' => boolval($request->is_it_here),
            'country' => $request->country,
            'city' => $request->city,
            'lang' => $request->lang,
            'picture' => $request->hasFile('picture') ? $request->file('picture')->storeAs('public/', Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension()) : $tour->picture,
        ]);

        return response()->json([
            'updated' => 'Successfuly Updated'
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
        Tour::destroy($id);

        return response()->json([
            'desleted' => 'Successfully Deleted'
        ]);
    }

    public function tourUserPage()
    {
        return view('tour.index', ['tours' => Tour::where('lang', $this->getLang())->where('is_it_here', true)->paginate(40)]);
    }

    private function getLang()
    {
        if (!isset($_COOKIE['language'])) {
            return 'uz';
        }
        if (isset($_COOKIE['language'])) {
            return $_COOKIE['language'];
        }
    }
}

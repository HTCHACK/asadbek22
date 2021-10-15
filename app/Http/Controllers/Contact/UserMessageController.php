<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact\Message\UserMessage;
use App\Http\Requests\UserMessageRequest;

class UserMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'all' => UserMessage::orderBy("created_at",'desc')->get(),
            'status' => true
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserMessageRequest $request)
    {
        UserMessage::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'message' => $request->message
        ]);

        return redirect()->back()->with('success', __('lang.message_send_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showUserMessage = UserMessage::query()->select('*')->where('id', $id)->get();

        return response()->json([
            'all' => $showUserMessage,
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userSendMessagePage()
    {
        return view('about.index');
    }
}

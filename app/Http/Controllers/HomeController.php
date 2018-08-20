<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminEmail = Config::where('name', 'email')->first();

        return view('messages.index', ['messages' => Message::all(), 'adminEmail' => $adminEmail->value]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Message $message)
    {
        return view('messages.show', ['message' => $message]);
    }

    /**
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function answer(Message $message, Request $request)
    {
        mail($message->email, 'Ответ на Ваше сообщение', $request->answer);
        return view('messages.index');
    }

    /**
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete(Message $message)
    {
        $message->delete();
        return view('messages.index');
    }

    public function emailUpdate(Request $request)
    {
        Config::where('name', 'email')
            ->update(['value' => $request->email]);

        $adminEmail = Config::where('name', 'email')->first();

        return view('messages.index', ['adminEmail' => $adminEmail->value]);
    }
}

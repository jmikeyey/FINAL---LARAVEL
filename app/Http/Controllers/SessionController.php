<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function setSession(Request $request)
    {
        // Example: Set sessions using request data
        $data = $request->all(); // Fetch data from the request

        foreach ($data as $key => $value) {
            Session::put($key, $value);
        }
        return response()->json(['message' => 'Sessions set successfully']);
    }

    public function getAllSessions()
    {
        $sessions = Session::all();

        return response()->json(['sessions' => $sessions] );
    }

    public function deleteAllSessions()
    {
        Session::flush();

        return response()->json(['message' => 'All sessions deleted']);
    }
}

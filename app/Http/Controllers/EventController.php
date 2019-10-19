<?php

namespace App\Http\Controllers;

use App\events;
use DB;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $eventh = events::all()->toArray();
        return view('eventHome', compact('eventh'));

    }

    public function show($id)
    {
        //
    }

    public function searcheventaa(Request $request)
    {
        $searcheventaa = $request->get('searcheventaa');
        $eventh = DB::table('events')->where('c_name', 'like', '%' . $searcheventaa . '%')->paginate(5);
        return view('eventHome', ['eventh' => $eventh]);
    }

}

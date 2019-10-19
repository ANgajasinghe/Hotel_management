<?php

namespace App\Http\Controllers;

use App\EventT;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $eventt = EventT::all();
        return view('events.index', compact('eventt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'category' => 'required',
            'no_of_guests' => 'required',
            'food_menu' => 'required',
            'clients_menu' => 'required'
        ]);

        $eventt = new EventT([
            'client_name' => $request->get('client_name'),
            'event_date' => $request->get('event_date'),
            'event_time' => $request->get('event_time'),
            'category' => $request->get('category'),
            'no_of_guests' => $request->get('no_of_guests'),
            'food_menu' => $request->get('food_menu'),
            'clients_menu' => $request->get('clients_menu')
        ]);

        $eventt->save();
        return redirect('/events')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $eventt = EventT::find($id);
        return view('events.edit', compact('eventt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_name' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'category' => 'required',
            'no_of_guests' => 'required',
            'food_menu' => 'required',
            'clients_menu' => 'required'
        ]);

        $eventt = EventT::find($id);
        $eventt->client_name = $request->get('client_name');
        $eventt->event_date = $request->get('event_date');
        $eventt->event_time = $request->get('event_time');
        $eventt->category = $request->get('category');
        $eventt->no_of_guests = $request->get('no_of_guests');
        $eventt->food_menu = $request->get('food_menu');
        $eventt->clients_menu = $request->get('clients_menu');
        $eventt->save();

        return redirect('/events')->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $eventt = EventT::find($id);
        $eventt->delete();

        return redirect('/events')->with('success', 'Contact deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Estaff;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class EstaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $staff = Estaff::all();
        return view('E_staff.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('E_staff.create');
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
            'event_id' => 'required',
            'type' => 'required',
            'count' => 'required'
        ]);

        $staff = new Estaff([
            'first_name' => $request->get('event_id'),
            'last_name' => $request->get('type'),
            'email' => $request->get('count'),

        ]);
        $staff->save();
        return redirect('/estaff')->with('success', 'saved!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

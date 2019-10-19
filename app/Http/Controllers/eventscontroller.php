<?php

namespace App\Http\Controllers;
use DB;

class eventscontroller extends Controller
{
    public function index()
    {
        $events = DB::select('select * from events');
        return view('index5',['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('create5');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */

    public function search(Request $request)
    {
        $search = $request->get('search4');
        $events = DB::table('events')->orWhere('c_name', 'like','%'.$search. '%')
            ->orWhere('event_date', 'like','%'.$search. '%')
            ->orWhere('time', 'like','%'.$search. '%')->paginate(5);
        return view('index5', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'c_name' => 'required|alpha',
            'event_date' => 'required',
            'time' => 'required',
            'category' => 'required|alpha',
            'guests' => 'required|numeric',
            'mid' => 'required|string',
            'advance' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $c_name = $request->get('c_name');
        $event_date = $request->get('event_date');
        $time = $request->get('time');
        $category = $request->get('category');
        $guests = $request->get('guests');
        $mid = $request->get('mid');
        $advance = $request->get('advance');
        $total = $request->get('total');
        $events = DB::insert('insert into events(c_name, event_date, time, category, guests, mid, advance, total) value(?,?,?,?,?,?,?,?)',[$c_name, $event_date, $time, $category, $guests, $mid, $advance, $total]);
        if($events){
            $red = redirect('events')->with('success', 'Data has been added');
        } else{
            $red = redirect('events/create5')->with('danger', 'Input data failed, please try again');
        }
        return $red;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $events = DB::select('select * from events where id=?',[$id]);
        return view('edit5', ['events' => $events]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'c_name' => 'required|alpha',
            'event_date' => 'required',
            'time' => 'required',
            'category' => 'required|alpha',
            'guests' => 'required|numeric',
            'mid' => 'required|string',
            'advance' => 'required|numeric',
            'total' => 'required|numeric',

        ]);


        $c_name = $request->get('c_name');
        $event_date = $request->get('event_date');
        $time = $request->get('time');
        $category = $request->get('category');
        $guests = $request->get('guests');
        $mid = $request->get('mid');
        $advance = $request->get('advance');
        $total = $request->get('total');
        $events = DB::update('update events set c_name=?, event_date=?, time=?, category=?, guests=?, mid=?, advance=?, total=? where id=?',[$c_name, $event_date, $time, $category, $guests, $mid, $advance, $total, $id]);
        if($events){
            $red = redirect('events')->with('success', 'Data has been updated');
        } else{
            $red = redirect('events/edit5/' ,$id)->with('danger','Error update, please try again');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $events = DB::delete('delete from events where id=?',[$id]);
        $red = redirect('events');
        return $red;
    }

    public function deleteAll(Request $request){
        $ids = $request->get('ids');
        $dbs = DB::delete('delete from events where id in('.implode(",",$ids).')');
        return redirect('events');
    }

}

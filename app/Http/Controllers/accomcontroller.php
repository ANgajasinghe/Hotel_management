<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class accomcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $accoms = DB::select('select * from accoms');
        return view('index1', ['accoms' => $accoms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('create1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search2');
        $accoms = DB::table('accoms')->orWhere('arrival_date', 'like', '%' . $search . '%')
            ->orWhere('deparure_date', 'like', '%' . $search . '%')
            ->orWhere('nic', 'like', '%' . $search . '%')
            ->orWhere('adults', 'like', '%' . $search . '%')->paginate(5);
        return view('index1', ['accoms' => $accoms]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'arrival_date' => 'required',
            'deparure_date' => 'required',
            'adults' => 'required|numeric',
            'kids' => 'required|numeric',
            'room_type' => 'required|alpha',
            'room_no' => 'required|numeric',
            'food_ser' => 'required|string',
            'payment' => 'required|string',
            'nic' => 'required|string',

        ]);


        $arrival_date = $request->get('arrival_date');
        $deparure_date = $request->get('deparure_date');
        $adults = $request->get('adults');
        $kids = $request->get('kids');
        $room_type = $request->get('room_type');
        $room_no = $request->get('room_no');
        $food_ser = $request->get('food_ser');
        $payment = $request->get('payment');
        $nic = $request->get('nic');
        $accoms = DB::insert('insert into accoms(arrival_date, deparure_date, adults, kids, room_type, room_no, food_ser, payment, nic) value(?,?,?,?,?,?,?,?,?)', [$arrival_date, $deparure_date, $adults, $kids, $room_type, $room_no, $food_ser, $payment, $nic]);
        if ($accoms) {
            $red = redirect('accoms')->with('success', 'Data has been added');
        } else {
            $red = redirect('accoms/create1')->with('danger', 'Input data failed, please try again');
        }
        return $red;
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
        $accoms = DB::select('select * from accoms where id=?', [$id]);
        return view('edit1', ['accoms' => $accoms]);
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
            'arrival_date' => 'required',
            'deparure_date' => 'required',
            'adults' => 'required|numeric',
            'kids' => 'required|numeric',
            'room_type' => 'required|alpha',
            'room_no' => 'required|numeric',
            'food_ser' => 'required|string',
            'payment' => 'required|string',
            'nic' => 'required|string',

        ]);


        $arrival_date = $request->get('arrival_date');
        $deparure_date = $request->get('deparure_date');
        $adults = $request->get('adults');
        $kids = $request->get('kids');
        $room_type = $request->get('room_type');
        $room_no = $request->get('room_no');
        $food_ser = $request->get('food_ser');
        $payment = $request->get('payment');
        $nic = $request->get('nic');
        $accoms = DB::update('update accoms set arrival_date=?, deparure_date=?, adults=?, kids=?, room_type=?, room_no=?, food_ser=?, payment=?, nic=? where id=?', [$arrival_date, $deparure_date, $adults, $kids, $room_type, $room_no, $food_ser, $payment, $nic, $id]);
        if ($accoms) {
            $red = redirect('accoms')->with('success', 'Data has been updated');
        } else {
            $red = redirect('accoms/edit1/', $id)->with('danger', 'Error update, please try again');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $accoms = DB::delete('delete from accoms where id=?', [$id]);
        $red = redirect('accoms');
        return $red;
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('ids');
        $dbs = DB::delete('delete from accoms where id in(' . implode(",", $ids) . ')');
        return redirect('accoms');
    }



}

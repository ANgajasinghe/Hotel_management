<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class utilitycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $utilities = DB::select('select * from utilities');
        return view('index2', ['utilities' => $utilities]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search3');
        $utilities = DB::table('utilities')->where('date', 'like', '%' . $search . '%')->paginate(5);
        return view('index2', ['utilities' => $utilities]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|alpha',
            'date' => 'required',
            'amount' => 'required|numeric',
        ]);

        $type = $request->get('type');
        $date = $request->get('date');
        $amount = $request->get('amount');
        $utilities = DB::insert('insert into utilities(type, date, amount) value(?,?,?)', [$type, $date, $amount]);
        if ($utilities) {
            $red = redirect('utilities')->with('success', 'Data has been added');
        } else {
            $red = redirect('utilities/create2')->with('danger', 'Input data failed, please try again');
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
        $utilities = DB::select('select * from utilities where id=?', [$id]);
        return view('edit2', ['utilities' => $utilities]);
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
            'type' => 'required|alpha',
            'date' => 'required',
            'amount' => 'required|numeric',
        ]);

        $type = $request->get('type');
        $date = $request->get('date');
        $amount = $request->get('amount');

        $utilities = DB::update('update utilities set type=?, date=?, amount=? where id=?', [$type, $date, $amount, $id]);
        if ($utilities) {
            $red = redirect('utilities')->with('success', 'Data has been updated');
        } else {
            $red = redirect('utilities/edit2/', $id)->with('danger', 'Error update, please try again');
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
        $utilities = DB::delete('delete from utilities where id=?', [$id]);
        $red = redirect('utilities');
        return $red;
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('ids');
        $dbs = DB::delete('delete from utilities where id in(' . implode(",", $ids) . ')');
        return redirect('utilities');
    }

    //Expenditures
    public function calc()
    {
        $calcAmount = DB::table('utilities')->sum('amount');
        $calcEvent = DB::table('event_reports')->sum('etotal');
        $calcSup = DB::table('expends')->sum('amount');
        $calHr = DB::table('emp_salaries')->sum('salary');
        dd($calcAmount + $calcEvent + $calcSup + $calHr);
        return view('index2', compact('calcAmount'));
    }

    //Incomes
    //kaavindi
    public function accomCal()
    {
        $calcAcoom = DB::table('accoms')->sum('payment');
        $kevent = DB::table('events')->sum('total');
        dd($calcAcoom +  $kevent);
        return view('index1', compact('calcAcoom'));
    }


}

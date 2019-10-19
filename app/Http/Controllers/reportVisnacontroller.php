<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class reportVisnacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reports_visnas = DB::select('select * from reports_visnas');
        return view('index7', ['reports_visnas' => $reports_visnas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('create7');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search7');
        $reports_visnas = DB::table('reports_visnas')->where('nic', 'like', '%' . $search . '%')->paginate(5);
        return view('index7', ['reports_visnas' => $reports_visnas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nic' => 'required|string',
            'name' => 'required|alpha',
            'type' => 'required|alpha',
            'date' => 'required',
            'month' => 'required',
            'amount' => 'required|numeric',
        ]);

        $nic = $request->get('nic');
        $name = $request->get('name');
        $type = $request->get('type');
        $date = $request->get('date');
        $month = $request->get('month');
        $amount = $request->get('amount');
        $reports_visnas = DB::insert('insert into reports_visnas(nic, name, type, date, month, amount) value(?,?,?,?,?,?)', [$nic, $name, $type, $date, $month,$amount]);
        if ($reports_visnas) {
            $red = redirect('reports_visnas')->with('success', 'Data has been added');
        } else {
            $red = redirect('reports_visnas/create7')->with('danger', 'Input data failed, please try again');
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
        $reports_visnas = DB::select('select * from reports_visnas where id=?', [$id]);
        return view('edit7', ['reports_visnas' => $reports_visnas]);
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

            'nic' => 'required|string',
            'name' => 'required|alpha',
            'type' => 'required|alpha',
            'date' => 'required',
            'month' => 'required',
            'amount' => 'required|numeric',
        ]);

        $nic = $request->get('nic');
        $name = $request->get('name');
        $type = $request->get('type');
        $date = $request->get('date');
        $month = $request->get('month');
        $amount = $request->get('amount');

        $reports_visnas = DB::update('update reports_visnas set nic=?, name=?, type=?, date=?, month=?,amount=? where id=?', [$nic, $name, $type, $date, $month, $amount, $id]);
        if ($reports_visnas) {
            $red = redirect('reports_visnas')->with('success', 'Data has been updated');
        } else {
            $red = redirect('reports_visnas/edit2/', $id)->with('danger', 'Error update, please try again');
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
        $reports_visnas = DB::delete('delete from reports_visnas where id=?', [$id]);
        $red = redirect('reports_visnas');
        return $red;
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('ids');
        $dbs = DB::delete('delete from reports_visnas where id in(' . implode(",", $ids) . ')');
        return redirect('reports_visnas');
    }
}

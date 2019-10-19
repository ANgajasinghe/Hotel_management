<?php

namespace App\Http\Controllers;

use App\Attendence;
use App\Charts\test1;
use App\Employee;
use App\Memployee;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class attendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function storeA(Request $request)
    {
        $id = $request->get('id');
        $day = $request->get('date');

        $this->validate($request, [
            //validate ID and DAY as unique
            'id' => [
                'required',
                Rule::unique('memployees')->where(function ($query) use ($id, $day) {
                    return $query->where('id', $id)
                        ->where('day', $day);
                }),
            ],
        ]);

        //store data to memployees table
        $att = new Memployee([
            'id' => $request->get('id'),
            'type' => $request->get('type'),
            'name' => $request->get('name'),
            'day' => $request->get('date'),
            'month' => $request->get('month'),
        ]);
        $att->save();
        return redirect()->back();


    }

    public function index()
    {
        $empdata = Employee::all();
        $attdata = Attendence::all();
        $count = sizeof($attdata);

        //foreach ($attendenceD as $row){
        // $timestamp = strtotime($row['created_at']);
        //$month = date('M', $timestamp);
        //dd($month);
        // }


        return View('Employee_attendence', compact('count'))->with('employeeD', $empdata)->with('attendenceD', $attdata);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "id" => 'unique:attendences,id'
        ]);
        $attendence = new Attendence([
            'id' => $request->get('id'),
            'type' => $request->get('type'),
            'name' => $request->get('name'),
            'date' => $request->get('date'),
            'count' => $request->get('count')
        ]);

        $attendence->save();
        return redirect()->back()->with('success', 'The Form Data is successfully inserted to the Database!');
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
        $empdata = Attendence::find($id);
        $empdata->delete();

        return redirect()->back();
    }


    //Chart generation test 1

    public function chartTest()
    {
        $chart = new test1();
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
        $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

        return view('sample_view', compact('chart'));
    }

    public function dailyattPdf(Request $request)
    {

        $data =Attendence::all();
        $count=DB::table('attendences')->count('id');
        view()->share('items', $data);
        $pdf = PDF::loadView('Dailyattendance');
        return $pdf->download('dalyAttendancePdf.pdf');


    }

    public function pdf(){
        $items=Attendence::all();
        $count=DB::table('attendences')->count('id');
        view()->share('items', $items);
        return view('Dailyattendance');
    }
}

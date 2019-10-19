<?php

namespace App\Http\Controllers;

use App\Charts\test1;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EmployeeChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    ///attendance cart base on employeee
    public function index()
    {
        $data = collect([]);//declare as a Array-----------------
        $data2 = collect([]);

        //add data to Array---------------------------------------

        $chart = new test1();
        //begin chart----------------------
        $chart->labels($data->values());
        $chart->dataset('Employee Attendance', 'line', $data2->values());
        //add label and data set
        return view('EmployeeChart', compact('chart'));

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
        $mon = $request->get('month');


        $data = collect([]);//declare as a Array-----------------
        $data2 = collect([]);
        $user_info = DB::table('memployees')->where('month', $mon)
            ->select('id', DB::raw('count(*) as total'))
            ->groupBy('id')
            ->get();
        //find relevant information from table--------------
        foreach ($user_info as $row) {
            $data->push($row->id);
            $data2->push($row->total);
        };

        //add data to Array---------------------------------------

        $chart = new test1();
        //begin chart----------------------

        $chart->title($mon);


        $chart->labels($data->values());
        $chart->dataset('Employee Attendance', 'line', $data2->values());
        //add label and data set
        return view('EmployeeChart', compact('chart'));
    }


    /////attendance base on month

    public function day(Request $request)
    {

        $mon = $request->get('month');

        $data = collect([]);//declare as a Array-----------------
        $data2 = collect([]);

        $user_info = DB::table('memployees')->where('month', $mon)
            ->select('day', DB::raw('count(*) as total'))
            ->groupBy('day')
            ->get();
        // dd($user_info);
        foreach ($user_info as $row) {
            $data->push($row->day);
            $data2->push($row->total);
        };
        $chart = new test1();
        //begin chart----------------------
        $chart->title('');

        $chart->labels($data->values());
        $chart->dataset('Daily Attendance', 'line', $data2->values());
        //add label and data set
        return view('EMonthChart', compact('chart'));
    }


    ///salary chart
    public function salaryR()
    {

        $data = collect([]);//declare as a Array-----------------
        $data2 = collect([]);

        $salary_info = DB::table('e_m_salaries')->select("month", "salary")->get();
        //  dd($salary_info);
        foreach ($salary_info as $row) {
            $data->push($row->month);
            $data2->push($row->salary);
        };
        $chart = new test1();
        //begin chart----------------------

        $chart->title('');


        $chart->labels($data->values());
        $chart->dataset('Monthly Salaries', 'line', $data2->values());
        //add label and data set
        return view('EsalaryChart', compact('chart'));
        dd($salary_info);

    }

    //register
    public function regdate()
    {
        $date = 0;
        $data = collect([]);//declare as a Array-----------------
        $data2 = collect([]);


        //add data to Array---------------------------------------

        $chart = new test1();
        //begin chart----------------------
        $chart->labels($data->values());
        $chart->dataset('Register', 'line', $data2->values());
        //add label and data set
        return view('Eregister', compact('chart', 'date'));

    }


    public function register(Request $request)
    {
        $date = $request->get('date');
        $dateOnly = explode('-', $date);
        $getdate = $dateOnly[2];
        $getmonth = $dateOnly[1];
        $getmonth--;
        $monthArr = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
            "Oct", "Nov", "Dec"
        ];
        $month = $monthArr[$getmonth];
        //dd($month);


        $data = collect([]);//declare as a Array-----------------
        $data2 = collect([]);

        $registerinfo = DB::table('memployees')->where('month', $month)->where('day', $getdate)->get();


        //dd($registerinfo);
        foreach ($registerinfo as $row) {
            $data->push($row->id);
            $data2->push($row->day);
        };
        $chart = new test1();
        //begin chart----------------------

        $chart->title($month);


        $chart->labels($data->values());
        $chart->dataset('Monthly Salaries', 'line', $data2->values());
        //add label and data set
        return view('Eregister', compact('chart', 'date'));
        //dd($salary_info);

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

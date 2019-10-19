<?php

namespace App\Http\Controllers;

use App;
use App\eventReport;
use DB;
use Illuminate\Http\Request;
use PDF;

class EreportController extends Controller
{
    public function index()
    {
        $eventreport = eventReport::all();
        return view('e_report.index', compact('eventreport'));

        /*$eventreport = $this->get_report_data();
        return view('/ereport')->with('eventreport',$eventreport);*/
    }

    public function create()
    {
        return view('e_report.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'event_manager' => 'required',
            'attendence' => 'required',
            'cost' => 'required',
            'etotal' => 'required',
            'btotal' => 'required',
        ]);

        $eventreport = new eventReport([
            'customer_name' => $request->get('customer_name'),
            'event_date' => $request->get('event_date'),
            'event_time' => $request->get('event_time'),
            'event_manager' => $request->get('event_manager'),
            'attendence' => $request->get('attendence'),
            'cost' => $request->get('cost'),
            'etotal' => $request->get('etotal'),
            'btotal' => $request->get('btotal')

        ]);

        $eventreport->save();
        return redirect('/ereport')->with('success', 'Contact saved!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $eventreport = eventReport::find($id);
        return view('e_report.edit', compact('eventreport'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'event_manager' => 'required',
            'attendence' => 'required',
            'cost' => 'required',
            'etotal' => 'required',
            'btotal' => 'required',
        ]);


        $eventreport = eventReport::find($id);

        $eventreport->customer_name = $request->get('customer_name');
        $eventreport->event_date = $request->get('event_date');
        $eventreport->event_time = $request->get('event_time');
        $eventreport->event_manager = $request->get('event_manager');
        $eventreport->attendence = $request->get('attendence');
        $eventreport->cost = $request->get('cost');
        $eventreport->etotal = $request->get('etotal');
        $eventreport->btotal = $request->get('btotal');

        $eventreport->save();

        return redirect('/ereport')->with('success', 'Contact updated!');
    }

    public function destroy($id)
    {
        $eventreport = eventReport::find($id);
        $eventreport->delete();

        return redirect('/ereport')->with('success', 'Contact deleted!');
    }

    /**
     *
     * EXPORT FUNCTION
     *
     */

    public function get_report_data()
    {
        $eventreport = DB::table('event_reports')->limit(10)->get();

        return $eventreport;
    }

    public function pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_report_data_to_html());
        return $pdf->stream();
    }

    function convert_report_data_to_html()
    {
        $eventreport = $this->get_report_data();
        $output = '

            <h2 align="center">Event Report</h2>
        <table class="table table-bordered "  align="center">

              
           ';
        foreach ($eventreport as $ereport) {
            $output .= '        
               <table  style=" border: 1px solid #ddd;text-align: left;color: #10707f">
}>
                 
                <thead style=" border: 1px solid #ddd;text-align: left;background-color: #bbbfc3">
                <tr>
                    <th scope="col" colspan="4" style="color:blue;">Event Information</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Customer name</td>
                    <td>' . $ereport->customer_name . '</td>
                    <td>Event date</td>
                    <td>' . $ereport->event_date . '</td>
                <tr>
                    <td>Event time</td>
                    <td>' . $ereport->event_time . '</td>
                    <td>Event Manager</td>
                    <td>' . $ereport->event_manager . '</td>
                </tr>
                </tr>
                <tr>

                    <td>Estimated No. of Attendence of guest for the Event </td>
                    <td>' . $ereport->attendence . '</td>
                    <td>Proposed Registration cost for a each person</td>
                    <td>' . $ereport->cost . '</td>

                </tr>
                <tr>
                    <th colspan="4" style="color:blue;" >Budget Information</th>
                </tr>
                <tr>

                    <td colspan="2">Actual  Expence</td>
                    <td>' . $ereport->etotal . '</td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="2">Budget Expence</td>
                    <td>' . $ereport->btotal . '</td>
                    <td></td>

                </tr>
           
           

                </tbody>

         

                ';
        }
        $output .= '</table>';
        return $output;
    }

    public function searchereport(Request $request)
    {
        $searchereport = $request->get('searchereport');
        $eventreport = DB::table('event_reports')->where('customer_name', 'like', '%' . $searchereport . '%')->paginate(5);
        return view('e_report/index', ['eventreport' => $eventreport]);
    }


}

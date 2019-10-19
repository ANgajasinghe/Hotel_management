<?php

namespace App\Http\Controllers;

use App\income;
use DB;
use PDF;

class incomecontroller extends Controller
{

    function index()
    {
        $accoms  = $this->get_income_data();
        $events = $this->get_income_data();
        return view('incomes')->with('accoms', $accoms)->with('events', $events);
    }

    function get_income_data()
    {
        $accoms = DB::table('accoms')->limit(10)->get();
        return $accoms;
        $events = DB::table('events')->limit(10)-get();
        return $events;
    }

    function pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_income_data_to_html());
        return $pdf->stream();
    }

    function convert_income_data_to_html()
    {
        $accoms = $this->get_income_data();
        $events = $this->get_income_data();
        $output = '
            <h3 align ="center">INCOME DETAILS</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
                <tr>
                    <th style="border: 1px solid;
                                padding: 12px;" width="20%">DATE</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="30%">ROOM NO</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="15%">PAYMENT</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="15%">EVENT DATE</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="15%">ID</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="15%">PAYMENT</th>
                </tr>       
                 ';
        foreach ($accoms as $accom) {
            $output .= '
                <tr>
                    <td style="border: 1px solid; padding: 12px;"> ' . $accom->arrival_date . '</td>
                    <td style="border: 1px solid; padding: 12px;"> ' . $accom->room_no . '</td>
                    <td style="border: 1px solid; padding: 12px;"> ' . $accom->payment . '</td>
                </tr>
                ';
            foreach ($events as $event){
                $output .= '
                    <td style="border: 1px solid; padding: 12px;"> ' . $event->event_date . '</td>
                    <td style="border: 1px solid; padding: 12px;"> ' . $event->mid . '</td>
                    <td style="border: 1px solid; padding: 12px;"> ' . $event->total . '</td>
                ';
            }
        }
        $output .= '</table>';
        return $output;

}

}

<?php

namespace App\Http\Controllers;

use App;
use DB;
use PDF;

class dynamicvisnaPDFcontroller extends Controller
{
    function index()
    {
        $utilities = $this->get_utility_data();
        return view('dynamicVisna')->with('utilities', $utilities);
    }

    function get_utility_data()
    {
        $utilities = DB::table('utilities')->limit(10)->get();
        return $utilities;
    }

    function pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_utility_data_to_html());
        return $pdf->stream();
    }

    function convert_utility_data_to_html()
    {
        $utilities = $this->get_utility_data();
        $output = '
            <h3 align ="center">UTILITY DETAILS</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
                <tr>
                    <th style="border: 1px solid;
                                padding: 12px;" width="20%">ID</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="30%">TYPE</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="15%">DATE</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="20%">AMOUNT</th>
                </tr>       
                 ';
        foreach ($utilities as $utility) {
            $output .= '
                <tr>
                    <td style="border: 1px solid; padding: 12px;"> ' . $utility->id . '</td>
                    <td style="border: 1px solid; padding: 12px;"> ' . $utility->type . '</td>
                    <td style="border: 1px solid; padding: 12px;"> ' . $utility->date . '</td>
                    <td style="border: 1px solid; padding: 12px;"> ' . $utility->amount . '</td>
                </tr>
                ';
        }
        $output .= '</table>';
        return $output;
    }
}

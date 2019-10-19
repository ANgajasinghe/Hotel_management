<?php

namespace App\Http\Controllers;

use App;
use DB;
use PDF;

class reportVisnaPDFcontroller extends Controller
{
    function index()
    {
        $reports_visnas = $this->get_utility_data();
        return view('')->with('reports_visnas', $reports_visnas);
    }

    function get_report_data()
    {
        $reports_visnas = DB::table('reports_visnas')->limit(10)->get();
        return $reports_visnas;
    }

    function pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_report_data_to_html());
        return $pdf->stream();
    }

    function convert_report_data_to_html()
    {
        $reports_visnas = $this->get_report_data();
        $output = '
            <h3 align ="center">REPORT DETAILS</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
                <tr>
                    <th style="border: 1px solid;
                                padding: 12px;" width="20%">NIC</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="30%">NAME</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="15%">TYPE</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="15%">DATE</th>
                    <th style="border: 1px solid;
                                padding: 12px;" width="20%">AMOUNT</th>
                </tr>       
                 ';
        foreach ($reports_visnas as $reports_visna) {
            $output .= '
                <tr>
                    <td style="border: 1px solid; padding: 12px;"> ' . $reports_visna->nic . '</td>
                    <td style="border: 1px solid; padding: 12px;"> ' . $reports_visna->name . '</td>
                    <td style="border: 1px solid; padding: 12px;"> ' . $reports_visna->type . '</td>
                    <td style="border: 1px solid; padding: 12px;"> ' . $reports_visna->date . '</td>
                    <td style="border: 1px solid; padding: 12px;"> ' . $reports_visna->amount . '</td>
                </tr>
                ';
        }
        $output .= '</table>';
        return $output;
    }
}

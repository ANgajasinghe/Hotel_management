<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class DynamicPDFController extends Controller
{
    function index()
    {
        $posts = $this->get_customer_data();
        return view('index')->with('customer_data', $posts);
    }

    function get_customer_data()
    {
        $posts = DB::table('posts')
            ->limit(10)
            ->get();

        return $posts;
    }

    function pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        //$pdf->stream();
        return $pdf->download('dynamic_pdf');
    }
        function convert_customer_data_to_html()
        {
            $posts = $this->get_customer_data();
            $output = '
        <h3 align="center">Customer Data</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
        <th style="border: 1px solid; padding: 12px;" width="20%">First Name</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Last Name</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">NIC</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">E Mail</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Phone Number</th>
        <th style="border: 1px solid; padding: 12px;" width="20%">Address</th>
        
</tr>
';
            foreach ($posts as $customer) {
                $output .= '
            <tr>
            <td style="border: 1px solid; padding: 12px;">' . $customer->fname . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer->lname . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer->nic . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer->email . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer->phone . '</td>
            <td style="border: 1px solid; padding: 12px;">' . $customer->address . '</td>
            </tr>
            ';
            }
            $output .= '</table>';
            return $output;
        }

}

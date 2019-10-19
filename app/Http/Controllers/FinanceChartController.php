<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\chart1;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FinanceChartController extends Controller
{
    public function index()
    {
        $data = collect([]);
        $data2 = collect([]);
        $finance_info = DB::table('reports_visnas')->where('month', 'sep')
            ->select('id', DB::raw('count(*) as total'))
            ->groupBy('id')
            ->get();

        foreach ($finance_info as $row)
        {
            $data->push($row->id);
            $data2->push($row->total);
        };

        $chart = new chart1();
        $chart->labels($data->values());
        $chart->dataset('Monthly Finance Report','line', $data2->values());
        return view('FinanceChart', compact('chart'));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  orderController extends Controller
{
    public function store(Request $request)
    {
        $expenditure = new expenditure([
            'sup_id' => $request->get('item'),
            'sup_name' => $request->get('amount'),
            'item' => $request->get('date'),
            'amount' => $request->get('date'),
            'sup_date' => $request->get('date'),

        ]);
    }
}

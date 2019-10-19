<?php

namespace App\Http\Controllers;


use App\Expends;
use Illuminate\Http\Request;


class ExpendsController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'amount' => 'required',
            'date' => 'required'
        ]);

        $expends = new Expends([
            'type' => $request->get('item'),
            'amount' => $request->get('amount'),
            'date' => $request->get('date')
        ]);

        $expends->save();
        $data = expends::all();

        return view('expenditureFinal')->with('expends', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\expenditure;
use Illuminate\Http\Request;

class expenditurecontroller extends Controller
{
    public function insert(Request $request)
    {
        $expenditure = new expenditure;

        $expenditure->id = $request->id;
        $expenditure->date = $request->date;

        $expenditure->save();
    }
}

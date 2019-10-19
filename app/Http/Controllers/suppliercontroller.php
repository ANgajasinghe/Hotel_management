<?php

namespace App\Http\Controllers;

use App\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class suppliercontroller extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'suppName' => 'required',
            'email' => 'required',
            'suptype' => 'required',
            'item' => 'required',
            'date' => 'required',
            'bank' => 'required',
            'accNo' => 'required',

        ]);
        $supplier = new supplier([
            'name' => $request->get('suppName'),
            'email' => $request->get('email'),
            'type' => $request->get('suptype'),
            'item' => $request->get('item'),
            'inac_date' => $request->get('date'),
            'bank' => $request->get('bank'),
            'acc_no' => $request->get('accNo'),


        ]);
        $supplier->save();

        $data = supplier::all();

        return view('supplier')->with('supplier', $data);
    }

    public function deletesup($id)
    {
        supplier::where('id', $id)->delete();
        return redirect('/supplier')->with('succes', 'supplier deleted');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'suppName' => 'required',
            'email' => 'required',
            'suptype' => 'required',
            'item' => 'required',
            'date' => 'required',
            'bank' => 'required',
            'accNo' => 'required',

        ]);

        $name = $request->get('suppName');
        $email = $request->get('email');
        $type = $request->get('suptype');
        $item = $request->get('item');
        $inac_date = $request->get('date');
        $bank = $request->get('bank');
        $acc_no = $request->get('accNo');

        $posts = DB::update('update supplier set   name=?, email=?, type=?, item=?, inac_date=?, bank=?,acc_no=? where id=?', [$name, $email, $type, $item, $inac_date, $bank, $acc_no, $id]);
        if ($posts) {
            $red = redirect('suppliers')->with('success', 'Data has been updated');
        } else {
            $red = redirect('suppliers/edit/', $id)->with('danger', 'Error update, please try again');
        }
        return $red;
    }
}

<?php

namespace App\Http\Controllers;

use App;
use App\eventItem;
use DB;
use Illuminate\Http\Request;
use PDF;


class EventItemController extends Controller
{


    public function index()
    {

        $eitem = eventItem::all();
        return view('e_item.index', compact('eitem'));

    }


    public function create()
    {
        return view('e_item.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'event_date' => 'required',
            'rq_date' => 'required',
            'item_name' => 'required',
            'qty' => 'required',
        ]);

        $items = new eventItem([
            'event_date' => $request->get('event_date'),
            'rq_date' => $request->get('rq_date'),
            'item_name' => $request->get('item_name'),
            'qty' => $request->get('qty')

        ]);


        $items->save();
        return redirect('/eitems')->with('success', 'Item saved!');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $eitem = eventItem::find($id);
        return view('e_item.edit', compact('eitem'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'event_date' => 'required',
            'rq_date' => 'required',
            'item_name' => 'required',
            'qty' => 'required'

        ]);

        $eitem = eventItem::find($id);
        $eitem->event_date = $request->get('event_date');
        $eitem->rq_date = $request->get('rq_date');
        $eitem->item_name = $request->get('item_name');
        $eitem->qty = $request->get('qty');

        $eitem->save();

        return redirect('/eitems')->with('success', 'item is  updated!');
    }

    public function destroy($id)
    {
        $eitem = eventItem::find($id);
        $eitem->delete();

        return redirect('/eitems')->with('success', 'item deleted!');
    }

    public function searcheitem(Request $request)
    {
        $searcha = $request->get('searcheitem');
        $eitem = DB::table('event_items')->where('item_name', 'like', '%' . $searcha . '%')->paginate(5);
        return view('e_item/index', ['eitem' => $eitem]);
    }

    public function get_eventitem_data()
    {
        $eitem = DB::table('event_items')->limit(10)->get();

        return $eitem;
    }

    public function pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_eventitem_data_to_html());
        return $pdf->stream();
    }

    function convert_eventitem_data_to_html()
    {
        $eitem = $this->get_eventitem_data();
        $output = '
            <h2 align="center" style="color: #1c7430;">Event Item report</h2>
            <br>
            <table align="center">
             <tr>
             <th style="color: #0069d9">  Event Date  </th>
             <th style="color: #10707f">  Required Date  </th>
             <th>  Item name  </th>
             <th>  Quantity / Weight </th>
             </tr>
           ';
        foreach ($eitem as $eitems) {
            $output .= ' 

                    <tr><td align="center">' . $eitems->event_date . '</td>
                    <td align="center">' . $eitems->rq_date . '</td>
                    <td align="center">' . $eitems->item_name . '</td> 
                    <td align="center">' . $eitems->qty . '</td>  
                    </tr>
                   ';
        }
        $output .= ' </table>';
        return $output;
    }


}

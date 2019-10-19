<?php

namespace App\Http\Controllers;

use App\eventM;
use App\menus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EventMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $menu = eventM::all();
        return view('menus.index', compact('menu'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('menus.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */

    public function search(Request $request)
    {
        $search = $request->get('search');
        $eemenu = DB::table('event_m_s')->where('menu_name', 'like', '%' . $search . '%')->paginate(5);
        return view('menus.index', ['event_m_s' => $eemenu]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required',
            'menu_type' => 'required',
            'main_dishes' => 'required',
            'salads' => 'required',
            'deserts' => 'required',
            'beverages' => 'required',
            'price' => 'required'
        ]);

        $menu = new eventM([
            'menu_name' => $request->get('menu_name'),
            'menu_type' => $request->get('menu_type'),
            'main_dishes' => $request->get('main_dishes'),
            'salads' => $request->get('salads'),
            'deserts' => $request->get('deserts'),
            'beverages' => $request->get('beverages'),
            'price' => $request->get('price'),

        ]);

        $menu->save();

        return redirect('/menus')->with('success', 'Menu updated!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $menu = eventM::find($id);
        return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'menu_name' => 'required',
            'menu_type' => 'required',
            'main_dishes' => 'required',
            'salads' => 'required',
            'deserts' => 'required',
            'beverages' => 'required',
            'price' => 'required'

        ]);

        $menu = eventM::find($id);
        $menu->menu_name = $request->get('menu_name');
        $menu->menu_type = $request->get('menu_type');
        $menu->main_dishes = $request->get('main_dishes');
        $menu->salads = $request->get('salads');
        $menu->deserts = $request->get('deserts');
        $menu->beverages = $request->get('beverages');
        $menu->price = $request->get('price');
        $menu->save();

        return redirect('/menus')->with('success', 'Menu Updates!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $menu = eventM::find($id);
        $menu->delete();

        return redirect('/menus')->with('success', 'Menu Deleted!');
    }
}

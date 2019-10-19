<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = DB::select('select * from posts');
        return view('index', ['posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search1');
        $posts = DB::table('posts')->orWhere('fname', 'like', '%' . $search . '%')
            ->orWhere('lname', 'like', '%' . $search . '%')
            ->orWhere('nic', 'like', '%' . $search . '%')->paginate(5);
        return view('index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|alpha',
            'lname' => 'required|alpha',
            'nic' => 'required|string',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|numeric|phone_number|digits:10',
            'address' => 'required|string',

        ]);


        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $nic = $request->get('nic');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $posts = DB::insert('insert into posts(fname, lname, nic, email, phone, address) value(?,?,?,?,?,?)', [$fname, $lname, $nic, $email, $phone, $address]);
        if ($posts) {
            $red = redirect('posts')->with('success', 'Data has been added');
        } else {
            $red = redirect('posts/create')->with('danger', 'Input data failed, please try again');
        }
        return $red;
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
        $posts = DB::select('select * from posts where id=?', [$id]);
        return view('edit', ['posts' => $posts]);
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
            'fname' => 'required|alpha',
            'lname' => 'required',
            'nic' => 'required|string',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|numeric|phone_number|digits:10',
            'address' => 'required|string',

        ]);

        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $nic = $request->get('nic');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');

        $posts = DB::update('update posts set fname=?, lname=?, nic=?, email=?, phone=?, address=? where id=?', [$fname, $lname, $nic, $email, $phone, $address, $id]);
        if ($posts) {
            $red = redirect('posts')->with('success', 'Data has been updated');
        } else {
            $red = redirect('posts/edit/', $id)->with('danger', 'Error update, please try again');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $posts = DB::delete('delete from posts where id=?', [$id]);
        $red = redirect('posts');
        return $red;
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('ids');
        $dbs = DB::delete('delete from posts where id in(' . implode(",", $ids) . ')');
        return redirect('posts');
    }
}

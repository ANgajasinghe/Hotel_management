<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use validator;


class LeaveTypeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $leaveType = LeaveType::all()->toArray();
        return view('Employee_add_leaveType', compact('leaveType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    /**
     * Store the incoming blog post.
     *
     * @param StoreBlogPost $request
     * @return Response
     */
    public function save(StoreBlogPost $request)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...

        $validatedData = $request->validated();
        $leaveType = new LeaveType([
            'leve_type' => $request->get('leve_type'),
            'allow_leaves' => $request->get('days'),
        ]);
        $leaveType->save();
        //LeaveType::create($validatedData);


        return redirect()->back()->with('success', 'The Form Data is successfully inserted to the Database!');

    }


    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //$this->validate($request,[
        //'leve_type'=>'required',
        //'allow leaves'=>'required|integer',
        // ]);

        $leaveType = new LeaveType([
            'leve_type' => $request->get('Ltype'),
            'allow_leaves' => $request->get('days'),
        ]);
        $leaveType->save();
        return back()->with('store', 'Content has been store successfully!');


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        $empdata = LeaveType::find($id);

        $empdata->delete();
        return redirect()->back();
    }
}

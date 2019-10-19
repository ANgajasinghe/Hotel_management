<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\StoreBlogPost;
use App\Leave;
use App\RequestedLeave;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {

        $emp = Employee::all();
        $leave = Leave::all();
        return view('Employee_leave')->with('emp', $emp)->with('leave', $leave);

    }

    public function indexR()
    {

        $emp = Employee::all();
        $leave = RequestedLeave::all();
        //if ($emp['type']==$leave['type']){}
        //return View('LeaveM', compact('emp'));
        return view('ErequestedLeave')->with('emp', $emp)->with('leave', $leave);

    }

    public function search2(Request $request)
    {
        $emp = Employee::all();
        $leave = Leave::all();
        $search = $request->get('search');
        if ($search == 'all') {
            return view('Employee_leave')->with('emp', $emp)->with('leave', $leave);
        } else {
            $leave = Leave::where('id', 'like', '%' . $search . '%')->get();
            return View('Employee_leave', compact("leave"))->with('emp', $emp);
        }
        //->with('employeeD',$empdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreBlogPost $request)
    {

        $validatedData = $request->validated();

        $leave = new RequestedLeave([
            'eid' => $request->get('ID'),
            'name' => $request->get('name'),
            'Requesting_date' => $request->get('today'),
            'leaving_date' => $request->get("Date"),
            'nof_days' => $request->get("#days"),
            'leve_type' => $request->get('leavetype'),
        ]);

        $leave->save();
        return redirect()->back()->with('success', 'The Form Data is successfully inserted to the Database!');
    }

    public function storea(Request $request)
    {


        $leave = new Leave([
            'id' => $request->get('ID'),
            'Requesting_date' => $request->get('today'),
            'leaving_date' => $request->get("Date"),
            'nof_days' => $request->get("#days"),
            'leve_type' => $request->get('leavetype'),
        ]);

        $leave->save();
        return redirect()->back()->with('success', 'The Form Data is successfully inserted to the Database!');

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
    public function destroy($id)
    {
        $empdata = Leave::find($id);
        $empdata->delete();

        return redirect()->back();
    }


}

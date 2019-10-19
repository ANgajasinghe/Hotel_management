<?php

namespace App\Http\Controllers;

use App\DeleteEmployee;
use App\Employee;
use App\Http\Requests\EmployeeValidate;
use App\Http\Requests\viewValidate;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function getid(Request $request)
    {
        $a = $request->get('id');

        $empdata = DB::table('employees')->where('id', $a)->get();
        //dd($empdata);
        return View('Employee_view')->with('rows', $empdata);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $employeeD = Employee::where('id', 'like', '%' . $search . '%')->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('type', 'like', '%' . $search . '%')->get();
        return View('Employee_management', compact("employeeD"));//->with('employeeD',$empdata);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $empdata = Employee::all();
        return View('Employee_management')->with('employeeD', $empdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

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
    public function store(EmployeeValidate $request)
    {
        $validatedData = $request->validated();
        //$employee=new Employee();

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/appsetting/', $filename);
            //see above line.. path is set.(uploads/appsetting/..)->which goes to public->then create
            //a folder->upload and appsetting, and it wil store the images in your file.
            $employee = new Employee([
                'id' => $request->get('Rno'),
                'type' => $request->get('type'),
                'image' => $filename,
                'name' => $request->get('name'),
                'gender' => $request->get('gender'),
                'NIC' => $request->get('NIC'),
                'Address' => $request->get('Address'),
                'DOB' => $request->get('DOB'),
                'salary' => $request->get('salary'),
                'joindate' => $request->get('joindate'),
                'tp' => $request->get('tp'),
                'Email' => $request->get("Email"),
                'attendence' => $request->get(''),
                'remark' => $request->get("remrk"),
            ]);

            $employee->save();
            return redirect()->back()->with('success', 'The Form Data is successfully inserted to the Database!');
        } else {
            $employee = new Employee([
                'id' => $request->get('Rno'),
                'type' => $request->get('type'),
                'image' => $request->get('image'),
                'name' => $request->get('name'),
                'gender' => $request->get('gender'),
                'NIC' => $request->get('NIC'),
                'Address' => $request->get('Address'),
                'DOB' => $request->get('DOB'),
                'salary' => $request->get(''),
                'joindate' => $request->get('joindate'),
                'tp' => $request->get('tp'),
                'tp2' => $request->get('tp2'),
                'Email' => $request->get("Email"),
                'attendence' => $request->get(''),
                'remark' => $request->get("remrk"),
            ]);

            $employee->save();
            return redirect()->back()->with('success', 'The Form Data is successfully inserted to the Database!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

        $empdata = Employee::find($id);
        return view('Employee_view')->with('row', $empdata);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return void
     */
    public function edit(viewValidate $request)
    {
        //validate and update employee details
        $id = $request->Rno;
        $data = Employee::find($id);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/appsetting/', $filename);

            $data->image = $filename;
            $data->name = $request->get('name');

            $data->DOB = $request->get('dob');
            $data->gender = $request->get('gender');
            $data->joindate = $request->get('joindate');
            $data->tp = $request->get('tp');
            $data->Email = $request->get('email');
            $data->salary = $request->get('salary');
            $data->remark = $request->get('remark');
            $data->save();

            return view('Employee_view')->with('row', $data);

        } else {


            $data->name = $request->get('name');
            $data->DOB = $request->get('dob');
            $data->gender = $request->get('gender');
            $data->joindate = $request->get('joindate');
            $data->tp = $request->get('tp');
            $data->Email = $request->get('email');
            $data->salary = $request->get('salary');
            $data->remark = $request->get('remark');
            $data->save();
            return view('Employee_view')->with('row', $data);


        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
//    public
//    function update(Request $request, $id)
//    {
//        $empdata = Employee::find($id);
//        return view('Employee_view')->with('row', $empdata);
//
//        //$validatedData = $request->validated();
//
//
//        if ($request->hasfile('image')) {
//            $file = $request->file('image');
//            $extension = $file->getClientOriginalExtension(); // getting image extension
//            $filename = time() . '.' . $extension;
//            $file->move('uploads/appsetting/', $filename);
//
//            $empdata->image = $filename;
//            $empdata->name = $request->get('name');
//
//            $empdata->DOB = $request->get('dob');
//            $empdata->gender = $request->get('gender');
//            $empdata->joindate = $request->get('joindate');
//            $empdata->tp = $request->get('tp');
//            $empdata->Email = $request->get('email');
//            $empdata->salary = $request->get('salary');
//            $empdata->remark = $request->get('remark');
//            $empdata->save();
//
//            //$empdata = DB::table('employees')->where('id', $pp)->get();
//            //dd($empdata);
//            return view('Employee_view')->with('row', $empdata);
//            //return redirect()->to('Emanagement')->with('rows', $empdata);
//        } else {
//            //$validatedData = $request->validated();
//
//            $empdata->name = $request->get('name');
//
//
//            $empdata->DOB = $request->get('dob');
//            $empdata->gender = $request->get('gender');
//            $empdata->joindate = $request->get('joindate');
//            $empdata->tp = $request->get('tp');
//            $empdata->Email = $request->get('email');
//            $empdata->salary = $request->get('salary');
//            $empdata->remark = $request->get('remark');
//            $empdata->save();
//
//            // $empdata = DB::table('employees')->where('id', $pp)->get();
//            //dd($empdata);
//            //
//            return view('Employee_view')->with('row', $empdata);
//            //return redirect()->to('Emanagement')->with('rows', $empdata);
//        }
//
//
//    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        $empdata = Employee::find($id);
        $deleteEmployee = new DeleteEmployee([
            'empid' => $empdata->id,
            'name' => $empdata->name,
            'email' => $empdata->Email,
            'tp' => $empdata->tp
        ]);
        $deleteEmployee->save();

        $empdata->delete();

        return redirect()->back();
    }

    public function showDeleteEmp()
    {
        $empdata = DeleteEmployee::all();
        return View('EmpDelete')->with('employeeD', $empdata);
    }

    //pdf generation
    public function pdfview(Request $request)
    {
        $items = DB::table("employees")->get();
        view()->share('items', $items);
        $pdf = PDF::loadView('pdfview');
        return $pdf->download('pdfview.pdf');
    }
    public function EmployeeDetailsPdf(Request $request)
    {

        $id = $request->Rno;
        $data = Employee::find($id);
        view()->share('row', $data);
        $pdf = PDF::loadView('EmployeeDetailsPdf');
        return $pdf->download('EmployeeDetailsPdf.pdf');
    }

}

<?php

namespace App\Http\Controllers;

use App\foundite;
use App\newstst;
use App\Status;
use App\Taskadd;
use DB;
use Illuminate\Http\Request;

class frontaddtask extends Controller
{

    public function indexassing()
    {

        $data = Taskadd::all();

        return view('AssingTask')->with('AssingTask', $data);


    }

    public function prnpriview()
    {
        $data = Taskadd::all();
        return view('print')->with('print', $data);
    }

    public function taskslist()
    {


        $data = Taskadd::all();

        return view('Tasks')->with('AssingTask', $data);

    }


    public function insert(Request $request)
    {

        //dd($request ->all());

        $this->validate($request, [
            'RoomNo' => 'required|max:3|min:3',
            'Date' => 'required',
            'RoomType' => 'required',
            'Task' => 'required',
            'Housekeeper' => 'required',

        ]);


        $RoomNo = $request->input('RoomNo');
        $Date = $request->input('Date');
        $RoomType = $request->input('RoomType');
        $Task = $request->input('Task');
        $Housekeeper = $request->input('Housekeeper');

        $data = array('RoomNo' => $RoomNo, 'Date' => $Date, 'RoomType' => $RoomType, 'Task' => $Task, 'Housekeeper' => $Housekeeper);

        DB::table('taskadds')->insert($data);

        $rget = Taskadd::all();

        //dd($rget);


        return view('Tasks')->with('Tasks', $rget);


    }

    public function deletetask($id)
    {
        $task = Taskadd::find($id);

        $task->delete();
        return redirect()->back();
    }


    public function Listsearch()
    {

        return view('statusList');

        $data = newststs::all();

        return view('statusList')->with('statusList', $data);

    }


    public function retrive()
    {

        $dataa = newstst::all();


        return view('statusList', ['sty' => $dataa]);
    }


    public function statusSearch(Request $request)
    {
        $gat = $request->get('search');

        $sty = DB::table('newststs')->where('rmn', 'like', '%' . $gat . '%')->paginate(5);


        return view('statusList', ['sty' => $sty]);


    }


    public function supdate()
    {

        return view('StatutsUpdate');


    }

    public function retriveupdate()
    {


        $datup = Status::all();

        return view('StatutsUpdate', ['up' => $datup]);
    }


    public function founditems()
    {

        return view('found');

    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'typo' => 'required',
            'place' => 'required',
            'Description' => 'required',

        ]);


        $foundite = new foundite();

        $foundite->itm_typ = $request->input('typo');
        $foundite->place = $request->input('place');
        $foundite->discription = $request->input('Description');
        $foundite->image = $request->input('image');


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/foundite/', $filename);
            $foundite->image = $filename;

        } else {

            return $request;
            $highlights->image = '';
        }

        $foundite->save();

        return view('found')->with('employee', $foundite);

    }


}

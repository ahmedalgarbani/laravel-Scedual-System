<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Collage;
use App\Models\Res;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reses = Res::all();
        return view('res.index',compact('reses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collages = Collage::all();
        $subjects = Subject::all();
        $classRooms = ClassRoom::all();

        return view('res.add_res',compact('collages','subjects','classRooms'));

    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request){


        $startString = $request->start;
        $endString = $request->end;
        $formattedDate = date('Y-m-d', strtotime($request->date_day));

        $Reservation = Res::where('class_id', $request->class_id)
            ->where('date_day', $formattedDate)
            ->where(function ($query) use ($startString, $endString) {
                $query->where(function ($query) use ($startString, $endString) {
                    $query->where('start', '<=', $startString)
                        ->where('end', '>=', $startString);
                })->orWhere(function ($query) use ($startString, $endString) {
                    $query->where('start', '<=', $endString)
                        ->where('end', '>=', $endString);
                });
            })->count();


        if($Reservation >0){
                session()->flash('error_res');
                return redirect()->back();
            }

         Res::create([
            'subject_name' => $request->subject_name,
            'date_day' => $formattedDate,
            'start' => $startString,
            'end' => $endString,
            'user_id' => auth()->user()->name,
            'collage_id' => $request->collage_id,
            'teacher_id' => $request->teacher_id,
            'class_id' => $request->class_id,
        ]);

        session()->flash('ADD_RES');

                return redirect('/ress');

    }


    /**
     * Display the specified resource.
     */
    public function show(Res $res)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $collages = Collage::all();
        $subjects = Subject::all();
        $classRooms = ClassRoom::all();
        $res=Res::findOrFail($id);
        return view('res.edit_res',compact('collages','subjects','classRooms','res'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $startString = $request->start;
        $endString = $request->end;
        $formattedDate = date('Y-m-d', strtotime($request->date_day));

        $Reservation = Res::where('class_id', $request->class_id)
            ->where('date_day', $formattedDate)
            ->where(function ($query) use ($startString, $endString) {
                $query->where(function ($query) use ($startString, $endString) {
                    $query->where('start', '<=', $startString)
                        ->where('end', '>=', $startString);
                })->orWhere(function ($query) use ($startString, $endString) {
                    $query->where('start', '<=', $endString)
                        ->where('end', '>=', $endString);
                });
            })->count();


        if($Reservation >0){
            session()->flash('error_res');
            return redirect()->back();
        }

        Res::findOrFail($request->id)->update([
            'subject_name' => $request->subject_name,
            'date_day' => $formattedDate,
            'start' => $startString,
            'end' => $endString,
            'user_id' => auth()->user()->name,
            'collage_id' => $request->collage_id,
            'teacher_id' => $request->teacher_id,
            'class_id' => $request->class_id,
        ]);

        session()->flash('edit_res');

        return redirect('/ress');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $res)
    {
        Res::findOrFail($res->id)->delete();

        session()->flash('res_delete');

        return redirect('/ress');
    }
}

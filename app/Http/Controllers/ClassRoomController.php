<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Subject;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classRooms = ClassRoom::all();
        return view('class.index',compact('classRooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('class.add_class');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $classRoom = ClassRoom::create([
            'class_name'=>$request->class_name,
            'class_number'=>$request->class_number,
            'class_location'=>$request->class_location
        ]);


        return redirect('/classRooms');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $classRoom)
    {
        return $classRoom;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRoom $classRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        ClassRoom::findOrFail($request->id)->delete();
        return redirect()->back();
    }
}

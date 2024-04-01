<?php

namespace App\Http\Controllers;

use App\Models\Collage;
use App\Models\Subject;
use App\Models\Teacher;
use http\Env\Response;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collages = Collage::all();

        return view('teacher.add_teacher',compact('collages'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacher = Teacher::create([
            'name'=>$request->name,
            'collage_id'=>$request->collage
        ]);


        return redirect('/teachers');
    }



    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $collages = Collage::all();
        $teacher = Teacher::findOrFail($id);
        return view('teacher.edit_teacher',compact('teacher','collages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
         Teacher::findOrFail($request->id)->update([
            'name'=>$request->name,
            'collage_id'=>$request->collage
        ]);

        session()->flash('edit_teacher');

        return redirect('/teachers');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $teacher)
    {
        Teacher::findOrFail($teacher->id)->delete();

        session()->flash('teacher_delete');

        return redirect('/teachers');
    }


    public function get_subjects($id){
        $subjects = Subject::where('teacher_id',$id)->pluck('id');
            return json_encode($subjects);
    }

}

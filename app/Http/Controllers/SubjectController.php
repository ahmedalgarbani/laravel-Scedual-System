<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();

        return view('subject.add_subject',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subject = Subject::create([
            'subject_name'=>$request->subject_name,
            'note'=>$request->note,
            'teacher_id'=>$request->teacher_id
        ]);


        return redirect('/subject');


    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $subject = Subject::findOrFail($id);
        $teachers = Teacher::all();
        return view('subject.edit_subject',compact('subject','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Subject::findOrFail($id)->update([
            'subject_name'=>$request->subject_name,
            'note'=>$request->note,
            'teacher_id'=>$request->teacher_id
        ]);
        return redirect('subject');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        Subject::findOrFail($request->id)->delete();
        return redirect()->back();
    }
}

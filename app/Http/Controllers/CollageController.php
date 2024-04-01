<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Collage;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CollageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collages = Collage::all();

        return view('collage.index',compact('collages'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('collage.add_collage');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $collage = Collage::create([
            'collage_name'=>$request->collage_name,
            'note'=>$request->note
        ]);


        return redirect('/collage');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $collage = Collage::findOrFail($id);
        return view('collage.edit_collage',compact('collage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Collage::findOrFail($id)->update([
           'collage_name'=>$request->collage_name,
           'note'=>$request->note
        ]);
        return redirect('collage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        Collage::findOrFail($request->id)->delete();
        return redirect()->back();
    }



    public function get_taecher($id){
            $teachers = Teacher::where("collage_id", $id)->pluck('name','id');

            return json_encode($teachers);
    }
}

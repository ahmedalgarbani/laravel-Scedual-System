<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('user.add_user',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'type'=>$request->Role,
            'teacher_id'=>$request->teacher_id,
        ]);

        session()->flash('Add');
        return to_route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $teachers = Teacher::all();
        return view('user.edit_user',compact('user','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        User::findOrFail($id)->update([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>$request->password,
            'type'=>$request->Role,
            'teacher_id'=>$request->teacher_id,

        ]);

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,String $id)
    {
        User::findOrFail($request->id)->delete();
        return redirect('users');
    }
}

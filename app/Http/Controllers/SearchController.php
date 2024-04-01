<?php

namespace App\Http\Controllers;

use App\Models\Res;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        $id = auth()->user()->teacher_id;
        $reses = Res::where('teacher_id',$id);
        return view('search.index',compact('reses'));
    }



    public function search(Request $request){
        $id = auth()->user()->teacher_id;
        $reses = Res::where('teacher_id',$id)->whereBetween('date_day',[$request->start_date,$request->end_date])->get();
        return view('search.index',compact('reses'));
    }



}

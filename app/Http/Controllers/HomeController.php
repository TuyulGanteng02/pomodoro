<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $task = new Task;
        $task->user_id = $request->user_id;
        $task->deskripsi = $request->deskripsi;
        $task->durasi = $request->durasi; 
        $task->status = $request->status; 
        $task->save();
        
        return response()->json([
           'msg' => 'Data Terupload'
        ], 201);
    }
}

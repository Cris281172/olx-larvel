<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(){
        return view('form.index');
    }
    public function store(Request $request){

        $file = $request->file('file');

        $fileName = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('images'), $fileName);

        dd($fileName);
    }
}

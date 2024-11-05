<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Jobs\HelloWorldJob;

class HelloWorldJobController extends Controller
{
    public function index(){
        $user = User::find(3);
        HelloWorldJob::dispatch($user);

    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications_view(){
        $notifcations = auth()->user()->notifications()->paginate(2);
        return view('user.notifications', compact('notifcations'));
    }
    public function notification_read(string $id){
        auth()->user()->notifications()->find($id)->markAsRead();

        return back();
    }
    public function notifications_read_all(){
        auth()->user()->unreadNotifications->markAsRead();
        return back();
    }
}

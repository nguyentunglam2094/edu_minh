<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\PushNotifications;
use App\Models\PushUser;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function getNotifications(Request $request, PushNotifications $pushNotifications)
    {
        $pushs = $pushNotifications->where('source_to', PushNotifications::SOURCE_STUDENT)
        ->with(['senderAdmin', 'userPush'=>function($q) {
            $q->where('user_id', \Auth::user()->id)
            ->where('user_type', PushNotifications::SOURCE_STUDENT);
        }])->whereHas('userPush', function($q){
            $q->where('user_id', \Auth::user()->id)
            ->where('user_type', PushNotifications::SOURCE_STUDENT);
        })->orderBy('id', 'desc')->paginate(20);

        return view('layouts.notifications')->with([
            'notifications'=>$pushs
        ]);
    }

    public function readNoti(Request $request, PushUser $pushUser)
    {
        $pushUser->where('id', $request->pushid)->update([
            'read'=>1
        ]);
        return PushNotifications::where('source_to', PushNotifications::SOURCE_STUDENT)
        ->with(['userPush'=>function($q) {
            $q->where('user_id', \Auth::user()->id)
            ->where('user_type', PushNotifications::SOURCE_STUDENT);
        }])->whereHas('userPush', function($q){
            $q->where('user_id', \Auth::user()->id)
            ->where('user_type', PushNotifications::SOURCE_STUDENT)
            ->where('read', 0);
        })
        ->count();
    }
}

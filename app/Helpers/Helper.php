<?php

use App\Models\PushNotifications;

if (!function_exists('countNotification')) {
    function countNotification()
    {
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

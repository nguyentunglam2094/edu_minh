<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\ExerciseType;
use App\Models\Themes;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    //
    public function detailTheme(Themes $themes,  $id)
    {
        $detail = $themes->detail($id);
        if(empty($detail)){
            return back();
        }
        $otherTopic = $themes->getOtherTopic($detail);
        return view('themes.index')->with([
            'detail'=>$detail,
            'otherTopic'=>$otherTopic,
        ]);
    }

    public function indexType(ExerciseType $exerciseType, $code)
    {
        $detail = $exerciseType->detailByCode($code);
        $other = $exerciseType->getOtherType($detail);
        return view('themes.type_ex')->with([
            'detail'=>$detail,
            'other'=>$other,
        ]);
    }
}

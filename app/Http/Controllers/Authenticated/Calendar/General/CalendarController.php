<?php

namespace App\Http\Controllers\Authenticated\Calendar\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendars\General\CalendarView;
use App\Models\Calendars\ReserveSettings;
use App\Models\Calendars\Calendar;
use App\Models\USers\User;
use Auth;
use DB;

class CalendarController extends Controller
{
    public function show(){
        $calendar = new CalendarView(time());
        return view('authenticated.calendar.general.calendar', compact('calendar'));
    }

    public function reserve(Request $request){
        DB::beginTransaction();
        try{
            $getPart = $request->getPart;
            $getDate = $request->getData;
            $reserveDays = array_filter(array_combine($getDate, $getPart));
            foreach($reserveDays as $key => $value){
                $reserve_settings = ReserveSettings::where('setting_reserve', $key)->where('setting_part', $value)->first();
                $reserve_settings->decrement('limit_users');
                $reserve_settings->users()->attach(Auth::id());
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

    public function delete(Request $request){
        $reserveDay = $request->reserve_day;
        $reservePart = $request->reserve_part;
        if($reservePart == "リモ1部"){
            $reservePart = "1";
        }else if($reservePart == "リモ2部"){
            $reservePart = "2";
        }else if($reservePart == "リモ3部"){
            $reservePart = "3";
        }

        $reserveSetting = ReserveSettings::where('setting_reserve', $reserveDay)->where('setting_part', $reservePart)->first();
        $reserveSetting->increment('limit_users');

        $reserveId = $reserveSetting->id;
        $reserveSetting->users()->where('user_id', Auth::id())->where('reserve_setting_id', $reserveId)->detach();

        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }
}

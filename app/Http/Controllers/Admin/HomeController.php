<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Guest;
use App\Models\GuestReq;
use App\Models\User;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $guests= Guest::all();
        $guestreqs=GuestReq::all();
        return view('admin.dashboard',compact('guests','guestreqs'));

    }

    /************************************************************************************* */
   /* protected function allOrderMonth()
    {
        $orders = Order::select(DB::raw("(COUNT(*)) as count"), DB::raw("DAY(created_at) as day"))
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->whereYear('created_at', date('Y'))
            ->groupBy('day')
            ->get();

        $orderArr = [
            '1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0, '6' => 0, '7' => 0, '8' => 0, '9' => 0, '10' => 0,
            '11' => 0, '12' => 0, '13' => 0, '14' => 0, '15' => 0, '16' => 0, '17' => 0, '18' => 0, '19' => 0, '20' => 0,
            '21' => 0, '22' => 0, '23' => 0, '24' => 0, '25' => 0, '26' => 0, '27' => 0, '28' => 0, '29' => 0, '30' => 0,
            '31' => 0

        ];
        foreach ($orders as $item) {
            $orderArr[$item->day] = $item->count;
        }
        return $orderArr;
    }

    /************************************************************************************* */
    /*protected function allOrderWeekly()
    {
        $orderDaily = Order::select(DB::raw("(COUNT(*)) as count"), DB::raw("DAYNAME(created_at) as dayname"))
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->whereYear('created_at', date('Y'))
            ->groupBy('dayname')
            ->get();

        $orderArr = [
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
            'Sunday' => 0,

        ];
        foreach ($orderDaily as $item) {
            $orderArr[$item->dayname] = $item->count;
        }
        return $orderArr;
    }
    /************************************************************************************* */

    /*protected function doneOrderWeekly()
    {
        $orderDaily = Order::select(DB::raw("(COUNT(*)) as count"), DB::raw("DAYNAME(created_at) as dayname"))
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->whereYear('created_at', date('Y'))
            ->where('done', 1)
            ->groupBy('dayname')
            ->get();

        $orderArr = [
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
            'Sunday' => 0,

        ];
        foreach ($orderDaily as $item) {
            $orderArr[$item->dayname] = $item->count;
        }
        return $orderArr;
    }
    /************************************************************************************* */


    /*public function allUsers()
    {
        $users = User::paginate(10);
        return view('admin.user.allUsers', compact('users'));
    }*/
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {      
        $last30Days = Transaction::where('date','>=',Carbon::now()->subdays(30))->get(['save_sw', 'save_ss', 'loan']);

        $member = DB::table('members')
                    ->orderBy('balance_sw', 'desc')
                    ->orderBy('balance_ss', 'desc')
                    ->select('member_id', 'member_name', 'balance_sw', 'balance_ss')
                    ->take(5)
                    ->get();
                    
        $income = 0;
        $expenditure = 0;
        foreach ($last30Days as $item) {
            $income += $item->save_sw + $item->save_ss;
            $expenditure += $item->loan;
        }

        return view('website.dashboard', ['income'=>$income, 'expenditure' => $expenditure, 'member'=>$member]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class TransaksiController extends Controller
{
    function index()
    {
        return view('website.transaksi.tambah');
    }
    
    function show()
    {
        $trans = DB::table('transactions')
        ->join('members', 'transactions.member_id', '=', 'members.member_id')
        ->join('users', 'transactions.user_id', '=', 'users.id')
        ->select('transactions.*', 'members.member_name', 'users.user_name')
        ->get();
        
        $trans = $trans->reverse();
        
        return view('website.transaksi', ['trans'=>$trans]);
    }

    function search()
    {
        $search_text = $_GET['query']; 
        $trans = DB::table('transactions')
                    ->join('members', 'transactions.member_id', '=', 'members.member_id')
                    ->join('users', 'transactions.user_id', '=', 'users.id')
                    ->select('transactions.*', 'members.member_name', 'users.user_name')
                    ->where('transactions.id', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('transactions.member_id', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('members.member_name', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('users.user_name', 'LIKE', '%'.$search_text.'%')
                    ->get();
                    
        return view('website.transaksi', compact('trans'));
    }
    
    function store(Request $req)
    {
        if ($req->trans_type == "Setor") 
        {
            $req->validate([
                'trans_wajib' => 'required',
                'trans_sukarela' => 'required',
                'member_id' => 'required|exists:members',
            ]);

            $trans = new Transaction;
            $trans->member_id = $req->member_id;
            $trans->save_sw = $req->trans_wajib;
            $trans->save_ss = $req->trans_sukarela;
            $trans->type = $req->trans_type;
            $trans->user_id = $req->trans_staff;
            $trans->date = $req->trans_date;
            $trans->save();

            $bal = DB::table('members')
                        ->where('member_id', '=', $req->member_id)
                        ->select('balance_sw', 'balance_ss')
                        ->get();
            
            $balance = DB::table('members')
                            ->updateOrInsert(
                                ['member_id' => $req->member_id],
                                [
                                    'balance_sw' => $bal[0]->balance_sw + $req->trans_wajib,
                                    'balance_ss' => $bal[0]->balance_ss + $req->trans_sukarela,
                                ]
                                );
                

            return redirect()->intended('transaksi')->with('message', 'Data berhasil disimpan!');
        }
        else 
        {
            $req->validate([
                'trans_loan' => 'required',
                'member_id' => 'required|exists:members',
            ]);

            $trans = new Transaction;
            $trans->member_id = $req->member_id;
            $trans->loan = $req->trans_loan;
            $trans->type = $req->trans_type;
            $trans->user_id = $req->trans_staff;
            $trans->date = $req->trans_date;
            $trans->save();

            $bal = DB::table('members')
                        ->where('member_id', '=', $req->member_id)
                        ->select('balance_ss')
                        ->get();
            
            $balance = DB::table('members')
                            ->updateOrInsert(
                                ['member_id' => $req->member_id],
                                [
                                    'balance_ss' => $bal[0]->balance_ss - $req->trans_loan,
                                ]
                                );

            return redirect()->intended('transaksi')->with('message', 'Data berhasil disimpan!');
        }

    }

    function detail($id)
    {
        $trans = DB::table('transactions')
                    ->join('members', 'transactions.member_id', '=', 'members.member_id')
                    ->join('users', 'transactions.user_id', '=', 'users.id')
                    ->select('transactions.*', 'members.member_name', 'users.user_name')
                    ->where('transactions.id', '=', $id)->first();

        return view('website.transaksi.detail', ['trans'=>$trans]);
    }

    function delete($id)
    {
        DB::table('transactions')->where('id', '=', $id)->delete();

        return redirect()->intended('transaksi')->with('message', 'Data berhasil dihapus!');
    }
}

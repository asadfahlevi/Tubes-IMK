<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    function index()
    {
        return view('website.staff.tambah');
    }

    function show()
    {
        $user = DB::table('users')
                    ->get();

        $user = $user->reverse();
        
        return view('website.staff', ['user'=>$user]);
    }

    function search()
    {
        $search_text = $_GET['query']; 
        $user = DB::table('users')
                    ->where('id', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('user_name', 'LIKE', '%'.$search_text.'%')
                    ->get();

        return view('website.staff', compact('user'));
    }

    function store(Request $req)
    {
        $req->validate([
            'user_telpNo' => 'required|min:10|max:13',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User;
        $user->user_name = $req->user_name;
        $user->address = $req->user_address;
        $user->telp_no = $req->user_telpNo;
        $user->password = Hash::make($req->password);
        $user->save();

        return redirect()->intended('staff')->with('message', 'Data berhasil disimpan!');
    }

    function profile($id)
    {
        $user = DB::table('users')
                    ->where('id', '=', $id)->first();

        $count = DB::table('users')
                    ->join('transactions', 'transactions.user_id', '=', 'users.id')
                    ->select('users.*', 'transactions.user_id')
                    ->where('users.id', '=', $id)
                    ->count();

        return view('website.staff.profile', ['user'=>$user, 'count'=>$count]);
    }

    function editShow($id)
    {
        $user = DB::table('users')
                    ->where('id', '=', $id)->first();

        return view('website.staff.edit', ['user'=>$user]);
    }

    function edit(Request $req)
    {
        $req->validate([
            'user_telpNo' => 'min:10|max:13',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = DB::table('users')
                    ->updateOrInsert(
                        ['id' => $req->id],
                        [
                        'user_name' => $req->user_name,
                        'address' => $req->user_address,
                        'telp_no' => $req->user_telpNo,
                        'password' => Hash::make($req->password),
                    ]);

        return redirect()->intended('staff')->with('message', 'Data berhasil diubah!');
    }

    function delete($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();

        return redirect()->intended('staff')->with('message', 'Data berhasil dihapus!');
    }
}

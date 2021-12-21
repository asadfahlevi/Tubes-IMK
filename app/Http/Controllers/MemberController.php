<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

class MemberController extends Controller
{
    function index()
    {
        return view('website.member.tambah');
    }

    function show()
    {
        $member = DB::table('members')
                    ->orderBy('created_at')
                    ->get();

        $member = $member->reverse();

        return view('website.member', ['member'=>$member]);
    }

    function search()
    {
        $search_text = $_GET['query']; 
        $member = DB::table('members')
                    ->where('member_id', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('member_name', 'LIKE', '%'.$search_text.'%')
                    ->get();

        return view('website.member', compact('member'));
    }
    
    function store(Request $req)
    {
        $req->validate([
            'member_id' => 'unique:members|min:16|max:16',
            'member_telpNo' => 'min:10|max:13',
        ]);
        
        $member = new Member;
        $member->member_id = $req->member_id;
        $member->member_name = $req->member_name;
        $member->pob = $req->member_pob;
        $member->dob = $req->member_dob;
        $member->address = $req->member_address;
        $member->telp_no = $req->member_telpNo;
        $member->save();
        
        return redirect()->intended('member')->with('message', 'Data berhasil disimpan!');
    }
    
    function profile($member_id)
    {
        $member = DB::table('members')
                    ->where('member_id', '=', $member_id)->first();

        return view('website.member.profile', ['member'=>$member]);
    }

    function editShow($member_id)
    {
        $member = DB::table('members')
                    ->where('member_id', '=', $member_id)->first();

        return view('website.member.edit', ['member'=>$member]);
    }

    function edit(Request $req)
    {
        $req->validate([
            'member_telpNo' => 'min:10|max:13',
        ]);

        $member = DB::table('members')
                    ->updateOrInsert(
                        ['member_id' => $req->member_id],
                        [
                        'member_name' => $req->member_name,
                        'pob' => $req->member_pob,
                        'dob' => $req->member_dob,
                        'address' => $req->member_address,
                        'telp_no' => $req->member_telpNo,
                    ]);

        return redirect()->intended('member')->with('message', 'Data berhasil diubah!');
    }

    function delete($member_id)
    {
        DB::table('members')->where('member_id', '=', $member_id)->delete();

        return redirect()->intended('member')->with('message', 'Data berhasil dihapus!');
    }
}

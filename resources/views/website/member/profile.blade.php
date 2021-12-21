@extends('layout.admin')

@section('content')

    <style>
        .card-body {
            padding : 10px 20px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><br>
                    <h2 class="title text-gray-800">Profil Member</h2>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Nama : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $member->member_name }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">NIK : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $member->member_id }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Tempat Lahir : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $member->pob }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Tanggal Lahir : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $member->dob }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Alamat : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $member->address }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">No Telepon : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $member->telp_no }} </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center"><br>
                    <h3 class="title text-gray-800">Saldo</h3>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Jumlah Saldo : </div>
                    <div class="h5 mb-0 text-gray-800"> Rp{{ number_format($member->balance_sw + $member->balance_ss, 3) }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Simpanan Wajib : </div>
                    <div class="h5 mb-0 text-gray-800"> Rp{{ number_format($member->balance_sw, 3) }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Simpanan Sukarela : </div>
                    <div class="h5 mb-0 text-gray-800"> Rp{{ number_format($member->balance_ss, 3) }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Jumlah Saham : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ number_format(($member->balance_sw + $member->balance_ss) / 1000) }} </div>
                </div> <br />
                <div class="card-body">
                    <a href="/member" class="d-none d-sm-inline-block btn btn-xl btn-primary shadow-xl" 
                    style="float: right"> OK </a>
                </div>
            </div>
        </div>
    </div>
@endsection
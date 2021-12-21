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
                    <h2 class="title text-gray-800">Profil Staff</h2>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Staff ID : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $user->id }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Nama : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $user->user_name }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Alamat : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $user->address }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">No Telepon : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $user->telp_no }} </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center"><br>
                    <h3 class="title text-gray-800">Transaksi</h3>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Jumlah Transaksi yang Ditangani : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $count }} </div>
                </div> <br />
                <div class="card-body">
                    <a href="/staff" class="d-none d-sm-inline-block btn btn-xl btn-primary shadow-xl" 
                    style="float: right"> OK </a>
                </div>
            </div>
        </div>
    </div>
@endsection
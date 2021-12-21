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
                    <h2 class="title text-gray-800">Detail Transaksi</h2>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">ID Transaksi : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $trans->id }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Tanggal : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $trans->date }} </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Tipe : </div>
                    <div class="h5 mb-0 text-gray-800"> {{ $trans->type }} </div>
                </div>

                @if ($trans->type == "Setor")
                    <div class="card-body">
                        <div class="h6 mb-0 text-gray-800">Jumlah Setor : </div>
                        <div class="h5 mb-0 text-gray-800"> Rp{{ number_format(($trans->save_sw + $trans->save_ss), 3) }} </div>
                    </div>
                    <div class="card-body">
                        <div class="h6 mb-0 text-gray-800">Simpanan Wajib : </div>
                        <div class="h5 mb-0 text-gray-800"> Rp{{ number_format($trans->save_sw, 3) }} </div>
                    </div>
                    <div class="card-body">
                        <div class="h6 mb-0 text-gray-800">Simpanan Sukarela : </div>
                        <div class="h5 mb-0 text-gray-800"> Rp{{ number_format($trans->save_ss, 3) }} </div>
                    </div>
                @else
                    <div class="card-body">
                        <div class="h6 mb-0 text-gray-800">Jumlah : </div>
                        <div class="h5 mb-0 text-gray-800"> Rp{{ number_format($trans->loan, 3) }} </div>
                    </div>
                @endif
                
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800"> Member : </div>
                    <div class="h5 mb-0 text-gray-800"> <a href={{ "/member/profile/".$trans->member_id }}>{{ $trans->member_name }}</a> </div>
                </div>
                <div class="card-body">
                    <div class="h6 mb-0 text-gray-800">Staff : </div>
                    <div class="h5 mb-0 text-gray-800"> <a href={{ "/staff/profile/".$trans->user_id }}>{{ $trans->user_name }}</a> </div>
                </div> <br />
                <div class="card-body">
                    <a href="/transaksi" class="d-none d-sm-inline-block btn btn-xl btn-primary shadow-xl" 
                    style="float: right"> OK </a>
                </div>
            </div>
        </div>
    </div>
@endsection
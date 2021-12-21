@extends('layout.admin')

@section('transaksi')
    active
@endsection

@section('search')
    <!-- Topbar Search -->
    <form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
    action="/transaksi/search" method="GET" role="search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                name="query" id="query" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('content')
    <style>
        tbody tr:hover { 
            background: lightblue;
            text-decoration: none;
            font-weight: bold;
        }

        .action {
            background: #f8f9fc;
        }

        td a { 
            display: block;
            text-decoration: none;
            color: #858796;
        }
        a:hover { 
            text-decoration: none;
            color: #858796;
        }
    </style>

    <!-- Page Heading -->

    @if(session('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            {{session('message')}}
        </div>
    @endif

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
        <a href="/transaksi/tambah" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>

    <div class="row">
        <table class="col-xl-12 col-md-12 mb-8">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>ID</th>
                    <th>Tipe</th>
                    <th>Nilai</th>
                    <th>Member</th>
                    <th>Staff</th>
                </tr>
            </thead>
            @foreach ($trans as $item)
                <tbody>
                    <tr>
                        <td> <a href={{"/transaksi/detail/".$item->id}}>{{ $item->date }}</a> </td>
                        <td> <a href={{"/transaksi/detail/".$item->id}}>{{ $item->id }}</a> </td>
                        <td> <a href={{"/transaksi/detail/".$item->id}}>{{ $item->type }}</a> </td>

                        @if ($item->type == "Setor")
                            @php
                                $amount = $item->save_sw + $item->save_ss
                            @endphp

                            <td> <a href={{"/transaksi/detail/".$item->id}}>Rp{{ number_format($amount, 3) }}</a> </td> 
                        @else
                            <td> <a href={{"/transaksi/detail/".$item->id}}>Rp{{ number_format($item->loan, 3) }}</a> </td>
                        @endif
                        
                        <td> <a href={{"/transaksi/detail/".$item->id}}>{{ $item->member_name }}</a> </td>
                        <td> <a href={{"/transaksi/detail/".$item->id}}>{{ $item->user_name }}</a> </td>
                        <td class="action" style="float: right"> 
                            <a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" 
                            href="#" data-toggle="modal" data-target="#deleteModal">
                                <i class="fas fa-trash-alt fa-sm text-white-50"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                </tbody>

                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin menghapus rekaman Transaksi?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: red">Penghapusan rekaman Transaksi akan mempengaruhi beberapa fitur!</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <form action={{"/transaksi/delete/".$item->id}} method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </table>
    </div>
    
@endsection
@extends('layout.admin')

@section('dashboard')
    active
@endsection


@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Masukkan (Bulanan)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp{{ number_format($income, 3) }} 
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Keluaran (Bulanan)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp{{ number_format($expenditure, 3) }} 
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Top Members</h6>
                    <i class="fas fa-crown fa-xl fa-fw text-gray-400"></i>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @foreach ($member as $item)
                        <div class="row">
                            <div class="h7 mb-0 font-weight-bold text-primary col-xl-11 col-lg-11">
                                <a href={{ "/member/profile/".$item->member_id }}>
                                    {{ $item->member_name }}
                                </a>
                            </div>
                            <div class="h7 mb-0 font-weight-bold text-primary col-xl-1 col-lg-1">
                                {{ number_format(($item->balance_sw + $item->balance_ss)/1000) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
@endsection
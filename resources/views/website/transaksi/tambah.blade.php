@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><br>
                    <h2 class="title text-gray-800">Tambah Transaksi</h2>
                </div>
                <div class="card-body">
                    {{-- <div class="row"> --}}
                        <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">

                            <form action="/transaksi/tambah" method="POST">
                                @csrf
                                <label for="trans_date">Tanggal : </label> 
                                <input type="date" name="trans_date" id="trans_date" 
                                value="{{ old('trans_date') }}" /> <br/>

                                <label for="trans_type">Tipe : </label>
                                <select name="trans_type" id="trans_type" onchange="typeSelectCheck(this)" 
                                value="{{ old('trans_type') }}" autofocus required>
                                    <option value="" disabled selected hidden>--Tipe Transaksi--</option>
                                    <option value="Setor" id="setor">Setor</option>
                                    <option value="Tarik">Tarik</option>
                                    <option value="Pinjam">Pinjam</option>
                                </select> <br/>

                                <div id="hidden_div1" style="display:none;">
                                    <label for="trans_wajib">Simpanan Wajib : Rp </label>
                                    <input type="number" min="0" name="trans_wajib" id="trans_wajib" 
                                    class="@error('trans_wajib') is-invalid @enderror" />
                                    <div class="invalid-feedback">
                                        @error('trans_wajib')
                                        {{$message}}
                                        @enderror
                                    </div> <br />
                                    
                                    <label for="trans_sukarela">Simpanan Sukarela : Rp </label>
                                    <input type="number" min="0" name="trans_sukarela" id="trans_sukarela" 
                                    class="@error('trans_sukarela') is-invalid @enderror" /> 
                                    <div class="invalid-feedback">
                                        @error('trans_sukarela')
                                        {{$message}}
                                        @enderror
                                    </div> <br />
                                </div>

                                <div id="hidden_div2" style="display:none;">
                                    <label for="trans_loan">Nominal : Rp </label>
                                    <input type="number" min="10000" name="trans_loan" id="trans_loan" 
                                    class="@error('trans_loan') is-invalid @enderror" />
                                    <div class="invalid-feedback">
                                        @error('trans_loan')
                                        {{$message}}
                                        @enderror
                                    </div> <br/>
                                </div>

                                <label for="member_id">NIK Member : </label>
                                <input type="number" min="1" name="member_id" id="member_id" 
                                class="@error('member_id') is-invalid @enderror" value="{{ old('member_id') }}" required />
                                <div class="invalid-feedback">
                                    @error('member_id')
                                    {{$message}}
                                    @enderror
                                </div> <br/>
                                <input type="text" name="trans_staff" id="trans_staff" value={{ auth()->user()->id }} hidden />
                                <br/> <br/>
                                
                                <div class="align-items-center justify-content-between mb-4 float-right">
                                    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-save fa-sm text-white-50"></i> Simpan</button>
                                    <a href="/transaksi" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                        <i class="fas fa-ban fa-sm text-white-50"></i> Batal</a>
                                </div>
                            </form>
                        
                        </div>
                        <!-- /.box-body -->

                        </div>
                        <!-- /.box -->
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
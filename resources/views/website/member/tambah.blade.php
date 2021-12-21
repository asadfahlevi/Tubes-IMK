@extends('layout.admin')

@section('content')
    <style>
        label {
            margin: 0%;
            padding: 0%;
        }
        .input {
            padding-left: 5px;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><br>
                    <h2 class="title text-gray-800">Tambah Member</h2>
                </div>
                <div class="card-body">
                    {{-- <div class="row"> --}}
                        <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">

                            <form action="/member/tambah" method="POST">
                                @csrf
                                <table>
                                    <tr>
                                        <td> <label for="member_id">NIK </label> </td>
                                        <td>:</td>
                                        <td class="input">
                                            <input type="number" name="member_id" id="member_id" 
                                            min="0" required 
                                            class="@error('member_id') is-invalid @enderror" autofocus />
                                            <div class="invalid-feedback">
                                                @error('member_id')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td> <label for="member_name">Nama Member </label> </td>
                                        <td>:</td>
                                        <td class="input">
                                            <input type="text" name="member_name" id="member_name" 
                                            value="{{ old('member_name') }}" required />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td> <label for="member_pob">Tempat Lahir </label> </td>
                                        <td>:</td>
                                        <td class="input">
                                            <input type="text" name="member_pob" id="member_pob" 
                                            value="{{ old('member_pob') }}" required />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> <label for="member_dob">Tanggal Lahir </label> </td>
                                        <td>:</td>
                                        <td class="input">
                                            <input type="date" name="member_dob" id="member_dob" 
                                            value="{{ old('member_dob') }}" required />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td> <label for="member_address">Alamat </label> </td>
                                        <td>:</td>
                                        <td class="input">
                                            <input type="text" name="member_address" id="member_address" 
                                            value="{{ old('member_address') }}" required />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td> <label for="member_telpNo">Nomor Telepon </label> </td>
                                        <td>:</td>
                                        <td class="input">
                                            <input type="number" name="member_telpNo" id="member_telpNo" 
                                            min="0" value="{{ old('member_telpNo') }}" 
                                            class="@error('member_telpNo') is-invalid @enderror" required />
                                            <div class="invalid-feedback">
                                                @error('member_telpNo')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                    
                                </table> <br /> <br />

                                <div class="align-items-center justify-content-between mb-4 float-right">
                                    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-save fa-sm text-white-50"></i> Simpan</button>
                                    <a href="/member" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                        class="fas fa-ban fa-sm text-white-50"></i> Batal</a>
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
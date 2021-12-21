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
                    <h2 class="title text-gray-800">Tambah Staff</h2>
                </div>
                <div class="card-body">
                    {{-- <div class="row"> --}}
                        <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">

                            <form action="/staff/tambah" method="POST">
                                @csrf
                                <table>
                                    <tr>
                                        <td> <label for="user_name">Nama Staff </label> </td>
                                        <td>:</td>
                                        <td class="input">
                                            <input type="text" name="user_name" id="user_name" 
                                            value="{{ old('user_name') }}" required />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td> <label for="user_address">Alamat </label> </td>
                                        <td>:</td>
                                        <td class="input">
                                            <input type="text" name="user_address" id="user_address" 
                                            value="{{ old('user_address') }}" required />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> <label for="user_telpNo">Nomor Telepon </label> </td>
                                        <td>:</td>
                                        <td class="input">
                                            <input type="number" name="user_telpNo" id="user_telpNo" 
                                            class="@error('user_telpNo') is-invalid @enderror"
                                            min="0" value="{{ old('user_telpNo') }}" required />
                                            <div class="invalid-feedback">
                                                @error('user_telpNo')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> <label for="password">Password </label> </td>
                                        <td>:</td>
                                        <td class="input">
                                            <input type="password" name="password" id="password"
                                            class="@error('password') is-invalid @enderror"
                                            value="{{ old('password') }}" required>
                                            <div class="invalid-feedback">
                                                @error('password')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> <label for="password_confirmation">Konfirmasi Password </label> </td>
                                        <td>:</td>
                                        <td class="input">
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="@error('password_confirmation') is-invalid @enderror"
                                            value="{{ old('password_confirmation') }}" required>
                                            <div class="invalid-feedback">
                                                @error('password_confirmation')
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
@extends('layouts.layouts')

@section('konten')
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
            <div class="section-header-button">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah User</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name"  value="{{ old('name') }}" >
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('password') }}" >
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" >
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Roles</label>
                                        <select class="form-control select2" name="role_id" >
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role_id'))
                                            <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <a href="{{ route( 'users') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

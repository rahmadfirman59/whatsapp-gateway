@extends('layouts.layouts')

@section('konten')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('roles') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Roles</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Master Data</a></div>
                <div class="breadcrumb-item">Roles</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Roles</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('roles.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Nama Roles</label>
                                        <input type="text" class="form-control" name="name"  value="{{ $data->name }}" >
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="d-block">Master Data</label>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="roles" @if( in_array("roles",json_decode($data->menu) ?? []) ) checked @endif  >
                                                <label class="form-check-label">
                                                    Role
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="users" @if( in_array("users",json_decode($data->menu) ?? []) ) checked @endif >
                                                <label class="form-check-label">
                                                    User
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="d-block">Menu</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="dashboards" @if( in_array("dashboards",json_decode($data->menu) ?? []) ) checked @endif  >
                                                <label class="form-check-label">
                                                    Dashboard
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="devices" @if( in_array("devices",json_decode($data->menu) ?? []) ) checked @endif  >
                                                <label class="form-check-label">
                                                    Devices
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="autoreplys" @if( in_array("autoreplys",json_decode($data->menu) ?? []) ) checked @endif >
                                                <label class="form-check-label">
                                                    AutoReply
                                                </label>
                                            </div>
{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="checkbox" name="menu[]" value="phonebooks" @if( in_array("phonebooks",json_decode($data->menu) ?? []) ) checked @endif >--}}
{{--                                                <label class="form-check-label">--}}
{{--                                                    Phonebook--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="riwayat-pesan" @if( in_array("riwayat-pesan",json_decode($data->menu) ?? []) ) checked @endif  >
                                                <label class="form-check-label">
                                                   Riwayat pesan
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="blast-pesan" @if( in_array("blast-pesan",json_decode($data->menu) ?? []) ) checked @endif  >
                                                <label class="form-check-label">
                                                    Blast Pesan
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="pesan-satuan" @if( in_array("pesan-satuan",json_decode($data->menu) ?? []) ) checked @endif >
                                                <label class="form-check-label">
                                                    Pesan Satuan
                                                </label>
                                            </div>
{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="checkbox" name="menu[]" value="rest-apis" @if( in_array("rest-apis",json_decode($data->menu) ?? []) ) checked @endif >--}}
{{--                                                <label class="form-check-label">--}}
{{--                                                    Rest API--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <a href="{{ route( 'roles') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

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
                            <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Nama Roles</label>
                                        <input type="text" class="form-control" name="name"  value="{{ old('name') }}" >
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
                                                <input class="form-check-input" type="checkbox" name="role[]" value="roles" >
                                                <label class="form-check-label">
                                                    Role
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="user[]" value="users" >
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
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="dashboards" >
                                                <label class="form-check-label">
                                                    Dashboard
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="devices" >
                                                <label class="form-check-label">
                                                    Devices
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="autoreplys" >
                                                <label class="form-check-label">
                                                    AutoReply
                                                </label>
                                            </div>
{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="checkbox" name="menu[]" value="phonebooks" >--}}
{{--                                                <label class="form-check-label">--}}
{{--                                                    Phonebook--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="riwayat-pesan"  >
                                                <label class="form-check-label">
                                                    Riawyat Pesan
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="blast-pesan"  >
                                                <label class="form-check-label">
                                                    Blast Pesan
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="menu[]" value="pesan-satuan" >
                                                <label class="form-check-label">
                                                    Pesan Satuan
                                                </label>
                                            </div>
{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="checkbox" name="menu[]" value="rest-apis" >--}}
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

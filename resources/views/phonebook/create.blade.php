@extends('layouts.layouts')

@section('konten')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('phonebooks') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Phonebook</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Phonebook</a></div>
                <div class="breadcrumb-item">Tambah Phonebook</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Phonebook</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('phonebooks.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label>Nomor Telepon</label>
                                        <input type="text" class="form-control" name="phone"  value="{{ old('phone') }}" >
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <a href="{{ route( 'phonebooks') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.layouts')

@section('konten')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('autoreplys') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>AutoReply</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Auto Reply</a></div>
                <div class="breadcrumb-item">Tambah Auto Reply</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Auto Reply</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('autoreplys.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Kata Kunci</label>
                                        <input type="text" class="form-control" name="keyword"  value="{{ $data->keyword }}" >
                                        @if ($errors->has('keyword'))
                                            <span class="text-danger">{{ $errors->first('keyword') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Judul Balasan</label>
                                        <input type="text" class="form-control" name="title"  value="{{ $data->title }}" >
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Balasan</label>
                                        <textarea class="form-control" name="response" rows="5">{{ $data->response }}</textarea>
                                        @if ($errors->has('response'))
                                            <span class="text-danger">{{ $errors->first('response') }}</span>
                                        @endif
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

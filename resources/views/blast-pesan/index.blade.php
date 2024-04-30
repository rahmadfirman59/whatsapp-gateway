@extends('layouts.layouts')

@section('konten')
    <section class="section">
        <div class="section-header">

            <h1>Blast Pesan</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Blast Pesan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-form">
                                <div class="pull-right">
                                    <div class="input-group-btn">
                                        <a href="{{ url('format/format.xlsx') }}" class="btn btn-primary"><i class="fas fa-download"></i>Download Format</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('blast-pesan.import') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-row">

                                    <div class="form-group col-md-12 col-12">
                                        <label>File Excel</label>
                                        <input type="file" class="dropify" name="file"/>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

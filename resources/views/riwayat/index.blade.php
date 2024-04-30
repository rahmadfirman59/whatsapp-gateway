@extends('layouts.layouts')

@section('konten')
    <section class="section">
        <div class="section-header">
            <h1>Riwayat Kirim Pesan</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Riwayat Kirim Pesan</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-form">

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>No</th>
                                            <th>Telepon</th>
                                            <th>Pesan</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                        </tr>
                                        @foreach($data as $key => $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td class="align-middle">
                                                    {{ $value->telepon }}
                                                </td>
                                                <td width="40%">
                                                    {{ \Illuminate\Support\Str::limit($value->pesan,100) }}
                                                </td>
                                                <td>
                                                    @if($value->keterangan == 1)
                                                        Terkirim
                                                    @else
                                                        Tidak Terkirim
                                                    @endif
                                                </td>
                                                <td class="align-middle">
                                                    {{ $value->tanggal }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                {!! $data->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

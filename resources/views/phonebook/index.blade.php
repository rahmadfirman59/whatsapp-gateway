@extends('layouts.layouts')

@section('konten')
    <section class="section">
        <div class="section-header">
            <h1>Phonebook</h1>
            <div class="section-header-button">
                <a href="{{ route('phonebooks.create') }}" class="btn btn-primary">Tambah Phonebook</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Phonebook</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" placeholder="Search" value="{{ app('request')->input('name') }}" >&nbsp;
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nomor Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td class="align-middle">
                                                {{ $value->name }}
                                            </td>
                                            <td>
                                                {{ $value->phone }}
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('phonebooks.edit',$value->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                    <form action="{{ route('phonebooks.destroy',$value->id) }}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <a style="color: white" class="btn btn-danger show-alert-delete-box" data-toggle="tooltip" title="Delete" ><i class="fas fa-trash"></i></a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                {!! $data->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

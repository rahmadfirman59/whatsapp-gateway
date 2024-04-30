@extends('layouts.layouts')

@section('konten')
    <section class="section">
        <div class="section-header">

            <h1>Pesan satuan</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Pesan Satuan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <form action="{{ route('autoreplys.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Nomor Telepon</label>
                                        <input id="telepon" type="text" class="form-control" name="telepon"  value="" placeholder="6282xxxxxxxx" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Pesan</label>
                                        <textarea id="pesan" class="form-control" name="response" rows="5">{{ old('response') }}</textarea>
                                    </div>
                                </div>

                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary" id="store">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        $('#store').click(function (e){
            e.preventDefault();
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            var tgl  = yyyy + "-"+mm+"-"+dd


            let telepon   = $('#telepon').val();
            let pesan = $('#pesan').val();

            $.post('http://localhost:5001/send-message', { session: "mysession", to : telepon, text : pesan, tanggal:tgl},
                function(returnedData){
                    swal({
                        text: 'Pesan berhasil dikirim',
                        icon: 'success'
                    })
                    $('#telepon').val('');
                    $('#pesan').val('');
                    // window.location.reload()
                }).fail(function(){
                swal({
                    text: 'Pesan gagal dikirim',
                    icon: 'error'

                })
                console.log("error");
            });

        });
    </script>
@endsection

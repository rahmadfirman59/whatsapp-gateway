@extends('layouts.layouts')

@section('konten')
    <section class="section">
        <div class="section-header">

            <h1>Process Blast Pesan</h1>

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
                            <h4>Label</h4>
                        </div>
                        <div class="card-body">
                            <h5>Jangan menutup halaman ini sampai indikator mencapai 100%</h5>
                            <div class="progress mb-3" data-height="25">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        var jobs = JSON.parse('@json($phone)')
        var isi = {!! json_encode($isi) !!}

        {{--console.log(isi);--}}
        var step  = 100 / jobs.length ;


        var progress = 0;
        var i = 0;

        let interval = 5000; //one
        var token;

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var tgl  = yyyy + "-"+mm+"-"+dd

        var intervalId = setInterval(function(){
            $.post('http://localhost:5001/send-message', { session: "mysession", to : jobs[i], text : isi[i],tanggal:tgl},
                function(returnedData){

                }).fail(function(){

                console.log("error");
            });
            progress += step
            i++;
            $('.progress-bar').css('width', progress+'%').attr('aria-valuenow', step);
            if(i === jobs.length){
                clearInterval(intervalId);
                swal({
                    title: 'Pengiriman '+i+' pesan telah selesai',
                    text: 'Klik ok untuk mengirim pesan kembali',
                    icon: 'success'
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = "{{ route('blast-pesan') }}";
                        }
                    });
            }
        }, 5000);

    </script>

@endsection

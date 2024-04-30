@extends('layouts.layouts')

@section('konten')
    <section class="section">
        <div class="section-header">
            <h1>Devices</h1>
            <div class="section-header-button">
                @if(count($data) == 0)
                    <button type="button" class="btn btn-primary" data-toggle="modal"  onclick="getQr()">
                        Connect Devices
                    </button>
                @endif
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Devices</div>
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
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>

                                        <th>Nama Session</th>
                                        <th>#</th>
                                    </tr>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td class="align-middle">
                                                {{ $value }}
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('devices.remove') }}" style="color: white" class="btn btn-danger" data-toggle="tooltip" title="Delete" ><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Scan QR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="qrcode"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function getQr(){
            $.get("http://localhost:5001/start-session?session=mysession&scan=true",function(hasil){
                console.log(hasil.data.qr)
                let qr = hasil.data.qr
                let image = new Image()
                image.src = qr
                console.log(image)
                document.getElementById("qrcode").appendChild(image)

            });
            $("#exampleModal").modal('show');
        }
    </script>
@endsection


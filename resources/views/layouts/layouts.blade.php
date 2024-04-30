<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Whatsapp Gateway </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('stisla/node_modules/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/node_modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/node_modules/dropify/css/dropify.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('stisla/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('stisla/assets/css/components.css') }}">

    @yield('css')
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>

            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ url('stisla/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="index.html">Stisla</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{ route('dashboard') }}">St</a>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
{{--                    @if( in_array("users",json_decode(auth()->user()->roles->menu))--}}
{{--                       || in_array("roles",json_decode(auth()->user()->roles->menu))--}}
{{--                    )--}}
{{--                    <li class="nav-item dropdown @if(--}}
{{--                        request()->routeIs('users*')--}}
{{--                        || request()->routeIs('roles*')--}}
{{--                        ) active @endif">--}}
{{--                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-bars"></i> <span>Master Data</span></a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            @if( in_array("users",json_decode(auth()->user()->roles->menu)) )--}}
{{--                                <li @if( request()->routeIs('users*') ) class="active" @endif ><a class="nav-link" href="{{ route('users') }}">User</a></li>--}}
{{--                            @endif--}}
{{--                            @if( in_array("roles",json_decode(auth()->user()->roles->menu)) )--}}
{{--                                <li @if( request()->routeIs('roles*') ) class="active" @endif ><a class="nav-link" href="{{ route('roles') }}">Roles</a></li>--}}
{{--                            @endif--}}

{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    @endif--}}
                    @if( in_array("autoreplys",json_decode(auth()->user()->roles->menu)) )
                        <li @if( request()->routeIs('autoreplys*') ) class="active" @endif><a class="nav-link" href="{{ route('autoreplys') }}"><i class="fas fa-reply-all"></i> <span>Auto Reply</span></a></li>
                    @endif

{{--                    @if( in_array("phonebooks",json_decode(auth()->user()->roles->menu)) )--}}
{{--                        <li @if( request()->routeIs('phonebooks*') ) class="active" @endif><a class="nav-link" href="{{ route('phonebooks') }}"><i class="fas fa-book"></i> <span>Phonebook</span></a></li>--}}
{{--                    @endif--}}
                    @if( in_array("devices",json_decode(auth()->user()->roles->menu)) )
                        <li @if( request()->routeIs('devices*') ) class="active" @endif><a class="nav-link" href="{{ route('devices') }}"><i class="fas fa-mobile-alt"></i><span>Devices</span></a></li>
                    @endif

                    @if( in_array("riwayat-pesan",json_decode(auth()->user()->roles->menu)) )
                        <li><a class="nav-link" href="{{ route('riwayat-pesan') }}"><i class="fas fa-history"></i> <span>Riwayat Pesan</span></a></li>
                    @endif
                    @if( in_array("blast-pesan",json_decode(auth()->user()->roles->menu)) )
                        <li><a class="nav-link" href="{{ route('blast-pesan') }}"><i class="fas fa-mail-bulk"></i> <span>Blast Pesan</span></a></li>
                    @endif
                    @if( in_array("pesan-satuan",json_decode(auth()->user()->roles->menu)) )
                        <li><a class="nav-link" href="{{ route('pesan-satuan') }}"><i class="fas fa-paper-plane"></i> <span>Pesan Satuan</span></a></li>
                    @ENDIF



                </ul>
            </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @yield('konten')
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauv.al/">Muhamad Nauval Azhar</a>
            </div>
            <div class="footer-right">
                2.3.0
            </div>
        </footer>
    </div>
</div>

<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ url('stisla/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ url('stisla/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script src="{{ url('stisla/node_modules/jquery-ui-dist/jquery-ui.min.js') }}"></script>
<script src="{{ url('stisla/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ url('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ url('stisla/node_modules/dropify/js/dropify.js') }}"></script>
<script src="{{ url('stisla/node_modules/chart.js/dist/Chart.min.js') }}"></script>

<!-- Template JS File -->
<script src="{{ url('stisla/assets/js/scripts.js') }}"></script>
<script src="{{ url('stisla/assets/js/custom.js') }}"></script>

<script>
    $('.select2').select2();
    $('.dropify').dropify();
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: 'Apakah anda  yakin?',
            text: 'Setelah dihapus data tidak dapat dikembalikan',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                } else {
                    swal('Batal hapus');
                }
            });
    });

    @if(Session::has('message'))
    @php
        $message = Session::get('message');
    @endphp
    swal('Berhasil', '{{$message['content']}}', 'success');

    @endif
</script>
@yield('js')
<!-- Page Specific JS File -->
</body>
</html>


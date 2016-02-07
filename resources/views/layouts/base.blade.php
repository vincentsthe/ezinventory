<!DOCTYPE HTML>
<html>
    <head>
        <title>EzInventory</title>

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">

        <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-2.2.0.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">EzInventory</a>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="/atk">Daftar ATK</a></li>
                        <li role="presentation"><a href="#">Daftar Pemakaian</a></li>
                        <li role="presentation"><a href="#">Daftar Booking</a></li>
                        <li role="presentation"><a href="/pengadaan">Daftar Pengadaan</a></li>
                        <li role="presentation"><a href="#">Daftar Supplier</a></li>
                        <li role="presentation"><a href="#">Daftar Peminjam</a></li>
                        <li role="presentation"><a href="#">Statistik</a></li>
                    </ul>
                </div>

                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>

        @yield('javascript')
    </body>
</html>
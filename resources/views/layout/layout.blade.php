<html>
<head>
    <title>@yield('title')</title>
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" crossorigin="anonymous" />
</head>
<body>
@section('sidebar')
@show
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href="#">SISAUDIENCIA 1.0</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{url('processo')}}">Processos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('audiencia')}}">Ata de aundiência</a>
            </li>
        </ul>
    </div>
</nav>
<div id="layoutSidenav">
    <br>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <br>
                @yield('content')

            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; TJDF 2020</div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}" ></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}" ></script>
<script src="{{asset('js/all.min.js')}}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Gestion de Cursos</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ url('/') }}/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/demo.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <script src="{{ url('/') }}/assets/vendor/js/helpers.js"></script>
    <script src="{{ url('/') }}/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                    <a class="navbar-brand" href="#"><i class='bx bxs-user-circle mb-1'></i> @php
                        echo session('cliente')
                    @endphp</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i class='bx bxs-home mb-1'></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class='bx bxs-book-bookmark mb-1'></i> Programa de Estudio</a>
                        </li>
                        </ul>
                        {{-- isset(), empty() --}}
                        @if (!empty(session('cliente')))
                            <form action="{{route('cerrar_sesion')}}" method="POST">
                                @method('GET')
                                <button class="btn btn-danger"><i class='bx bx-user-x'></i>Cerrar Sesion</button>
                            </form>
                        @else
                            <a href="{{url('/Login')}}" class="btn btn-info"><i class='bx bxs-user-check'></i>Iniciar Sesion</a>
                        @endif
                    </div>
                    </div>
                </nav>
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Cursos /</span> Disponibles</h4>
                    <!-- Grid Card -->
                    <h6 class="pb-1 mb-4 text-muted">Grid Card</h6>
                    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Titulo</h5>
                                        <p class="card-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, rem? Eius eum libero nam est omnis esse possimus perferendis, vero dignissimos hic placeat magnam maxime, quia, cupiditate consectetur quam voluptas?
                                        </p>

                                        <button class="btn btn-primary"><i class='bx bxs-detail'></i> Ver Mas</button>
                                        @if (!empty(session('cliente')))
                                            <button class="btn btn-secondary"><i class='bx bxs-badge-check'></i> Inscribirme
                                            </button>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!--/ Card layout -->
                </div>
                <!-- / Content -->
                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://themeselection.com" target="_blank" class="footer-link fw-medium">ThemeSelection</a>
                            </div>
                            <div class="d-none d-lg-inline-block">
                                <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>
                                <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>
                                <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="footer-link">Support</a>
                            </div>
                        </div>
                    </footer>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('/') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ url('/') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ url('/') }}/assets/vendor/js/menu.js"></script>
    <script src="{{ url('/') }}/assets/vendor/libs/masonry/masonry.js"></script>
    <script src="{{ url('/') }}/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
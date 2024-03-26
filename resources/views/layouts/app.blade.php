<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IPA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/b3fa391278.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="/"><img src="{{ asset('img/Karger_RGB.png') }}" alt="" height="50"></a>
                </div>
                <ul class="sidebar-nav">



                    <br>
                    <li class="sidebar-item">
                        <a href="/workload" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Workload history
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/invoice" class="sidebar-link">
                            <i class="fa-solid fa-file-lines pe-2"></i>
                            Invoice
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link">
                            <i class="fa-regular fa-circle-question pe-1"></i>
                            Help Center
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link">
                            <i class="fa-regular fa-circle pe-1"></i>
                            Settings
                        </a>
                    </li>

                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="#" class="theme-toggle">
                    <i class="fa-regular fa-moon"></i>
                    <i class="fa-regular fa-sun"></i>
                </a>
                <div class="navbar-collapse navbar">

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">


                                <img src="{{ asset('img/Profilbild.jpg') }}" class="avatar img-fluid rounded"
                                    alt="">


                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>



            @yield('content')



            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="https://www.karger.com" target="blank" class="text-muted">
                                    <strong>S. Karger AG</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a target="blank"
                                        href="https://karger.atlassian.net/servicedesk/customer/portal/2/group/3/create/9"
                                        class="text-muted">Need help?</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
</body>

</html>

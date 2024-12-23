<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-motorcycle"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href=""><i class="fas fa-fw fa-table"></i><span>Dashboard </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('brandList') }}"><i class="fa-solid fa-sitemap"></i></i><span>Motorcycle Companies</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('brandCreatePage') }}"><i class="fa-solid fa-sitemap"></i></i><span>Create Motorcycle Companies</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categoryListPage') }}"><i class="fa-solid fa-sitemap"></i></i><span>Motorcycle Category List</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('categoryCreatePage') }}"><i class="fa-solid fa-circle-plus"></i></i><span>Add Category</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href=""><i class="fa-solid fa-layer-group"></i><span>Motorcycle List </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('bikeDetailsCreatePage') }}"><i class="fa-solid fa-plus"></i></i><span>Add Motorcycle</span></a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href=""><i class="fa-solid fa-credit-card"></i></i><span>Payment Method </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href=""><i class="fa-solid fa-list"></i><span>Sale Information </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href=""><i class="fa-solid fa-cart-shopping"></i><span>Order Board </span></a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" href=""><i class="fa-solid fa-users"></i><span>Admin and User List </span></a>
            </li>

            {{-- @if (auth()->user()->provider == 'simple')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('changePasswordPage') }}"><i class="fa-solid fa-lock"></i><span>Change Password </span></a>
                </li>
            @endif --}}

            <li class="nav-item">
                <a class="nav-link" href=""><i class="fa-solid fa-gear"></i></i><span>Create New Admin Account </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa-solid fa-right-from-bracket"></i></i><span>Logout </span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name != null ? auth()->user()->name :auth()->user()->nickname}}</span> --}}
                                {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
                                {{-- @if (auth()->user()->profile == null)
                                    <img class="img-profile rounded-circle" src="{{ asset('/admin/defaultphoto/default.jpg') }}">
                                @else
                                    <img class="img-profile rounded-circle" src="{{ asset('/admin/profile_photo/'.auth()->user()->profile) }}">
                                @endif --}}
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                {{-- @if (auth()->user()->provider=='simple')
                                    <a class="dropdown-item" href="">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Change Password
                                    </a>
                                @endif --}}



                                <div class="dropdown-divider"></div>
                                <form method="POST" action="">
                                    @csrf
                                    <span class=" dropdown-item">
                                        <input type="submit" class="btn btn-primary" value="Logout">
                                    </span>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('content')

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/js/demo/chart-pie-demo.js') }}"></script>

    {{-- image thumbnail loadfile --}}
    <script>
        function loadFile(event){
            var reader= new FileReader();

            reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0])
        }
    </script>

</body>

@yield('js-content')

</html>

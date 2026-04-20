<!DOCTYPE html>
<html lang="en">

<header>
    @include('Admin.layout.header')
    <style>
        @media (max-width: 991px) {

            .sidebar {
                position: fixed;
                left: -260px;
                top: 0;
                width: 250px;
                height: 100%;
                z-index: 1060;
                transition: 0.3s;
            }

            .sidebar.active {
                left: 0;
            }

            /* keep button clickable always */
            #sidebarToggle {
                position: relative;
                z-index: 1070;
            }
        }
    </style>



</header>

<body class="with-welcome-text">
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button id="sidebarToggle" class="btn btn-dark d-lg-none ms-2">
                        ☰
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                        <img src="{{ $logo ?? asset('assets/images/logo-bg.png') }}" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
                        <img src="{{ asset('assets/images/logo-bg.png') }}" alt="logo" />
                    </a>
                </div>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                @include('Admin.layout.navbar')
            </nav>
            <!-- partial -->
            <div class="main-panel">

                @yield('content')


                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('Admin.layout.footer-script')


    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const toggleBtn = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');

            if (!toggleBtn || !sidebar) {
                console.log("Sidebar elements missing");
                return;
            }

            toggleBtn.addEventListener('click', function () {
                sidebar.classList.toggle('active');
            });

        });
    </script>
</body>

</html>
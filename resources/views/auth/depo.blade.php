<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    @include('auth.layout.header')
</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('auth.layout.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('auth.layout.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @yield(Route::currentRouteName() ? Str::replace('.', '-', Route::currentRouteName()) : 'content')
                </div>

                <!-- / Content -->

                {{-- <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                <div class="card-title">
                                                    <h5 class="text-nowrap mb-2">Profile Report</h5>
                                                    <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                                                </div>
                                                <div class="mt-sm-auto">
                                                    <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> 68.2%</small>
                                                    <h3 class="mb-0">$84,686k</h3>
                                                </div>
                                            </div>
                                            <div id="profileReportChart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with ❤️ by
                            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                        </div>
                        <div>
                            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

                            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="footer-link me-4">Support</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <div id="spinner" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(84, 84, 84, 0.3); z-index: 9999; display: none;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="text-dark" style="animation: none; font-size: 1rem; display: inline-block; vertical-align: middle;">
                {{-- Lagi ngimport --}}
                <span style="animation: dot 1.5s infinite; display: inline-block;">Lagi</span>
                <span style="animation: dot 1.5s infinite .2s; display: inline-block;">ngimport </span>
                <span style="animation: dot 1.5s infinite .4s; display: inline-block;">.</span>
                <span style="animation: dot 1.5s infinite .6s; display: inline-block;">.</span>
                <span style="animation: dot 1.5s infinite .8s; display: inline-block;">.</span>


                <style>
                    @keyframes dot {
                        0% {
                            transform: translateX(0);
                        }

                        50% {
                            transform: translateX(5px);
                        }

                        100% {
                            transform: translateX(0);
                        }
                    }
                </style>
            </p>
        </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
        <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div>

    @include('auth.layout.footer')
    @include('auth.scripts.modals')
</body>

</html>

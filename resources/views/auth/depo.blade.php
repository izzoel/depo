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

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">developed by <a href="https://izzoel.github.io/" class="footer-link fw-bolder">zetware.id</a> @2025</div>
                        {{-- <div>
                            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

                            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="footer-link me-4">Support</a>
                        </div> --}}
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
    {{-- 
    <div class="buy-now">
        <button type="button" class="btn btn-danger btn-buy-now" data-bs-toggle="modal" data-bs-target="#betaModal">Beta v2.0</button>

        <!-- Modal -->
        <div class="modal fade" id="betaModal" tabindex="-1" aria-labelledby="betaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="betaModalLabel">Beta v2.0</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <table class="table table-responsive fst-italic">
                                        <tbody>
                                            <tr>
                                                <td>Release Date</td>
                                                <td>--</td>
                                                <td>15 Januari 2025 23:29</td>
                                            </tr>
                                            <tr>
                                                <td>Penggembang</td>
                                                <td>--</td>
                                                <td>zetware.id</td>
                                            </tr>
                                            <tr>
                                                <td class="align-top">Fitur</td>
                                                <td class="align-top">--</td>
                                                <td class="align-top">
                                                    >responsive (web, tablet, mobile)<br>
                                                    >optimasi performa query data<br>
                                                    >interaktif chart statistik<br>
                                                    >profil pengguna<br>
                                                    >ganti password
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @include('auth.layout.footer')

</body>

</html>

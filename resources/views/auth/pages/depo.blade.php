@extends('auth.depo')

@section('depo')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Total Alat & Bahan Statistics -->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Total Alat & Bahan</h5>
                            <small class="text-muted">Inventaris</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2">{{ $statistik['total_persediaan'] }}</h2>
                                <span>Alat & Bahan</span>
                            </div>
                            <div id="orderStatisticsChart"></div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <a href="{{ route('alat') }}">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-test-tube"></i></span>
                                    </div>
                                </a>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Alat</h6>
                                        <small class="text-muted">{{ implode(', ', $statistik['alat']) . ', ...' }}</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $statistik['total_alat'] }}</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <a href="{{ route('cair') }}">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-info"><i class="bx bx-water"></i></span>
                                    </div>
                                </a>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Bahan Cair</h6>
                                        <small class="text-muted">{{ implode(', ', $statistik['cair']) . ', ...' }}</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $statistik['total_cair'] }}</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <a href="{{ route('padat') }}">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-hive"></i></span>
                                    </div>
                                </a>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Bahan Padat</h6>
                                        <small class="text-muted">{{ implode(', ', $statistik['padat']) . ', ...' }}</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">{{ $statistik['total_padat'] }}</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Total Alat & Bahan Statistics -->

            <div class="col-md-8 col-lg-8 col-xl-8 order-0 mb-4">
                <div class="card h-100">
                    <div class="row row-bordered g-0">
                        <div class="col-md-8">
                            <h5 class="card-header m-0 me-2 pb-3">Logbook Depo</h5>
                            <div id="totalRevenueChart" class="px-2" style="min-height: 315px;">
                                <div id="chartLogbook"></div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 511px; height: 377px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            2025
                                        </button>
                                        {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                            <a class="dropdown-item" href="javascript:void(0);">202</a>
                                            <a class="dropdown-item" href="javascript:void(0);">202</a>
                                            <a class="dropdown-item" href="javascript:void(0);">202</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div id="growthChart" style="min-height: 154.875px;">
                                <div id="gaugeTransaksi"></div>
                            </div>
                            <div class="text-center fw-semibold pt-3 mb-2">Total Logbook Pengguna</div>

                            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                <div class="d-flex">
                                    <div class="me-2">
                                        <span class="badge bg-label-primary p-2"><i class="bx bxs-archive-in text-primary"></i></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <small>ambil</small>
                                        <h6 class="mb-0">{{ $statistik['total_riwayat_ambil'] }}</h6>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <span class="badge bg-label-info p-2"><i class="bx bxs-archive-out text-danger"></i></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <small>kembali</small>
                                        <h6 class="mb-0">{{ $statistik['total_riwayat_kembali'] }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 256px; height: 377px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
@endsection

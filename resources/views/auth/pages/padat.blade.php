@extends('auth.depo')

@section('padat')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="justify-content-between flex-sm-row flex-column gap-3">
                            <div class="flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                            @auth
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#M_S_padat">
                                                    Bahan Padat
                                                </button>
                                                @include('auth.modals.padat')
                                            @endauth
                                            @guest
                                                <button type="button" class="btn btn-primary">
                                                    Bahan Padat
                                                </button>
                                                @include('auth.modals.persediaan')
                                            @endguest
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-text">
                                    <table id="depoPadat" class="table table-striped table-bordered dt-responsive wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th data-priority="2">Nama Bahan</th>
                                                <th data-priority="3">Stok</th>
                                                <th>Lokasi</th>
                                                @auth
                                                    <th class="col-auto" data-priority="1">Aksi</th>
                                                @endauth
                                                @guest
                                                    <th class="col" data-priority="1">Aksi</th>
                                                @endguest
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($persediaans as $persediaan)
                                                <tr>
                                                    <td>{{ $persediaan->nama }} </td>
                                                    <td>{{ $persediaan->stok . ' ' . $persediaan->satuan }}</td>
                                                    <td>{{ $persediaan->lokasi }}</td>
                                                    @auth
                                                        <td class="text-center px-0">
                                                            <a type="button" class="U_B_padat text-info" data-id="#M_U_padat-{{ $persediaan->id }}">
                                                                <span class="tf-icons bx bx-edit"></span>edit
                                                            </a>

                                                            <span class="mx-1">|</span>

                                                            <a type="button" class="D_B_padat text-danger" data-id="M_D_padat-{{ $persediaan->id }}">
                                                                <span class="tf-icons bx bxs-x-square"></span>
                                                            </a>
                                                        </td>
                                                    @endauth
                                                    @guest
                                                        <td class="text-center px-0">
                                                            <a type="button" class="U_A_alat text-primary" data-id="#M_A_alat-{{ $persediaan->id }}">
                                                                <span class="tf-icons bx bxs-archive-out"></span> Ambil
                                                            </a>

                                                            <span class="mx-1">|</span>

                                                            <a type="button" class="U_K_alat text-danger" data-id="M_K_alat-{{ $persediaan->id }}">
                                                                <span class="tf-icons bx bxs-archive-in"></span> Kembali
                                                            </a>
                                                        </td>
                                                    @endguest
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('auth.depo')

@section('riwayat')
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
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#M_S_satuan">
                                                Riwayat
                                            </button>

                                            {{-- @include('auth.modals.satuan') --}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-text">
                                    <table id="depoRiwayat" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                @auth
                                                    <th>Mahasiswa</th>
                                                @endauth
                                                <th data-priority="1">Alat / Bahan</th>
                                                <th>Ambil</th>
                                                <th>Kembali</th>
                                                <th class="col-1">Tanggal</th>
                                                <th>Keperluan</th>
                                                @auth
                                                    <th class="col-1" data-priority="2">Aksi</th>
                                                @endauth
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($riwayats as $riwayat)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    @auth
                                                        <td>{{ $riwayat->mahasiswa->nama }}</td>
                                                    @endauth
                                                    <td>{{ $riwayat->persediaan->nama }}</td>
                                                    <td class="text-center">{{ $riwayat->ambil }}</td>
                                                    <td class="text-center">{{ $riwayat->kembali }}</td>
                                                    <td class="text-center px-1">{{ date('d-m-Y -- H:i:s', strtotime($riwayat->tanggal)) }}</td>
                                                    <td class="text-center">{{ $riwayat->keperluan }}</td>
                                                    @auth
                                                        <td class="text-center px-2">
                                                            <a type="button" class="U_B_satuan text-info" data-id="#M_U_riwayat-">
                                                                <span class="tf-icons bx bx-edit"></span>edit
                                                            </a>

                                                            <span class="mx-1">|</span>

                                                            <a type="button" class="D_B_satuan text-danger" data-id="M_D_riwayat-">
                                                                <span class="tf-icons bx bxs-x-square"></span>
                                                            </a>
                                                        </td>
                                                    @endauth
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

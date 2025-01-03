@extends('auth.depo')

@section('kerusakan')
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
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#M_S_mahasiswa">
                                                Kerusakan Alat
                                            </button>

                                        </li>
                                    </ul>
                                </div>
                                <div class="card-text">
                                    <table id="kerusakan" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nama Alat</th>
                                                <th class="col-2">Stok</th>
                                                <th class="col-2">Lokasi</th>
                                                <th class="col-2">Kondisi</th>
                                                <th class="col-2">Status</th>
                                                <th class="col-auto">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($cairs as $cair)
                                                            <tr>
                                                                <td>{{ $cair->nama }}</td>
                                        <td>{{ $cair->stok . ' ' . $cair->satuan }}</td>
                                        <td>{{ $cair->lokasi }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm ambilModal me-3" data-id="{{ $cair->id }}"
                                                {{ $cair->stok <= 0 ? 'disabled' : '' }}>
                                                <i class="bx bxs-donate-blood"></i> Ambil
                                            </button>

                                            <button type="button" class="btn btn-success btn-sm setorModal me-3" data-id="{{ $cair->id }}">
                                                <i class="bx bxs-archive-in"></i> Setor
                                            </button>

                                            @auth
                                            <button type="button" class="btn btn-secondary btn-sm settingModal" data-id="{{ $cair->id }}">
                                                <i class='bx bx-cog'></i>
                                            </button>
                                            @endauth
                                        </td>
                                        </tr>
                                        @endforeach --}}
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

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

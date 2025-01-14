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
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#M_S_kerusakan">
                                                Kerusakan Alat
                                            </button>
                                            @include('auth.modals.kerusakan')
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-text">
                                    <table id="kerusakan" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">Nama Alat</th>
                                                <th>Lokasi</th>
                                                <th>Kondisi</th>
                                                <th>Status</th>
                                                @auth
                                                    <th class="col-auto" data-priority="2">Aksi</th>
                                                @endauth
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kerusakans as $kerusakan)
                                                <tr>
                                                    <td>{{ $kerusakan->nama }}</td>
                                                    <td>{{ $kerusakan->lokasi }}</td>
                                                    <td>{{ $kerusakan->kondisi }}</td>
                                                    <td>
                                                        <span
                                                            class="badge rounded-pill {{ $kerusakan->status == 'Selesai' ? 'bg-success' : ($kerusakan->status == 'Rusak Total' ? 'bg-danger' : ($kerusakan->status == 'Peninjauan' ? 'bg-secondary' : 'bg-primary')) }}">
                                                            {{ $kerusakan->status }}
                                                        </span>
                                                    </td>
                                                    @auth
                                                        <td class="text-center px-0">
                                                            <a type="button" class="U_B_kerusakan text-info" data-id="#M_U_kerusakan-{{ $kerusakan->id }}">
                                                                <span class="tf-icons bx bx-edit"></span>edit
                                                            </a>

                                                            <span class="mx-1">|</span>

                                                            <a type="button" class="D_B_kerusakan text-danger" data-id="M_D_kerusakan-{{ $kerusakan->id }}">
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

@extends('auth.depo')

@section('laboratorium')
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
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#M_S_laboratorium">
                                                Laboratorium
                                            </button>

                                            @include('auth.modals.laboratorium')
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-text">
                                    <table id="laboratorium" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-priority="1">Nama</th>
                                                <th>Lokasi</th>
                                                <th class="col-auto" data-priority="2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($laboratoriums as $laboratorium)
                                                <tr>
                                                    <td>{{ $loop->iteration }} </td>
                                                    <td>{{ $laboratorium->nama }} </td>
                                                    <td>{{ $laboratorium->lokasi }}</td>
                                                    <td class="text-center px-0">
                                                        <a type="button" class="U_B_laboratorium text-info" data-id="#M_U_laboratorium-{{ $laboratorium->id }}">
                                                            <span class="tf-icons bx bx-edit"></span>edit
                                                        </a>

                                                        <span class="mx-1">|</span>

                                                        <a type="button" class="D_B_laboratorium text-danger" data-id="M_D_laboratorium-{{ $laboratorium->id }}">
                                                            <span class="tf-icons bx bxs-x-square"></span>
                                                        </a>
                                                    </td>
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

<!DOCTYPE html>
<html lang="en">

@include('scripts.script_header')

@include('layouts.header')

<body>
    {{-- <div id="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div> --}}

    <main id="main">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="ms-2 collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-cair') }}">
                            <span class="p-2 pr-4 pl-4 rounded"
                                style="{{ request()->segment(2) == 'cair' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ request()->segment(2) == 'cair' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Bahan Cair
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-padat') }}">
                            <span class="p-2 pr-4 pl-4 rounded"
                                style="{{ request()->segment(2) == 'padat' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ request()->segment(2) == 'padat' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Bahan Padat
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-alat') }}">
                            <span class="p-2 pr-4 pl-4 rounded"
                                style="{{ request()->segment(2) == 'alat' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ request()->segment(2) == 'alat' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Alat
                            </span>
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menu-kerusakan') }}">
                                <span class="p-2 pr-4 pl-4 rounded"
                                    style="{{ request()->segment(2) == 'kerusakan' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                    onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                    onmouseout="{{ request()->segment(2) == 'kerusakan' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                    Kerusakan Alat
                                </span>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>

        @if (request()->segment(2) == 'cair')
            @include('contents.menus.cair')
        @elseif(request()->segment(2) == 'padat')
            @include('contents.menus.padat')
        @elseif(request()->segment(2) == 'alat')
            @include('contents.menus.alat')
        @elseif(request()->segment(2) == 'kerusakan')
            @include('contents.menus.kerusakan')
        @elseif(request()->segment(3) == 'satuan')
            @include('contents.settings.satuan')
        @elseif(request()->segment(3) == 'lokasi')
            @include('contents.settings.lokasi')
        @elseif(request()->segment(3) == 'laboratorium')
            @include('contents.settings.laboratorium')
        @elseif(request()->segment(2) == 'setting')
            @include('contents.settings.setting')
        @endif

        <div class="modal fade" id="modalTake" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning"><i class="bx bxs-donate-blood"></i>&nbsp;<b id="labelTakeNama"></b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="submit-form">
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary" id="labelTakeStok"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary" id="labelTakeLokasi"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <label for="inputTake" class="form-label mb-0">Ambil</label>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <input type="text" class="form-control take-angka" placeholder="..." required oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            name="ambil" id="inputTake">
                                        <span class="input-group-text" id="labelTakeSatuan"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalPut" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-success"><i class="bx bxs-archive-in"></i>&nbsp;<b id="labelPutNama"></b></a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="submit-put">
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary" id="labelPutStok"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8"><span class="badge bg-primary" id="labelPutLokasi"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <label for="inputPut" class="form-label mb-0">Setor</label>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <input type="text" class="form-control take-angka" placeholder="..." required
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="setor" id="inputPut">
                                        <span class="input-group-text" id="labelPutSatuan"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalSetting" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-secondary">
                                <i class='bx bx-cog'></i><b> Edit</b>
                            </a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form id="submit-setting">
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">Nama</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="..." name="namaEdit" id="labelSettingNama" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Stok</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="stokEdit"
                                                id="labelSettingStok" required>
                                            <select class="form-select" style="border-radius: 0 4px 4px 0;" id="labelSettingSatuan" name="satuanEdit" required>
                                            </select>
                                        </div>
                                        </td>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">Lokasi</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <select class="form-select" style="border-radius: 0 4px 4px 0;" id="labelSettingLokasi" name="lokasiEdit" required>
                                            </select>
                                        </div>
                                        </td>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer d-flex">
                            <div class="me-auto p-2">
                                <a class="btn btn-danger btn-sm btn-destroy" id="destroyButton" role="button">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </div>
                            <div class="p-2">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>

        <div class="modal fade" id="modalMenuSetting" tabindex="-1">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <a class="btn btn-warning">
                                <i class='bx bx-cog'></i><b> Edit</b>
                            </a>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form id="submit-menu-setting">
                        <div class="modal-body">
                            <div class="container mb-4 ps-0 pe-0">
                                <div class="row mb-2">
                                    <div class="col">{{ request()->segment(3) }}</div>
                                    <div class="col-auto">:</div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" placeholder="..." name="edit" id="inputEdit" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer d-flex">
                            <div class="me-auto p-2">
                                <a class="btn btn-danger btn-sm btn-destroy" id="destroyButton" role="button">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </div>
                            <div class="p-2">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </main>
    @include('contents.modals.modal_history')
    @auth
        @include('contents.modals.modal_rekap')
        @include('contents.modals.modal_bahan')
        @include('contents.modals.modal_kerusakan')
        @include('contents.modals.modal_satuan')
        @include('contents.modals.modal_lokasi')
        @include('contents.modals.modal_laboratorium')
    @endauth

    <a href="/" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up"></i>
    </a>

    @include('layouts.footer')

    @include('scripts.script_footer')
    @include('scripts.script_datatable')
    @include('scripts.script_menu')

    @include('scripts.script_modal')

    @guest
        @include('scripts.script_button')
    @endguest

    @include('scripts.script_pencarian')

</body>

</html>

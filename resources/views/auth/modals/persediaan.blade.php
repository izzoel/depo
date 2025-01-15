@if (session('success'))
    @include('auth.toasts.success')
@endif

<div class="modal modalAmbil fade" id="M_A_alat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ambil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <div class="tab-pane fade show active" id="nav-alat" role="tabpanel">
                        <form id="A_route" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="A_nama">Nama</label>
                                <input type="text" class="form-control" id="A_nama" name="A_nama" disabled />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="A_stok">Stok</label>
                                <input type="text" class="form-control" id="A_stok" name="A_stok" disabled />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="A_lokasi">Laboratorium</label>
                                <select class="form-select" id="A_lokasi" name="lokasi" disabled>
                                    <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                    @foreach ($lokasis as $lokasi)
                                        <option value="{{ $lokasi->lokasi }}">{{ $lokasi->lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="form-label" for="A_ambil">Ambil<span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge mb-3">
                                <input id="A_ambil" name="ambil" type="text" class="form-control" placeholder="jumlah ambil" required>
                                <span class="input-group-text" id="A_satuan"></span>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modalKembali fade" id="M_K_alat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kembali</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <div class="tab-pane fade show active" id="nav-alat" role="tabpanel">
                        <form id="K_route" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="K_nama">Nama</label>
                                <input type="text" class="form-control" id="K_nama" name="K_nama" disabled />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="K_stok">Stok</label>
                                <input type="text" class="form-control" id="K_stok" name="K_stok" disabled />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="K_lokasi">Laboratorium</label>
                                <select class="form-select" id="K_lokasi" name="lokasi" disabled>
                                    <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                    @foreach ($lokasis as $lokasi)
                                        <option value="{{ $lokasi->lokasi }}">{{ $lokasi->lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="form-label" for="K_kembali">Kembali<span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge mb-3">
                                <input id="K_kembali" name="kembali" type="text" class="form-control" placeholder="jumlah kembali" required>
                                <span class="input-group-text" id="K_satuan"></span>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

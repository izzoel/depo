@if (session('success'))
    @include('auth.toasts.success')
@endif


<div class="modal fade" id="M_S_padat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Padat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#nav-padat" aria-controls="nav-padat"
                                aria-selected="true">
                                <i class="tf-icons bx bx-pencil"></i> Input
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile"
                                aria-controls="navs-justified-profile" aria-selected="false">
                                <i class="tf-icons bx bx-cloud-upload"></i> Import
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-padat" role="tabpanel">
                            <form action="{{ route('padat_store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="depo_padat">Nama Bahan<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="depo_padat" name="nama" placeholder="Albumin" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="stok">Stok</label><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="stok" name="stok" rows="2" placeholder="200"></input>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="satuan">Satuan</label><span class="text-danger">*</span></label>
                                    <select class="form-select" id="satuan" name="satuan" required>
                                        <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                        <option value="pcs">pcs</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="lokasi">Lokasi<span class="text-danger">*</span></label>
                                    <select class="form-select" id="lokasi" name="lokasi" required>
                                        <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                        @foreach ($laboratoriums as $laboratorium)
                                            <option value="{{ $laboratorium->nama }}">{{ $laboratorium->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="hidden" name="jenis" value="padat">

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                            <form id="importForm" action="{{ route('persediaan_import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="file" class="form-label">File Upload</label>
                                    <span class="text-muted" style="font-size: .7rem; font-style: italic"> (data yang sama akan ditimpa)</span>
                                    <input class="form-control" type="file" id="file" name="file" />
                                </div>
                                <a href="{{ asset('Template Import -- Persediaan.csv') }}">
                                    <i class="tf-icons bx bxs-download"></i>Template <span class="badge bg-label-danger">.csv</span>
                                </a>

                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal modalUpdate fade" id="M_U_padat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Bahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <div class="tab-pane fade show active" id="nav-padat" role="tabpanel">
                        <form id="U_route" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="U_nama">Nama<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="U_nama" name="nama" placeholder="Albumin" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_stok">Stok<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="U_stok" name="stok" placeholder="200" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_satuan">Satuan</label><span class="text-danger">*</span></label>
                                <select class="form-select" id="U_satuan" name="satuan" required>
                                    <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                    <option value="pcs">pcs</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_lokasi">Lokasi<span class="text-danger">*</span></label>
                                <select class="form-select" id="U_lokasi" name="lokasi" required>
                                    <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                    @foreach ($laboratoriums as $laboratorium)
                                        <option value="{{ $laboratorium->nama }}">{{ $laboratorium->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_jenis">Jenis<span class="text-danger">*</span></label>
                                <select class="form-select" id="U_jenis" name="jenis" required>
                                    <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                    <option value="alat">Alat</option>
                                    <option value="cair">Cair</option>
                                    <option value="padat">Padat</option>
                                </select>
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


<div class="modal modalDelete fade" id="M_D_padat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_padat">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h4 class="text-center">
                        Yakin ingin <span class="text-danger">menghapus</span> data?
                    </h4>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-evenly">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="D_route" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="jenis" value="padat">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>

</div>

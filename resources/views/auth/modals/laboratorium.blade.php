@if (session('success'))
    @include('auth.toasts.success')
@endif


<div class="modal fade" id="M_S_laboratorium" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Laboratorium</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <form action="{{ route('laboratorium_store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama Laboratorium<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Lab. Kimia" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="lokasi">Lokasi</label>
                            <select class="form-select" id="lokasi" name="lokasi" required>
                                <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                <option value="Gedung Laboratorium Terpadu">Gedung Laboratorium Terpadu</option>
                                <option value="Gedung B">Gedung B</option>
                                <option value="Gedung C">Gedung C</option>
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


<div class="modal modalUpdate fade" id="M_U_laboratorium" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Laboratorium</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <div class="tab-pane fade show active" id="nav-laboratorium" role="tabpanel">
                        <form id="U_route" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="U_nama">Nama Laboratorium<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="U_nama" name="nama" placeholder="Lab. Kimia" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="U_lokasi">Lokasi</label>
                                <select class="form-select" id="U_lokasi" name="lokasi" required>
                                    <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                    <option value="Gedung Laboratorium Terpadu">Gedung Laboratorium Terpadu</option>
                                    <option value="Gedung B">Gedung B</option>
                                    <option value="Gedung C">Gedung C</option>
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


<div class="modal modalDelete fade" id="M_D_laboratorium" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_laboratorium">Konfirmasi Hapus</h5>
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
                    <input type="hidden" name="jenis" value="laboratorium">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>

</div>

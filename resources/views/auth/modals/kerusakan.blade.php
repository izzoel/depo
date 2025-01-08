@if (session('success'))
    @include('auth.toasts.success')
@endif


<div class="modal fade" id="M_S_kerusakan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lapor Kerusakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <form action="{{ route('kerusakan_store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="lapor_alat">Nama Alat<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lapor_alat" name="nama" placeholder="Lampu Spektro T60 D2" required />
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
                        <div class="mb-3">
                            <label class="form-label" for="kondisi">Kondisi</label><span class="text-danger">*</span></label>
                            <textarea class="form-control" id="kondisi" name="kondisi" rows="2" placeholder="masa pakai sudah hampir habis"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status">Status<span class="text-danger">*</span></label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                <option value="Pembelian">Pembelian</option>
                                <option value="Pengajuan">Pengajuan</option>
                                <option value="Peninjauan">Peninjauan</option>
                                <option value="Perbaikan">Perbaikan</option>
                                <option value="Rusak Total">Rusak Total</option>
                                <option value="Selesai">Selesai</option>
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


<div class="modal modalUpdate fade" id="M_U_kerusakan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kerusakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="nav-align-top mb-4">
                    <form id="U_route" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="U_nama">Nama Alat<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="U_nama" name="nama" placeholder="Lampu Spektro T60 D2" required />
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
                            <label class="form-label" for="U_kondisi">Kondisi</label><span class="text-danger">*</span></label>
                            <textarea class="form-control" id="U_kondisi" name="kondisi" rows="2" placeholder="masa pakai sudah hampir habis"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="U_status">Status<span class="text-danger">*</span></label>
                            <select class="form-select" id="U_status" name="status" required>
                                <option value="" class="text-muted" selected disabled>-- Pilih --</option>
                                <option value="Pembelian">Pembelian</option>
                                <option value="Pengajuan">Pengajuan</option>
                                <option value="Peninjauan">Peninjauan</option>
                                <option value="Perbaikan">Perbaikan</option>
                                <option value="Rusak Total">Rusak Total</option>
                                <option value="Selesai">Selesai</option>
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


<div class="modal modalDelete fade" id="M_D_kerusakan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_kerusakan">Konfirmasi Hapus</h5>
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
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>

</div>

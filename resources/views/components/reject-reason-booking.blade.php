<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tolak
</button>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ Request::url() }}/0" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Menolak Pemesanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="status" value="0">
                    <div class="mb-4">
                        <label for="alasan" class="form-label">Alasan Penolakan</label>
                        <input type="text" name="alasan"
                            class="form-control @error('alasan') is-invalid @enderror ">
                        @error('alasan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

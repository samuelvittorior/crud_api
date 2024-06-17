<div class="card">
    <div class="card-body">
        <form>
            <div class="form-group mb-3">
                <label for="nidn">NIDN:</label>
                <input type="text" class="form-control @error('nidn') is-invalid @enderror" id="nidn" placeholder="Masukkan NIDN" wire:model="nidn" readonly>
                @error('nidn')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="nama_dosen">Nama Dosen:</label>
                <input type="text" class="form-control @error('nama_dosen') is-invalid @enderror" id="nama_dosen" placeholder="Masukkan Nama Dosen" wire:model="nama_dosen">
                @error('nama_dosen')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button wire:click.prevent="update()" class="btn btn-success btn-block">Update</button>
                <button wire:click.prevent="cancel()" class="btn btn-secondary btn-block">Cancel</button>
            </div>
        </form>
    </div>
</div>

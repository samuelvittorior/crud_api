<div class="card">
    <div class="card-body">
        <form>
            <div class="form-group mb-3">
                <label for="kode_makul">Kode Makul:</label>
                <input type="text" class="form-control @error('kode_makul') is-invalid @enderror" id="kode_makul" placeholder="Masukkan Kode Makul" wire:model="kode_makul">
                @error('kode_makul') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="nama_makul">Nama Makul:</label>
                <input type="text" class="form-control @error('nama_makul') is-invalid @enderror" id="nama_makul" placeholder="Masukkan Nama Makul" wire:model="nama_makul">
                @error('nama_makul') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="sks">SKS:</label>
                <input type="number" class="form-control @error('sks') is-invalid @enderror" id="sks" placeholder="Masukkan SKS" wire:model="sks">
                @error('sks') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="d-grid gap-2">
                <button wire:click.prevent="store()" class="btn btn-success btn-block">Simpan</button>
                <button wire:click.prevent="cancel()" class="btn btn-secondary btn-block">Cancel</button>
            </div>
        </form>
    </div>
</div>

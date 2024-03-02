<div>
    {{-- The whole world belongs to you. --}}
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h3 class="text-dark fw-semibold">Edit Kategori</h3>
        <a wire:navigate href="{{ route('admin.kategori') }}" class="btn btn-secondary">Batal</a>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <form wire:submit="save">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="category_name">Nama Kategori</label>
                            <input type="text" wire:model="category_name" id="category_name" class="form-control">
                            <div class="text-danger fs-7">
                                @error('category_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="description">Deskripsi</label>
                            <textarea wire:model="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                            <div class="text-danger fs-7">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">
                            <i class="bx bx-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

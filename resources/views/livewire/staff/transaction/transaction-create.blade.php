<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h3 class="text-dark fw-semibold">Tambah Transaksi</h3>
        <a wire:navigate href="{{ route('staff.transaksi') }}" class="btn btn-secondary">Batal</a>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <form wire:submit="save">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date">Tanggal Transaksi</label>
                            <input type="date" wire:model="date" id="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="product_id">Nama Produk</label>
                            <select wire:model.live="product_id" id="product_id" class="form-select">
                                <option value="">Pilih Produk</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->product_name }} (Stock: {{ $item->stock }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="quantity">Qty</label>
                            <input wire:model.live="quantity" type="number" id="quantity" class="form-control"
                                max="{{ $max_stock }}" min="1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="price">Harga</label>
                            <input wire:model="price" type="text" id="price" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="total">Total</label>
                            <input wire:model="total" type="text" id="total" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="notes">Catatan</label>
                            <textarea wire:model="notes" id="notes" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">
                            <i class="bx bx-save"></i> Buat Transaksi
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

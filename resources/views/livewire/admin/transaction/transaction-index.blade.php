<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h3 class="text-dark fw-semibold">Trsansaksi</h3>
        <a wire:navigate href="{{ route('admin.transaksi.buat') }}" class="btn btn-primary">Tambah Transaksi Baru</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Harga Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $item)
                            <tr class="align-middle">
                                <td>
                                    {{ Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}
                                </td>
                                <td>#TRNS{{ $item->id }}</td>
                                <td>{{ $item->product->product_name }}</td>
                                <td>{{ number_format($item->quantity) }}</td>
                                <td>Rp {{ number_format($item->price) }}</td>
                                <td>Rp {{ number_format($item->total) }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button wire:confirm="Kamu yakin ingin menghapus {{ $item->product_name }}?"
                                            wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm">
                                            <i class="bx bx-x"></i> Batalkan
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

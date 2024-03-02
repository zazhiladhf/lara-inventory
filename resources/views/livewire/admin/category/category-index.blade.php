<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="d-flex align-items-center justify-content-between mb-5">
        <h3 class="text-dark fw-semibold">Kategori</h3>
        <a wire:navigate href="{{ route('admin.kategori.buat') }}" class="btn btn-primary">Tambah Kategori</a>
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
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Produk</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $item)
                            <tr class="align-middle">
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>40 Buah</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a wire:navigate href="{{ route('admin.kategori.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm text-white">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <button wire:confirm="Kamu yakin ingin menghapus {{ $item->category_name }}?"
                                            wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm">
                                            <i class="bx bx-trash"></i> Hapus
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

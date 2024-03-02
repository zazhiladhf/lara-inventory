<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ProductIndex extends Component
{

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('status', 'Produk berhasil dihapus.');
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.product.product-index', [
            'products' => Product::all()
        ]);
    }
}

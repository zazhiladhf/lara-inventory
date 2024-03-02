<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

class ProductEdit extends Component
{

    use WithFileUploads;

    #[Validate('required', message: 'Kode produ harus diisi.')]
    public $product_code;

    #[Validate('required', message: 'Nama produk harus diisi.')]
    public $product_name;

    #[Validate('required', message: 'Kategori harus diisi.')]
    public $category_id, $stock, $purchase_price, $selling_price, $description;

    public $photo;

    public $product_id;

    public function mount($id)
    {
        $this->product_id = $id;
        $category = Product::find($id);

        $this->product_name = $category->product_name;
        $this->description = $category->description;
        $this->product_code = $category->product_code;
        $this->stock = $category->stock;
        $this->purchase_price = $category->purchase_price;
        $this->selling_price = $category->selling_price;
        $this->category_id = $category->category_id;
    }

    public function save()
    {
        $this->validate();

        if (!empty($this->photo)) {
            $filename = date('Y_m_d_his') . '-' . Str::slug($this->product_name) . '.jpg';
            $this->photo->storeAs(path: 'public/products', name: $filename);

            Product::find($this->product_id)->update([
                'product_code' => $this->product_code,
                'product_name' => $this->product_name,
                'category_id' => $this->category_id,
                'stock' => $this->stock,
                'purchase_price' => $this->purchase_price,
                'selling_price' => $this->selling_price,
                'description' => $this->description,
                'photo' => $this->photo->storeAs(path: 'product', name: $filename)
            ]);
        } else {
            Product::find($this->product_id)->update([
                'product_code' => $this->product_code,
                'product_name' => $this->product_name,
                'category_id' => $this->category_id,
                'stock' => $this->stock,
                'purchase_price' => $this->purchase_price,
                'selling_price' => $this->selling_price,
                'description' => $this->description
            ]);
        }


        session()->flash('status', 'Produk berhasil diedit.');
        return $this->redirectRoute('admin.produk', navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.product.product-edit', [
            'categories' => Category::all()
        ]);
    }
}

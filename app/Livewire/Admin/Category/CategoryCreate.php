<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryCreate extends Component
{

    #[Validate('required', message: 'Kategori harus diisi.')]
    public $category_name;

    #[Validate('required', message: 'Deskripsi harus diisi.')]
    public $description;

    public function save()
    {

        $this->validate();

        Category::create([
            'category_name' => $this->category_name,
            'description' => $this->description
        ]);

        session()->flash('status', 'Kategori berhasil ditambahkan.');
        return $this->redirectRoute('admin.kategori', navigate: true);
    }

    #[Layout('layouts.admin')]

    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}

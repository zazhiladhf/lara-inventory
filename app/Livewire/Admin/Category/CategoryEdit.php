<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryEdit extends Component
{

    #[Validate('required', message: 'Kategori harus diisi.')]
    public $category_name;

    #[Validate('required', message: 'Deskripsi harus diisi.')]
    public $description;

    public $category_id;

    public function mount($id)
    {
        $this->category_id = $id;
        $category = Category::find($id);

        $this->category_name = $category->category_name;
        $this->description = $category->description;
    }

    public function save()
    {
        Category::find($this->category_id)->update([
            'category_name' => $this->category_name,
            'description' => $this->description
        ]);

        session()->flash('status', 'Kategori berhasil diedit.');
        return $this->redirectRoute('admin.kategori', navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.category.category-edit');
    }
}

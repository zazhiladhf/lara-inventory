<?php

namespace App\Livewire\Admin\Staff;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class StaffIndex extends Component
{

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('status', 'Staff berhasil dihapus.');
        // return redirect()->route('admin.transaction.index');
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.staff.staff-index', [
            'staffs' => User::where('roles', 'staff')->get()
        ]);
    }
}

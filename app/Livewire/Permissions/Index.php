<?php

namespace App\Livewire\Permissions;

use App\Models\Permission;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Layout('layouts.app')]
    public function render(): View
    {
        $permissions = Permission::paginate();

        return view('livewire.permission.index', compact('permissions'))
            ->with('i', $this->getPage() * $permissions->perPage());
    }

    public function delete(Permission $permission)
    {
        $permission->delete();

        return $this->redirectRoute('permissions.index', navigate: true);
    }
}

<?php

namespace App\Livewire\RoleHasPermissions;

use App\Models\RoleHasPermission;
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
        $roleHasPermissions = RoleHasPermission::paginate();

        return view('livewire.role-has-permission.index', compact('roleHasPermissions'))
            ->with('i', $this->getPage() * $roleHasPermissions->perPage());
    }

    public function delete(RoleHasPermission $roleHasPermission)
    {
        $roleHasPermission->delete();

        return $this->redirectRoute('role-has-permissions.index', navigate: true);
    }
}

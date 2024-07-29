<?php

namespace App\Livewire\Roles;

use App\Models\Permission;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Role;
use Livewire\Attributes\On; 

class AssignPermissions extends Component
{

    public Role $role;
    public $permissions = [];
    public $roleAssignPermissions = [];

    public function initialData()
    {
        $this->roleAssignPermissions = $this->role
            ->permissions
            ->pluck('name')
            ->toArray();
    }

    public function mount()
    {
        $this->permissions = Permission::orderBy('name', 'ASC')
            ->get();

        $this->initialData();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.roles.assign-permissions');
    }

    #[On('changeAssignPermission')]
    public function changeAssignPermission($permissionName)
    {
        $this->role->syncPermissions($this->roleAssignPermissions);
    }
}

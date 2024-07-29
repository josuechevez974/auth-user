<?php

namespace App\Livewire\RoleHasPermissions;

use App\Livewire\Forms\RoleHasPermissionForm;
use App\Models\RoleHasPermission;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public RoleHasPermissionForm $form;

    public function mount(RoleHasPermission $roleHasPermission)
    {
        $this->form->setRoleHasPermissionModel($roleHasPermission);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.role-has-permission.show', ['roleHasPermission' => $this->form->roleHasPermissionModel]);
    }
}

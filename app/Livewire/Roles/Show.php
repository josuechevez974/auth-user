<?php

namespace App\Livewire\Roles;

use App\Livewire\Forms\RoleForm;
use App\Models\Role;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public RoleForm $form;

    public function mount(Role $role)
    {
        $this->form->setRoleModel($role);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.role.show', ['role' => $this->form->roleModel]);
    }
}

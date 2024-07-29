<?php

namespace App\Livewire\Roles;

use App\Livewire\Forms\RoleForm;
use App\Models\Role;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    public RoleForm $form;

    public function mount(Role $role)
    {
        $this->form->setRoleModel($role);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('roles.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.role.create');
    }
}

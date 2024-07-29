<?php

namespace App\Livewire\Permissions;

use App\Livewire\Forms\PermissionForm;
use App\Models\Permission;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public PermissionForm $form;

    public function mount(Permission $permission)
    {
        $this->form->setPermissionModel($permission);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.permission.show', ['permission' => $this->form->permissionModel]);
    }
}

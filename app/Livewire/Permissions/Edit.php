<?php

namespace App\Livewire\Permissions;

use App\Livewire\Forms\PermissionForm;
use App\Models\Permission;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    public PermissionForm $form;

    public function mount(Permission $permission)
    {
        $this->form->setPermissionModel($permission);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirectRoute('permissions.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.permission.edit');
    }
}

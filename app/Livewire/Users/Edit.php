<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use App\Models\Role;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    public UserForm $form;
    public $roles = [];
    public $userRoles = [];
    public $userId = '';

    public function mount(User $user)
    {
        $this->form->setUserModel($user);

        $this->userRoles = $this->form->getRolesUser()
            ->toArray();

        $this->roles = Role::all();
    }

    public function save()
    {
        $this->form
            ->update();

        return $this->redirectRoute('users.index', navigate: true);
    }

    /**
     * Asigna roles al usuario en edicion
     * 
     * @param string $value nombre del rol
     * @return void
     */
    public function changeAssigRole($roleName): void
    {
        $this->form->toggleRole($roleName);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.user.edit');
    }
}

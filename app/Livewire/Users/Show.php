<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public UserForm $form;

    public function mount(User $user)
    {
        $this->form->setUserModel($user);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.user.show', ['user' => $this->form->userModel]);
    }
}

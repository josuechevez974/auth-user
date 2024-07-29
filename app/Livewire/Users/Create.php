<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;


class Create extends Component
{
    public UserForm $form;

    public $rules = [
        'form.name' => 'required|string',
        'form.email' => 'required|string|unique:users:email'
    ];

    public function mount(User $user)
    {
        $this->form->setUserModel($user);
    }

    public function save()
    {
        $this->validate(
            [
                'form.name' => 'required|string',
                'form.email' => 'required|string|unique:users,email|email'
            ],
            [
                'form.name.required' => 'The name field is required',
                'form.email.required' => 'The email field is required',
                'form.email.unique' => 'The email field already exists',
            ]
        );

        $this->form->store();

        return $this->redirectRoute('users.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.user.create');
    }
}

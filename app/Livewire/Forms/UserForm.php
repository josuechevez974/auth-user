<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Form;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Notification;


class UserForm extends Form
{
    public ?User $userModel;

    public $name = '';
    public $email = '';
    public $password = '';
    public $roles = [];
    public ?User $userEdit;

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|unique:users:email',
        ];
    }

    public function setUserModel(User $userModel): void
    {
        $this->userModel = $userModel;

        $this->name = $this->userModel->name;
        $this->email = $this->userModel->email;
        $this->password = $this->userModel->password;
        $this->roles = $this->getRolesUser();
    }

    public function store(): void
    {

        $newUser = new User();
        $newUser->name = $this->name;
        $newUser->email = $this->email;
        $newUser->password = Hash::make($this->generatePassword());
        $newUser->save();

        // Generar un token de restablecimiento de contraseña
        $token = Password::broker()->createToken($newUser);

        // Enviar notificación de restablecimiento de contraseña
        $newUser->sendPasswordResetNotification($token);

        $this->reset();
    }

    /**
     * Generar contraseña para nuevos usuario
     * 
     * @return string nueva contraseña
     */
    public function generatePassword()
    {
        return Str::password(8, true, true, false, false);
    }

    public function update(): void
    {
        $this->userModel->update($this->validate());

        $this->reset();
    }

    public function getRolesUser()
    {
        return $this->userModel->getRoleNames();
    }

    function toggleRole(string $roleName): void
    {
        if ($this->userModel->hasRole($roleName)) {
            $this->userModel->removeRole($roleName);
        } else {
            $this->userModel->assignRole($roleName);
        }
    }
}

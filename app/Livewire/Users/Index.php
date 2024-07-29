<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Password;

class Index extends Component
{
    use WithPagination;

    #[Layout('layouts.app')]
    public function render(): View
    {
        $users = User::paginate();

        return view('livewire.user.index', compact('users'))
            ->with('i', $this->getPage() * $users->perPage());
    }

    public function delete(User $user)
    {
        $user->delete();

        return $this->redirectRoute('users.index', navigate: true);
    }

    public function resetPassword(User $user)
    {

        // Generar un token de restablecimiento de contraseña
        $token = Password::broker()
            ->createToken($user);

        // Enviar notificación de restablecimiento de contraseña
        $user->sendPasswordResetNotification($token);

        session()->flash('success',__('The password is reset'));

        return $this->redirectRoute('users.index', navigate: true);
    }
}

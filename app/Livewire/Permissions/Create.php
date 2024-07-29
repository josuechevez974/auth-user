<?php

namespace App\Livewire\Permissions;

use App\Livewire\Forms\PermissionForm;
use App\Models\Permission;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Create extends Component
{
    public PermissionForm $form;
    public $routeList = [];

    public function mount(Permission $permission)
    {
        $this->form->setPermissionModel($permission);
        $this->routeList = collect(Route::getRoutes())
            ->map(function ($route) {
                return $route->getName() ?: $route->uri();
            })
            ->filter(function ($route) {
                return !is_null($route);
            })
            ->sort()
            ->values()
            ->toArray();
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('permissions.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.permission.create');
    }
}

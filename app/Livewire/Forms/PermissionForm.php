<?php

namespace App\Livewire\Forms;

use App\Models\Permission;
use Livewire\Form;

class PermissionForm extends Form
{
    public ?Permission $permissionModel;

    public $name = '';
    public $guard_name = '';

    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:permissions,name',
            'guard_name' => 'required|string',
        ];
    }

    public function setPermissionModel(Permission $permissionModel): void
    {
        $this->permissionModel = $permissionModel;

        $this->name = $this->permissionModel->name;
        $this->guard_name = $this->permissionModel->guard_name;
    }

    public function store(): void
    {
        // Definir las reglas de validación para la creación
        $rules = [
            'name' => 'required|string|unique:permissions,name',
            'guard_name' => 'required|string',
        ];

        // Validar los datos de entrada según las reglas definidas
        $validatedData = $this->validate($rules);

        $searchPermission = Permission::where($validatedData)
            ->get();

        if ($searchPermission->count() == 0) {
            // Crear un nuevo permiso utilizando los datos validados
            Permission::create($validatedData);
        }

        // Reiniciar los valores del componente
        $this->reset();
    }

    public function update(): void
    {

        // Definir las reglas de validación para la creación
        $rules = [
            'name' => 'required|string|unique:permissions,name',
            'guard_name' => 'required|string',
        ];

        // Validar los datos de entrada según las reglas definidas
        $validatedData = $this->validate($rules);

        $searchPermission = Permission::where($validatedData)
            ->get();

        if ($searchPermission->count() == 0) {
            // Crear un nuevo permiso utilizando los datos validados
            $this->permissionModel->update($this->validate());
        }

        $this->reset();
    }
}

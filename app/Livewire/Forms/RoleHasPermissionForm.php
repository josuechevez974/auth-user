<?php

namespace App\Livewire\Forms;

use App\Models\RoleHasPermission;
use Livewire\Form;

class RoleHasPermissionForm extends Form
{
    public ?RoleHasPermission $roleHasPermissionModel;
    
    public $permission_id = '';
    public $role_id = '';

    public function rules(): array
    {
        return [
			'permission_id' => 'required',
			'role_id' => 'required',
        ];
    }

    public function setRoleHasPermissionModel(RoleHasPermission $roleHasPermissionModel): void
    {
        $this->roleHasPermissionModel = $roleHasPermissionModel;
        
        $this->permission_id = $this->roleHasPermissionModel->permission_id;
        $this->role_id = $this->roleHasPermissionModel->role_id;
    }

    public function store(): void
    {
        $this->roleHasPermissionModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->roleHasPermissionModel->update($this->validate());

        $this->reset();
    }
}

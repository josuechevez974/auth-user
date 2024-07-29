<div class="space-y-6">
    
    <div>
        <x-input-label for="permission_id" :value="__('Permission Id')"/>
        <x-text-input wire:model="form.permission_id" id="permission_id" name="permission_id" type="text" class="mt-1 block w-full" autocomplete="permission_id" placeholder="Permission Id"/>
        @error('form.permission_id')
            <x-input-error class="mt-2" :messages="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="role_id" :value="__('Role Id')"/>
        <x-text-input wire:model="form.role_id" id="role_id" name="role_id" type="text" class="mt-1 block w-full" autocomplete="role_id" placeholder="Role Id"/>
        @error('form.role_id')
            <x-input-error class="mt-2" :messages="$message"/>
        @enderror
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
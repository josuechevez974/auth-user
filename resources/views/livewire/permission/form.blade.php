<div class="space-y-6">
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-select-input id="name" wire:model="form.name" :routeList="$routeList"/>
        @error('form.name')
            <x-input-error class="mt-2" :messages="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="guard_name" :value="__('Guard Name')"/>
        <x-text-input wire:model="form.guard_name" id="guard_name" name="guard_name" type="text" class="mt-1 block w-full" autocomplete="guard_name" placeholder="Guard Name"/>
        @error('form.guard_name')
            <x-input-error class="mt-2" :messages="$message"/>
        @enderror
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
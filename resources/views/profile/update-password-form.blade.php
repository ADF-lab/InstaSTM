 <x-jet-form-section submit="updatePassword">
    
    <x-slot name="form">
        <div class="grid grid-cols-3 mt-2 flex items-stretch">
            <div class=" self-center">
                <x-jet-label for="current_password" value="{{ __('current password') }}" />
            </div>
            <div class="col-span-2">
                <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-jet-input-error for="current_password" class="text-center" />
            </div>
        </div>

        <div class="grid grid-cols-3 mt-2 flex items-stretch">
            <div class=" self-center">
                <x-jet-label for="password" value="{{ __('new password') }}" />
            </div>
            <div class="col-span-2">
                <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
                <x-jet-input-error for="password" class="text-center" />
            </div>
        </div>

      
        <div class="grid grid-cols-3 mt-2 flex items-stretch">
            <div class=" self-center">
                <x-jet-label for="password_confirmation" value="{{ __('confirm password') }}" />
            </div>
            <div class="col-span-2">
                <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" class="text-center" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button class="bg-blue-500 " wire:loading.attr="disabled" wire:target="photo">
            {{ __('Ubah') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

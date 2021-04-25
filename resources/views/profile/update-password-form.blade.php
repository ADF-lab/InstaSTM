 <x-jet-form-section submit="updatePassword">
    

    <x-slot name="form">
        <div class="flex space-x-2 mt-2">
            <div class="place-self-center w-40">
                <x-jet-label for="current_password" value="{{ __('current password') }}" />
            </div><div>
            <x-jet-input id="current_password" type="password" class="mt-1 block w-64" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="text-center" />
            </div>
        </div>

        <div class="flex space-x-2 mt-2">
            <div class="place-self-center w-40">
                <x-jet-label for="password" value="{{ __('new password') }}" />
            </div><div>
            <x-jet-input id="password" type="password" class="mt-1 block w-64" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="text-center" />
            </div>
        </div>

      
        <div class="flex space-x-2 mt-2">
            <div class="place-self-center w-40">
                <x-jet-label for="password_confirmation" value="{{ __('confirm password') }}" />
            </div><div>
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-64" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="text-center" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="flex float-right">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button class="w-20">
            {{ __('Save') }}
        </x-jet-button>
        </div>
    </x-slot>
</x-jet-form-section>

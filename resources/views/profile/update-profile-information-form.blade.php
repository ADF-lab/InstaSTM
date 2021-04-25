<x-jet-form-section submit="updateProfileInformation">
    
    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}">
                <!-- Profile Photo File Input -->
                <div class="flex space-x-4 items-center py-2 mb-4 border-b">
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-16 w-16 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-16 h-16"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>
                <div>
                    <div>
                        <x-jet-secondary-button class="h-8 place-self-center hover:border-black hover:text-gray-600" type="button" x-on:click.prevent="$refs.photo.click()">
                            {{ __('Select A New Photo') }}
                        </x-jet-secondary-button>

                        @if ($this->user->profile_photo_path!="profile-photos/default.png")
                            <x-jet-secondary-button type="button" class="mt-2 mr-2 h-8 place-self-center border-red-400 text-red-400 hover:text-red-500 hover:border-red-600" wire:click="deleteProfilePhoto">
                                {{ __('Remove Photo') }}
                            </x-jet-secondary-button>
                        @endif
                    </div>
                    <x-jet-input-error for="photo" class="text-center" />
                </div>

                </div>
                
            </div>
        @endif

        <!-- Username -->
        <div class="flex space-x-2 mt-2 ">
            <div class="place-self-center w-28">
                <x-jet-label for="username" value="{{ __('username') }}" />
            </div>
            <div>
                <x-jet-input id="username" type="text" class="mt-1 block w-80" wire:model.defer="state.username" autocomplete="username" />
                <x-jet-input-error for="username" class="text-center" />
            </div>
        </div>

        <!-- Full Name -->
        <div class="flex space-x-2 mt-2 ">
            <div class="place-self-center w-28">
                <x-jet-label for="fullname" value="{{ __('fullname') }}" />
            </div>
            <div>
                <x-jet-input id="name" type="text" class="mt-1 block w-80" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" class="text-center" />
            </div>
        </div>

        <!-- NISN -->
        <div class="flex space-x-2 mt-2 ">
            <div class="place-self-center w-28">
                <x-jet-label for="nisn" value="{{ __('nisn') }}" />
            </div>
            <div>
                <input id="nisn" type="text" class="form-input p-2 mt-1 block w-80 bg-transparent border-0 border-b border-gray-300 text-gray-400" wire:model.defer="state.nisn" autocomplete="nisn" disabled />
                <x-jet-input-error for="nisn" class="text-center" />
            </div>
        </div>

        <!-- bio -->
        <div class="flex space-x-2 mt-2 ">
            <div class="place-self-center w-28">
                <x-jet-label for="bio" value="{{ __('bio') }}" />
            </div>
            <div>
                <textarea id="bio" type="text" class="mt-1 block w-80 border-0 border-gray-300 border-b bg-transparent p-2 resize-none focus:ring-0 focus:border-gray-300 scroll-hide" wire:model.defer="state.bio" autocomplete="bio"> </textarea>
                <x-jet-input-error for="bio" class="text-center" />
            </div>
        </div>

        <!-- Email -->
        <div class="flex space-x-2 mt-2 ">
            <div class="place-self-center w-28">
                <x-jet-label for="email" value="{{ __('e-mail') }}" />
            </div>
            <div>
                <x-jet-input id="email" type="email" class="mt-1 block w-80" wire:model.defer="state.email" />
                <x-jet-input-error for="email" class="text-center" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="flex float-right items-center">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button class="w-20" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
        </div>
    </x-slot>
</x-jet-form-section>

@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="px-4 py-5 sm:p-6 {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
            <div class="grid grid-cols-3 mt-2 flex items-stretch">
                <div class="col-start-2 col-span-2 pl-2">
                    <div class="flex items-center py-3 -mt-6 text-right sm:rounded-bl-md sm:rounded-br-md">
                        {{ $actions }}
                    </div>
                </div>
            </div>
                
            @endif
        </form>
    </div>
</div>

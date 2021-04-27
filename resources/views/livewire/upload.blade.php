<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75" wire:click="closeModal"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block bg-white relative rounded-xl transform transition-all align-middle mx-8">
            <form wire:submit.prevent="post" enctype="multipart/form-data">
                @csrf
            <div class="md:flex align-center place-self-center p-4 space-y-4 md:p-0 md:space-y-0">
            <!-- tempat foto -->
            <div class="md:p-4">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" class="align-center" style="max-height: 600px">
                @elseif($imageName)
                    <img src="{{ asset('storage/img/post/'.$imageName)}}" class="align-center" style="max-height: 550px">
                @else
                <label class="border flex flex-col items-center justify-center px-4 py-6 bg-white rounded-lg tracking-wide uppercase cursor-pointer h-64 w-64 md:h-96 md:w-96">
                    <svg class="h-20 md:h-24 transform hover:scale-110 transition ease-out duration-300" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 455 455" style="enable-background:new 0 0 455 455;" xml:space="preserve">
                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                        455,242.5 "/>
                    </svg>
                    <input type="file" name="image" wire:model="image" class="hidden">
                </label>
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                @endif
            </div>
            <!-- bagian kanan -->
            <div class="w-full md:w-64 md:p-4 md:pl-0 flex flex-col place-content-between flex-shrink-0">
                <div class="bg-white text-sm" >
                    <!-- username & profile -->
                    <div class="flex mb-3">
                        <img src="{{ Auth::user()->profile_photo_url }}" class="h-10 w-10 border rounded-full object-cover" >
                        <div class="text-xl ml-2 font-semibold lowercase place-self-center">{{ Auth::user()->username }}</div>
                    </div>

                    <!-- caption -->
                    <textarea wire:model="caption" name="caption" placeholder="Dilarang keras menggunakan kata kata kasar dan mengandung SARA!" class="scroll-hide w-full border border-gray-400 px-3 py-2 text-gray-700 border rounded-lg focus:ring-0 resize-none" rows="5"></textarea>
                </div>
            
                <button type="submit" class="w-full rounded-lg py-2 shadow-inner bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition ease-in-out duration-150">
                Post
                </button>
                <button wire:click="closeModal" class="w-8 h-8 rounded-full absolute shadow-inner -top-3 -right-3 bg-gray-800 text-white hover:bg-black focus:outline-none transition ease-in-out duration-150">X</button>
            </div>
    
                </div>
            </form>
        </div>
    </div>
</div>
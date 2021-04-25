<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-center justify-center min-h-screen text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75" wire:click="close"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block w-full bg-white relative rounded-xl mx-8">
            <input class="w-full rounded-lg py-0 placeholder-gray-400 md:block text-xs h-7 focus:outline-none focus:border-transparent" type="text" placeholder="Cari Pengguna Lain.." wire:model="searchuser" style="background: url(/img/search.png) no-repeat right 10px center; background-size: 1rem;" /> 
            @if($searchuser)
            <div class="bg-white border border-gray-200 overflow-auto scroll-hide absolute z-10 w-full mt-1 rounded px-4" style="max-height: 270px;">
                @foreach($search as $su)
                    <a href="{{route('user',['slug'=>$su->username])}}">
                        <div class="py-2 flex border-b border-gray-200">
                            <img src="{{asset('storage/'.$su->profile_photo_path)}}" class="h-6 w-6 rounded-full object-cover" >
                            <div class="xl:text-xl text-lg ml-2 font-semibold lowercase place-self-center">
                                {{ $su->username }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
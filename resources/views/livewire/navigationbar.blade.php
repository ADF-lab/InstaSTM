<div class="sticky top-0 z-50">
	@if($searchmodal)
    	@include('livewire.search')
    @endif

	<div class="w-full bg-white flex justify-between shadow py-2 px-4 md:px-24 lg:px-36 place-self-center">
		<div class="place-self-center z-10">
			<a href="{{route('home')}}" class="font-logo text-2xl hover:text-yellow-500 transition duration-200 select-none">INSTASTM</a>
		</div>

		<div class="absolute inset-x-0 justify-center flex place-self-center">
			<svg class="h-4 cursor-pointer md:hidden fill-current text-yellow-500" viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve">
			<path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667
				S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6
				c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z
				 M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z"/>
			</svg>
			<div class="w-3/12 md:w-2/6 xl:w-3/6 focus-within:text-yellow-500 hidden md:flex">
				<input class="rounded-lg py-0 w-full placeholder-gray-400 text-black text-xs h-7 focus:outline-none focus:border-transparent focus:ring-black" type="text" placeholder="Cari Pengguna Lain.." wire:model="searchuser"/>
				<svg class="inline-block h-4 -ml-6 mt-1.5 fill-current group-focus:text-yellow-500" viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve">
				<path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667
					S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6
					c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z
					 M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z"/>
				</svg>
		</div>
			@if($searchuser)
			<div class="bg-white border border-gray-200 overflow-auto scroll-hide absolute z-10 w-3/6 md:w-2/6 xl:w-3/6 mt-8 rounded px-4 hidden md:block" style="max-height: 270px;">
				@foreach($search as $su)
			        <a href="{{route('user',['slug'=>$su->username])}}">
						<div class="py-2 flex border-b border-gray-200">
							<img src="{{asset('storage/'.$su->profile_photo_path)}}" class="md:h-12 md:w-12 rounded-full object-cover" >
							<div class="xl:text-xl text-lg ml-2 font-semibold lowercase place-self-center">
		                		{{ $su->username }}
		                	</div>
						</div>
					</a>
				@endforeach
			</div>
			@endif
		</div>

		<x-jet-dropdown>
			<x-slot name="trigger">
	            <img class="h-8 w-8 border rounded-full object-cover cursor-pointer place-self-center" src="{{ Auth::user()->profile_photo_url }}"/>
			</x-slot>
			<x-slot name="content">
					<!-- Account Management -->
	            <div class="block px-4 py-2 text-xs text-gray-400">
	                {{ __('Manage Account') }}
	            </div>

	            <x-jet-dropdown-link href="{{ route('profile.show') }}">
	                {{ __('Profile') }}
	            </x-jet-dropdown-link>
				<div class="border-t border-gray-100"></div>

	            <!-- Authentication -->
	            <form method="POST" action="{{ route('logout') }}">
	            @csrf

	                <x-jet-dropdown-link href="{{ route('logout') }}" class="group rounded-md"
	                         onclick="event.preventDefault();
	                        this.closest('form').submit();">
	                    <span class="text-red-600 group-hover:text-red-800">{{ __('Logout') }}</span>
	                </x-jet-dropdown-link>
				</form>
			</x-slot>
		</x-jet-dropdown>
	</div>

	
</div>
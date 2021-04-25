<div>

	@if($isModal)
        @include('livewire.upload')
    @endif

	
	<div class="px-12 lg:px-40 pb-8">	   
        <div class="pt-8">
		    
		    <div class="md:flex md:space-x-12 lg:space-x-20">
		    <!--foto profil -->
		    <div class="flex-shrink-0">
		        <img src="{{asset('storage/'.$fotoprofil)}}" class="h-40 w-40 md:h-56 md:w-56 rounded-full object-cover mx-auto" >
		    </div>

		    <!-- username&bio -->
		    <div class="flex flex-col mt-3">
		        <div class="flex flex-col md:flex-row space-y-1 md:space-y-0 md:space-x-4 text-center align-center">
		            <div class="font-semibold lowercase text-gray-800 text-3xl">{{ $username }}</div>
		            @if($other)
	                    <button class="flex px-4 place-self-center font-semibold rounded bg-blue-500 hover:bg-blue-600 group text-white @if($followed) bg-blue-500 text-white border-none @endif transition duration-200" wire:click="follow">
	                        <svg class="@if($followed) hidden @endif transition duration-200 h-3 place-self-center pr-2 fill-current text-white " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455 455" style="enable-background:new 0 0 455 455; " xml:space="preserve">
	                            <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
	                                455,242.5 "/>
	                        </svg>@if($followed) FOLLOWED @else FOLLOW @endif
	                    </button>
	                @else
	                	<a class="flex px-4 place-self-center font-semibold rounded border border-gray-500 text-gray-500 hover:text-black hover:border-black transition duration-200 uppercase" href="{{ route('profile.show') }}">
	                        edit Profil
	                    </a>
                    @endif
		        </div>
		        <!-- following followed -->
		        <div class="flex w-full items-center py-4 justify-center md:justify-start lowercase text-xl">
		            <div class="px-4 border-r">
		            	<span class="font-bold text-blue-500 text-2xl pr-2">{{$kiriman}}</span> kiriman
		            </div>
		            <div class="px-4 border-r">
		            	<span class="font-bold text-blue-500 text-2xl pr-2">{{$mengikuti}}</span> MENGIKUTI
		            </div>
		            <div class="px-4">
		            	<span class="font-bold text-blue-500 text-2xl pr-2">{{$diikuti}}</span> DIIKUTI
		            </div>
		        </div>
		        <!-- bio ceritanya -->
		        <div class="font-normal text-gray-500 text-base xl:text-lg">
		            <div class="capitalize font-bold">{{ $name }}</div>
		            <div class="overflow-hidden leading-tight break-word md:max-h-24">
		                {{ $bio }} 
		            </div>
		        </div>
		    </div>
		</div>

	    	<div class="w-full pt-8" style="min-height: 256px;">
			@if(!$profile->isEmpty())
		    	<div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pb-14">
				@foreach ($profile as $post)
			    	<div class="relative overflow-hidden cursor-pointer">
			        	<a href="{{route('postpage',['slug'=>$post->id])}}">
						  <img class="w-full h-32 xl:h-72 md:h-48 object-cover transform hover:scale-105 transition ease-out duration-500" src="{{ asset('storage/img/post/'.$post->nama_foto)}}">
						</a>
						@if(!$other)
						<div class="absolute top-0 right-0">
							<x-jet-dropdown>
								<x-slot name="trigger">
									<div class="h-7 grid place-items-end pr-3">
									<svg class="fill-current text-black hover:scale-105 transform transition duration-200 hover:text-yellow-500 h-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
										<g>
											<g>
												<circle cx="256" cy="256" r="27"/>
											</g>
										</g>
										<g>
											<g>
												<circle cx="27" cy="256" r="27"/>
											</g>
										</g>
										<g>
											<g>
												<circle cx="485" cy="256" r="27"/>
											</g>
										</g>
									</svg>
									</div>
								</x-slot>

								<x-slot name="content">
										<button type="button" wire:click="edit({{$post->id}})" class=" hover:bg-gray-100 w-full h-8 text-left pl-3 rounded-t">
				                            {{ __('Edit') }}
				                        </button>
				                        <button type="button" class="bg-red-500 hover:bg-red-600 w-full h-8 text-white text-left pl-3 rounded-b" wire:click="hapus({{$post->id}})">
				                            {{ __('Delete') }}
				                        </button>
								</x-slot>
							</x-jet-dropdown>
						</div>
						@endif
					</div>
				@endforeach
				</div>
			@else
			<div class="flex h-36 justify-center items-center text-xl font-bold">
				Belum ada postingan
			</div>
			@endif 
			</div> 
        </div>
	</div>
    @include('livewire.footer')
</div>
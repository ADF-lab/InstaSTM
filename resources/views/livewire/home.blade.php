<div>
	<div class="px-12 lg:px-40 pb-8">
	
	@if($isModal)
        @include('livewire.upload')
    @endif
	
	@if(!$follow->isEmpty())
		@foreach($follow as $follow)
	    	<div class="overflow-hidden grid md:grid-cols-2 py-12 md:py-20 border-b border-gray-300">
	        	<div class="place-self-center overflow-hidden pb-6 md:pb-0">
		        	<a href="{{route('postpage',['slug'=>$follow->id])}}">
					  <img class="w-72 h-72 xl:h-96 xl:w-96 object-cover transform hover:scale-105 transition ease-out duration-500" src="{{ asset('storage/img/post/'.$follow->nama_foto)}}">
					</a>
				</div>
				<div class="border-t md:border-l md:border-t-0 border-black relative md:px-12 pt-6">
					<div class="h-full pb-10 flex items-center">
						<div>
							<div class="text-2xl xl:text-5xl break-all">
								{{ Str::limit($follow->caption,68,'...') }}
							</div>
							<div class="text-lg">
								@foreach($user as $us)
									@if($follow->id_user == $us->id)
										by <a href="{{route('user',['slug'=>$us->username])}}" class="italic text-yellow-500 hover:text-yellow-600 transition duration-200 ease-in-out">{{$us->username}}</a>
									@endif
								@endforeach
							</div>
						</div>
					</div>
					<div class="absolute inset-x-0 px-12 bottom-0 text-center md:text-right pt-8 md:p-4">
			            <a href="{{route('postpage',['slug'=>$follow->id])}}" class="place-self-center w-24 italic text-yellow-500 hover:text-yellow-600 transition duration-200 ease-in-out">See Full--</a>
					</div>

				</div>
			</div>
		@endforeach
	@else
		<div class="flex h-36 justify-center items-center text-xl font-bold">
			Kosong
		</div>
	@endif

	</div>
	@include('livewire.footer')
</div>
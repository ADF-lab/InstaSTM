<div>

	<div class="grid lg:grid-cols-6 bg-white my-6 mx-8 lg:mx-24">
    	<div class="lg:col-span-4">
    		<div class="flex-initial place-self-center">
                <img src="{{ asset('storage/img/post/'.$nama_foto)}}" id="photo" class="m-auto" style="max-height: 600px">
            </div>
    	</div>

    	<div class="lg:col-span-2 text-sm p-4 ">
    		<div class="h-full flex flex-col scroll-hide">	    		
	            <a href="{{route('user',['slug'=>$username])}}">
	            	<div class="flex mb-1">
	                <img src="{{asset('storage/'.$photoprofile)}}" class="h-10 w-10 border rounded-full object-cover">
	                	<div class="xl:text-xl text-lg ml-2 font-semibold lowercase place-self-center hover:text-gray-500 transition duration-200">
	                		{{ $username }}
	                	</div>
	                </div>
		        </a>

	            <!-- caption -->
	            <div class="overflow-y-auto break-all leading-snug scroll-hide logo font-sans" style="max-height: 190px;">{{$caption}}</div>
	        
	            <!-- tempat like -->
	            <div class="w-full my-1 flex justify-between h-8">
	                <div class="flex place-self-center">
	                    <a wire:click="like" class="cursor-pointer">
	                        <svg class=" fill-current @if($liketrue) text-blue-500 hover:text-blue-600 @else hover:text-blue-800 @endif hover:text-blue-500 transition duration-200" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24px" x="0px" y="0px" viewBox="0 0 412.735 412.735" style="enable-background:new 0 0 412.735 412.735;" xml:space="preserve">
								<path d="M295.706,35.522C295.706,35.522,295.706,35.522,295.706,35.522c-34.43-0.184-67.161,14.937-89.339,41.273
								c-22.039-26.516-54.861-41.68-89.339-41.273C52.395,35.522,0,87.917,0,152.55C0,263.31,193.306,371.456,201.143,375.636
								c3.162,2.113,7.286,2.113,10.449,0c7.837-4.18,201.143-110.759,201.143-223.086C412.735,87.917,360.339,35.522,295.706,35.522z"/>
							</svg>
	                    </a>
	                    <!-- jumlah like -->
	                    <span class="text-xs place-self-center ml-1">{{$jumlahlike}} likes</span>
	                </div>
	                <div class="place-self-center italic">
	                	{{$date}}
	                </div>
	            </div>
	            <!-- comment -->
	            <div class="flex-grow" id="tmp_komen">
	            	<div class="h-full scroll-hide overflow-y-auto">
		                @foreach($comments as $comment)
		        			<div class="flex mb-2 relative">
		        				@foreach($usercomment as $us)
		        					@if($comment->id_user == $us->id)
			        					<a href="{{route('user',['slug'=>$us->username])}}" class="flex flex-shrink-0">
			        						<img src="{{asset('storage/'.$us->profile_photo_path)}}" class="border h-8 w-8 mr-2 rounded-full object-cover">
			        					</a>
				        				<div class="break-all leading-snug mr-6">
		        							<a href="{{route('user',['slug'=>$us->username])}}" class="font-semibold text-base hover:text-gray-500 transition duration-200">{{$us->username}}</a> {{$comment->isi}}
	        							</div>
	        						@endif
	        					@endforeach
		        				

		        				@if($comment->id_user == Auth()->User()->id)
		        				<div class="absolute right-0">
									<x-jet-dropdown>
										<x-slot name="trigger">
											<svg class="fill-current text-black cursor-pointer h-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
												<circle cx="256" cy="256" r="27"/>
												<circle cx="27" cy="256" r="27"/>
												<circle cx="485" cy="256" r="27"/>
									</svg>
										</x-slot>
										<x-slot name="content">
				                                <button type="button" class="bg-red-500 hover:bg-red-600 w-full h-8 text-white text-left pl-3 rounded" wire:click="hapus({{$comment->id}})">
				                                    {{ __('Delete') }}
				                                </button>
										</x-slot>
									</x-jet-dropdown>
								</div>
			                    @endif

		        			</div>
						@endforeach
					</div>
	            </div>
	            <!-- tempat ngomen -->
	              <div class="flex items-center border border-gray-500 mt-1 z-10">
	                <input wire:model="comment" class="appearance-none border-none w-full text-gray-700 px-2 leading-tight focus:outline-none" type="text" placeholder="tambahkan komentar">
	                <button class="font-bold text-blue-500 hover:text-blue-600 text-sm py-1 px-2" type="button" wire:click=tambahcomment>
	                  Kirim
	                </button>
	              </div>
	              <script type="text/javascript">
	              	var tinggi =600;
	              	var tinggi_komen = ($("#photo").height())-tinggi;
	              	var width = window.innerWidth; 
	              	if (width>1024) {
	              		$("#tmp_komen").css("height", tinggi_komen+"px")}
	              	else{
	              		$("#tmp_komen").css("max-height", "200px")
	              	}
	              </script>
            </div>
    	</div>
    </div>

    
</div>
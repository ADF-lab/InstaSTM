<div>
	<div class="px-12 lg:px-40 py-8">
	
	@if($isModal)
        @include('livewire.upload')
    @endif
	<!-- card explore -->
	<span class="text-3xl font-bold select-none">EXPLORE</span>
    <div class="flex flex-col flex-wrap overflow-hidden pt-4 border-t border-black" id="containerex" style="height: {{$tinggi}}px;">
    	@foreach($explores as $explore)
    	<!-- box -->
        	<a class="relative w-1/3 p-1 md:p-1.5" href="{{route('postpage',['slug'=>$explore->id])}}" @if ($loop->last) id="last_record" @endif>
			  <img class="w-full hover:opacity-50 transition duration-200" src="{{ asset('storage/img/post/'.$explore->nama_foto)}}" alt="Sunset in the mountains">
			</a>
		@endforeach
    </div>
    <script>
        const lastRecord = document.getElementById('last_record');
        const options = {
            root: null,
            threshold: 1,
            rootMargin: '0px'
        }
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    @this.loadMore()
                }
            });
        });
        observer.observe(lastRecord);
    </script>
    </div>
	@include('livewire.footer')
</div>

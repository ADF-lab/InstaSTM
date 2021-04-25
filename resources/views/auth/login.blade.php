<x-guest-layout>
    <div class="h-full mx-auto text-center">
        <div class="bg-white py-12 rounded-md px-16">
            <span class="text-4xl font-logo hover:text-blue-500 duration-200 transition select-none cursor-default flex flex-col items-stretch">
                <img src="{{asset('storage/profile-photos/logo-stm.png')}}" class="h-20 pr-2 md:block hidden self-center mb-2">INSTASTM
            </span>
            <x-jet-validation-errors class="mt-2 -mb-4" />
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div id="isian" class="mt-8 relative">
                <input id="username" class="w-64 p-1 pl-3 border-gray-600 focus:border-gray-600 focus:ring-0" type="text" name="username" :value="old('username')" autofocus placeholder="Username" /> 
            </div>

            <div id="isian" class="mt-4">
                <input id="password" class="w-64 p-1 pl-3 border-gray-600 focus:border-gray-600 focus:ring-0" type="password" name="password" autocomplete="current-password" placeholder="Password" />
            </div>

            <button class="mt-4 font-semibold bg-blue-500 font-open text-white w-full py-1 text-sm px-3 hover:bg-blue-600 transition duration-200 ease-in">
                LOGIN
            </button>
            </form>
            <div class="mt-4 text-gray-500">Atau</div>
            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 duration-200 transition">Buat akun disini</a>
        </div>
    </div>
</x-guest-layout>

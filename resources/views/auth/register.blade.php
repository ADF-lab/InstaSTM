<x-guest-layout>
    <div class="h-full mx-auto text-center w-64">
        <span class="text-4xl font-logo hover:text-yellow-500 duration-200 transition select-none cursor-default">INSTASTM</span>
        <div class="text-left">
        <x-jet-validation-errors class="-mb-4" />
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input id="fullname" class="mt-8 w-full p-1 pl-3 border-gray-600 focus:border-gray-600 focus:ring-0" type="text" name="fullname" :value="old('fullname')" required autofocus placeholder="Fullname" /> 

            <input id="nisn" class="mt-4 w-full p-1 pl-3 border-gray-600 focus:border-gray-600 focus:ring-0" type="number" name="nisn" :value="old('nisn')" autofocus placeholder="NISN" /> 

            <input id="email" class="mt-4 w-full p-1 pl-3 border-gray-600 focus:border-gray-600 focus:ring-0" type="text" name="email" :value="old('email')" autofocus placeholder="Email" /> 
        
            <input id="username" class="mt-4 w-full p-1 pl-3 border-gray-600 focus:border-gray-600 focus:ring-0" type="text" name="username" :value="old('username')" autofocus placeholder="Username" /> 
        
            <input id="password" class="mt-4 w-full p-1 pl-3 border-gray-600 focus:border-gray-600 focus:ring-0" type="password" name="password" autocomplete="new-password" placeholder="Password" />

            <input id="password_confirmation" class="mt-4 w-full p-1 pl-3 border-gray-600 focus:border-gray-600 focus:ring-0" type="password" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password" />

            <button class="mt-4 font-semibold bg-black text-white w-full py-1 text-sm px-3 hover:bg-gray-900 transition duration-200 ease-in">
                REGISTER
            </button>
        </form>
        <div class="mt-4 text-gray-500">Atau</div>
        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 duration-200 transition">Sudah punya akun? Login</a>
    </div>
</x-guest-layout>

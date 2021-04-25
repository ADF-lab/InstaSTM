<x-app-layout>
    <div class="md:flex h-screen items-center px-12 lg:px-40 -mt-12 pt-12 space-x-12">
        <div class="flex flex-col space-y-8">
            <span class="text-xl text-gray-400 italic border-b w-48">Edit Your</span>
            <a onclick="profile()" class="cursor-pointer text-gray-600 hover:text-gray-400 transition duration-200">Profile</a>
            <a onclick="conpassword()" class="cursor-pointer text-gray-600 hover:text-gray-400 transition duration-200">Password</a>

            <script type="text/javascript">
                function profile(){
                    var v = document.getElementById("profile");
                    var w = document.getElementById("password");

                     v.style.display = "block";
                     w.style.display="none";
                }
                function conpassword(){
                    var v = document.getElementById("password");
                    var w = document.getElementById("profile");

                     v.style.display = "block";
                     w.style.display="none";
                }
            </script>
        </div>
        <div class="w-full p-8 border-l">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div id="profile" style="display: block;">
                    @livewire('profile.update-profile-information-form')
                </div>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div id="password" style="display: none;">
                    @livewire('profile.update-password-form')
                </div>
            @endif    
        </div>
        <div class="absolute -bottom-3 left-3 m-8">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                            this.closest('form').submit();">
                            <div class="flex group w-64 items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 490.3 490.3" class="h-8 fill-current text-red-600 group-hover:text-red-800" style="enable-background:new 0 0 490.3 490.3;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M0,121.05v248.2c0,34.2,27.9,62.1,62.1,62.1h200.6c34.2,0,62.1-27.9,62.1-62.1v-40.2c0-6.8-5.5-12.3-12.3-12.3
                                        s-12.3,5.5-12.3,12.3v40.2c0,20.7-16.9,37.6-37.6,37.6H62.1c-20.7,0-37.6-16.9-37.6-37.6v-248.2c0-20.7,16.9-37.6,37.6-37.6h200.6
                                        c20.7,0,37.6,16.9,37.6,37.6v40.2c0,6.8,5.5,12.3,12.3,12.3s12.3-5.5,12.3-12.3v-40.2c0-34.2-27.9-62.1-62.1-62.1H62.1
                                        C27.9,58.95,0,86.75,0,121.05z"/>
                                    <path d="M385.4,337.65c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6l83.9-83.9c4.8-4.8,4.8-12.5,0-17.3l-83.9-83.9
                                        c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l63,63H218.6c-6.8,0-12.3,5.5-12.3,12.3c0,6.8,5.5,12.3,12.3,12.3h229.8l-63,63
                                        C380.6,325.15,380.6,332.95,385.4,337.65z"/>
                                </g>
                            </g>
                            </svg>
                            <span class="text-red-600 text-lg font-semibold group-hover:text-red-800">{{ __('Logout') }}</span>
                            </div>
                    </x-jet-dropdown-link>
                </form>
        </div>
    </div>
</x-app-layout>

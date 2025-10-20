<div>
   <header class="max-w-7xl w-full mx-auto px-6 lg:px-8 py-4 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-10">
            <h1 class="text-[#B76A6A] font-bold text-xl lg:text-2xl">Wanderly</h1>
        </div>

        @if (Route::has('login'))
            <nav class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="px-4 py-2 border border-[#19140035] dark:border-[#3E3E3A] text-[#1b1b18] dark:text-[#EDEDEC] rounded-sm hover:border-[#1915014a] transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('welcome') }}"
                       class="px-4 py-2 text-[#B76A6A] rounded-sm hover:underline transition">
                        About Us
                    </a>
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 border border-[#B76A6A] text-[#B76A6A] rounded-sm hover:bg-[#B76A6A] hover:text-white transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="px-4 py-2 bg-[#B76A6A] text-white rounded-sm hover:bg-[#a85c5c] transition">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
</header>
</div>
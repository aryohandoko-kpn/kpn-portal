{{-- resources/views/components/floating-login-button.blade.php --}}
<div class="fixed bottom-6 right-6 z-50">
    @auth
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 rounded-full bg-blue-600 px-5 py-3
                          text-sm font-semibold text-white shadow-lg shadow-blue-600/30
                          transition hover:bg-blue-700 hover:shadow-xl focus:outline-none
                          focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            Dashboard
        </a>
    @else
        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 rounded-full bg-blue-600 px-5 py-3
                          text-sm font-semibold text-white shadow-lg shadow-blue-600/30
                          transition hover:bg-blue-700 hover:shadow-xl focus:outline-none
                          focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0
                                 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
            Login
        </a>
    @endauth
</div>
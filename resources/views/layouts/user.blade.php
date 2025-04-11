<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex min-h-screen flex-col">
        <header class="sticky top-0 z-40 w-full border-b bg-background">
            <div class="container flex h-16 items-center px-4 md:px-6">
                <button
                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 hover:bg-accent hover:text-accent-foreground h-10 w-10 mr-2 md:hidden"
                    type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-«rv»"
                    data-state="closed">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-menu h-5 w-5">
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                    </svg>
                    <span class="sr-only">Toggle menu</span>
                </button>
                <a href="/" class="flex items-center gap-2 md:mr-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-gamepad2 h-6 w-6">
                        <line x1="6" x2="10" y1="11" y2="11"></line>
                        <line x1="8" x2="8" y1="9" y2="13"></line>
                        <line x1="15" x2="15.01" y1="12" y2="12"></line>
                        <line x1="18" x2="18.01" y1="10" y2="10"></line>
                        <path
                            d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z">
                        </path>
                    </svg>
                    <span class="hidden font-bold md:inline-block">GameHub</span>
                </a>
                <nav class="hidden gap-6 md:flex"><a href="/"
                        class="flex items-center text-sm font-medium">Home</a>
                    <a href="/games" class="flex items-center text-sm font-medium">Games</a>
                </nav>
                <div class="ml-auto flex items-center gap-2">
                    @auth
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="inline-flex items-center justify-center gap-2 text-sm font-medium bg-background border border-input h-9 rounded-md px-3 hover:bg-accent hover:text-accent-foreground">
                                {{ Auth::user()->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" @click.outside="open = false" x-transition
                                class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-md z-50">
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3"
                            href="{{ route('login') }}">Login</a>
                        <a class="items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-9 rounded-md px-3 hidden md:flex"
                            href="{{ route('register') }}">Sign Up</a>
                    @endauth
                </div>
            </div>
        </header>
        <main class="flex-1">
            {{ $slot }}
        </main>
        <footer class="border-t bg-background">
            <div class="container px-4 py-8 md:px-6">
                <div class="text-center">
                    <div class="space-y-4">
                        <a href="/" class="flex justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-gamepad2 h-6 w-6">
                                <line x1="6" x2="10" y1="11" y2="11"></line>
                                <line x1="8" x2="8" y1="9" y2="13"></line>
                                <line x1="15" x2="15.01" y1="12" y2="12"></line>
                                <line x1="18" x2="18.01" y1="10" y2="10"></line>
                                <path
                                    d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z">
                                </path>
                            </svg><span class="font-bold">GameHub</span></a>
                        <p class="text-sm text-muted-foreground">Play hundreds of high-quality games directly in your
                            browser. No downloads required.</p>
                    </div>
                </div>
                <div class="pt-4 text-center text-sm text-muted-foreground">
                    <p>© 2025 GameHub. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>

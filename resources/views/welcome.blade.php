<x-user-layout>
    {{-- <div class="mt-24">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold mb-3">Game Category</h2>
            <a href="/games">See All</a>
        </div>
        <div class="flex overflow-auto gap-2 pb-4">
            @foreach ($games as $game)
                <div class="border rounded-lg aspect-video h-48 relative group overflow-clip">
                    <a href="{{ route('user.game.show', $game) }}"
                        class="inset-0 bg-black/50 absolute rounded-lg text-white border-2 opacity-0 border-yellow-400 p-2 group-hover:opacity-100 flex transition-all flex-col-reverse">
                        {{ $game->title }}
                    </a>
                    <img src="{{ Storage::url($game->cover) }}"
                        class="w-full h-full object-cover" alt="{{ $game->title }}">
                </div>
            @endforeach
        </div>
    </div> --}}
    <section class="relative">
        <div class="relative h-[500px] w-full overflow-hidden">
            <img alt="Featured Game" decoding="async" data-nimg="fill"
                class="object-cover opacity-50"
                style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"
                src="{{ Storage::url($games[0]->version->cover) }}">
            <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent">
            </div>
            <div class="absolute inset-0 flex items-center">
                <div class="container px-4 md:px-6">
                    <div class="max-w-2xl space-y-4">
                        <h1 class="text-4xl font-black tracking-tighter sm:text-5xl md:text-6xl">Discover
                            Amazing Games</h1>
                        <p class="text-xl text-muted-foreground">Play hundreds of high-quality games directly
                            in your browser. No downloads required.</p>
                        <div class="flex flex-col gap-2 sm:flex-row"><a href="#featured"
                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8">Explore
                                Games</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="border-b py-6">
        <div class="container px-4 md:px-6">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <form action="/">
                    <div class="relative w-full max-w-md"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-search absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                        <input name="search"
                            class="flex h-10 rounded-md border border-input px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full bg-background pl-8 shadow-none"
                            placeholder="Search games..." type="search">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="py-12" id="featured">
        <div class="container px-4 md:px-6">
            <div dir="ltr" data-orientation="horizontal" class="space-y-8">
                <div class="flex items-center justify-between">
                    <h2 class="font-bold text-2xl">Games</h2>
                    <a href="/games" class="text-sm font-medium underline-offset-4 hover:underline">View All Games</a>
                </div>
                <div data-state="active" data-orientation="horizontal" role="tabpanel"
                    aria-labelledby="radix-«r14»-trigger-featured" id="radix-«r14»-content-featured" tabindex="0"
                    class="mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 space-y-4"
                    style="animation-duration: 0s;">
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 relative">
                        @include('user._game_list')
                    </div>
                </div>
                <div data-state="inactive" data-orientation="horizontal" role="tabpanel"
                    aria-labelledby="radix-«r14»-trigger-popular" hidden="" id="radix-«r14»-content-popular"
                    tabindex="0"
                    class="mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 space-y-4">
                </div>
                <div data-state="inactive" data-orientation="horizontal" role="tabpanel"
                    aria-labelledby="radix-«r14»-trigger-new" hidden="" id="radix-«r14»-content-new" tabindex="0"
                    class="mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 space-y-4">
                </div>
            </div>
        </div>
    </section>
    @auth
    @else
        <section class="bg-muted py-12">
            <div class="container px-4 md:px-6">
                <div class="flex flex-col items-center justify-center space-y-4 text-center">
                    <div class="space-y-2">
                        <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">Ready to Start
                            Playing?</h2>
                        <p class="mx-auto max-w-[700px] text-muted-foreground md:text-xl">Create an account to
                            track your progress, save your favorite games, and compete on leaderboards.</p>
                    </div>
                    <div class="flex flex-col gap-2 min-[400px]:flex-row"><a href="/register"
                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8">Sign
                            Up Free</a><a href="/login"
                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-11 rounded-md px-8">Login</a>
                    </div>
                </div>
            </div>
        </section>
    @endauth
</x-user-layout>

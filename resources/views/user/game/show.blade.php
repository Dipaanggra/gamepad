<x-user-layout>
    <section class="relative">
        <div class="relative h-[400px] w-full overflow-hidden">
            <img alt="{{ $game->title }}" decoding="async" data-nimg="fill" class="object-cover"
                style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"
                src="{{ Storage::url($game->cover) }}">
            <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent"></div>
        </div>
        <div class="container relative -mt-32 px-4 md:px-6">
            <div class="space-y-4">
                <h1 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">{{ $game->title }}</h1>
                <div class="flex items-center gap-4">
                    <div class="flex items-center text-sm text-muted-foreground">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users mr-1 h-4 w-4">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>{{ $game->user->name }}
                    </div>
                </div>
                <p class="text-muted-foreground">{{ $game->description }}</p>
            </div>
        </div>
    </section>
    <section class="py-12">
        <div class="container px-4 md:px-6">
            <div class="space-y-8">
                <div class="mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 space-y-4"
                    style="animation-duration: 0s;">
                    <div class="grid lg:grid-cols-4 gap-4">
                        <div class="aspect-video lg:col-span-3 overflow-hidden rounded-lg border bg-muted">
                            <iframe src="{{ Storage::url($game->version->path) }}" class="w-full h-full"
                                frameborder="0"></iframe>
                        </div>
                        <div class="rounded-lg border p-4">
                            <h3 class="text-xl font-bold tracking-tighter sm:text-xl md:text-2xl">
                                Scores
                            </h3>
                            <ol class="mt-2">
                                @foreach ($game->version->scores as $i=>$score)
                                    <li class="{{ $game->user == Auth::user() ? "font-bold" : '' }}">{{ $i+1 }}. {{ $score->user->name }} ({{ $score->score }})</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    <div class="text-sm text-muted-foreground">
                        <p><strong>Note:</strong> This game runs directly in your browser. No downloads or
                            installations
                            required.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="border-t bg-muted py-12">
        <div class="container px-4 md:px-6">
            <h2 class="mb-6 text-2xl font-bold tracking-tight">Similar Games You Might Like</h2>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @include('user._game_list')
            </div>
        </div>
    </section>
</x-user-layout>

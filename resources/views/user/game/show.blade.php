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
            <div x-data="{ activeTab: 'play' }" class="space-y-8">
                <!-- Tab List -->
                <div role="tablist" aria-orientation="horizontal"
                    class="h-10 items-center justify-center rounded-md bg-muted p-1 text-muted-foreground grid w-full grid-cols-2"
                    tabindex="0" style="outline: none;">

                    <!-- Tab 1 -->
                    <button type="button" role="tab" :aria-selected="activeTab === 'play'"
                        :data-state="activeTab === 'play' ? 'active' : 'inactive'" @click="activeTab = 'play'"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                        :class="activeTab === 'play' ? 'bg-background text-foreground shadow-sm' : ''">
                        Play Game
                    </button>
                </div>

                <!-- Tab Content -->
                <div>
                    <div x-show="activeTab === 'play'">
                        <div :data-state="activeTab === 'play' ? 'active' : 'inactive'"
                            data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-«re»-trigger-play"
                            id="radix-«re»-content-play" tabindex="0"
                            class="mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 space-y-4"
                            style="animation-duration: 0s;">
                            <div class="aspect-video overflow-hidden rounded-lg border bg-muted">
                                <iframe src="{{ $game->game }}" class="w-full h-full" frameborder="0"></iframe>
                            </div>
                            <div class="text-sm text-muted-foreground">
                                <p><strong>Note:</strong> This game runs directly in your browser. No downloads or
                                    installations
                                    required.</p>
                            </div>
                        </div>
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

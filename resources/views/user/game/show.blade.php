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
                <div class="flex flex-wrap items-center gap-2">
                    @foreach ($game->categories as $cat)
                        <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground hover:bg-primary/80"
                            data-v0-t="badge">{{ $cat->name }}</div>
                    @endforeach
                </div>
                <h1 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">{{ $game->title }}</h1>
                <div class="flex items-center gap-4">
                    <div class="flex items-center">
                        <div class="flex">
                            @php
                                $fullStars = floor($game->average_rating);
                                $hasHalfStar = $game->average_rating - $fullStars >= 0.25; // Bisa diubah ke 0.5 kalau mau lebih presisi
                                $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                            @endphp

                            {{-- Bintang penuh --}}
                            @for ($i = 0; $i < $fullStars; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="lucide lucide-star h-5 w-5 fill-primary text-primary" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                            @endfor

                            {{-- Bintang setengah --}}
                            @if ($hasHalfStar)
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="lucide lucide-star-half h-5 w-5 text-primary" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <defs>
                                        <linearGradient id="halfGrad">
                                            <stop offset="50%" stop-color="currentColor" />
                                            <stop offset="50%" stop-color="white" stop-opacity="1" />
                                        </linearGradient>
                                    </defs>
                                    <polygon fill="url(#halfGrad)"
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                            @endif

                            {{-- Bintang kosong --}}
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" class="lucide lucide-star h-5 w-5"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                            @endfor

                        </div><span class="ml-2 text-sm font-medium">{{ $game->average_rating }} / 5</span>
                    </div>
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

                    <!-- Tab 2 -->
                    <button type="button" role="tab" :aria-selected="activeTab === 'reviews'"
                        :data-state="activeTab === 'reviews' ? 'active' : 'inactive'" @click="activeTab = 'reviews'"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                        :class="activeTab === 'reviews' ? 'bg-background text-foreground shadow-sm' : ''">
                        Reviews
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
                    <div x-show="activeTab === 'reviews'">
                        <div data-state="active" data-orientation="horizontal" role="tabpanel"
                            aria-labelledby="radix-«r5»-trigger-reviews" id="radix-«r5»-content-reviews"
                            tabindex="0"
                            class="mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 space-y-6">
                            <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                                <div class="flex flex-col space-y-1.5 p-6">
                                    <h3 class="text-2xl font-semibold leading-none tracking-tight">Player Reviews</h3>
                                    <p class="text-sm text-muted-foreground">See what other players think about this
                                        game</p>
                                </div>
                                <div class="p-6 pt-0 space-y-6">
                                    @auth
                                        <form class="space-y-4" action="{{ route('rating.store', $game) }}"
                                            method="POST">
                                            @csrf
                                            <div class="space-y-2">
                                                <h3 class="text-lg font-medium">Rate this game</h3>
                                                <div class="flex gap-1 w-fit flex-row-reverse">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        <input type="radio" id="star-{{ $i }}"
                                                            name="rating" value="{{ $i }}"
                                                            class="hidden peer"
                                                            {{ old('rating') == $i ? 'checked' : '' }}>
                                                        <label for="star-{{ $i }}"
                                                            class="cursor-pointer fill-transparent group peer-checked:[&>*]:fill-primary hover:[&>*]:fill-primary text-2xl transition">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-star h-4 w-4 text-primary">
                                                                <polygon
                                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                </polygon>
                                                            </svg>
                                                        </label>
                                                    @endfor
                                                </div>

                                            </div>
                                            <div class="space-y-2">
                                                <label for="comment" class="text-sm font-medium">
                                                    Your review
                                                </label>
                                                <textarea
                                                    class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                                                    id="comment" placeholder="Share your experience with this game..." rows="4" name="comment"></textarea>
                                            </div>
                                            <button
                                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2"
                                                type="submit">Submit Review</button>
                                        </form>
                                    @else
                                        <p class="text-sm text-muted-foreground">
                                            <a href="{{ route('login') }}" class="text-primary hover:underline">Log
                                                in</a>
                                            to leave a review.
                                        </p>
                                    @endauth
                                    <div data-orientation="horizontal" role="none"
                                        class="shrink-0 bg-border h-[1px] w-full"></div>
                                    <div class="space-y-6">
                                        @foreach ($game->ratings as $rating)
                                            <div>
                                                <div class="flex items-start gap-4">
                                                    <div class="flex-1 space-y-2">
                                                        <div class="flex flex-wrap items-center gap-2">
                                                            <h4 class="font-medium">{{ $rating->user->name }}</h4>
                                                            <div class="flex items-center">
                                                                @for ($i = 0; $i < $rating->rating; $i++)
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="lucide lucide-star h-4 w-4 fill-primary text-primary">
                                                                        <polygon
                                                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                                        </polygon>
                                                                    </svg>
                                                                @endfor
                                                            </div>
                                                            <span
                                                                class="text-xs text-muted-foreground">{{ $rating->created_at->diffForHumans() }}</span>
                                                        </div>
                                                        <p class="text-sm">{{ $rating->comment }}</p>
                                                    </div>
                                                </div>
                                                <div data-orientation="horizontal" role="none"
                                                    class="shrink-0 bg-border h-[1px] w-full my-4"></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
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

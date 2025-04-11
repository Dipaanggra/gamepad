@foreach ($games as $game)
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden" data-v0-t="card">
        <div class="aspect-video relative"><img alt="Game thumbnail" loading="lazy" decoding="async" data-nimg="fill"
                class="object-cover"
                style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"
                src="{{ Storage::url($game->cover) }}">
        </div>
        <div class="p-4">
            <h3 class="font-bold  line-clamp-1">{{ $game->title }}</h3>
            <p class="text-sm text-muted-foreground line-clamp-2">{{ $game->description }}</p>
            <div class="mt-2 flex items-center justify-between">
                <div class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-primary text-primary">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                </div><a href="{{ route('user.game.show', $game) }}"
                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3">View</a>
            </div>
        </div>
    </div>
@endforeach

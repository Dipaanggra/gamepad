@foreach ($games as $game)
    <div class="rounded-lg border bg-card text-card-foreground shadow-sm overflow-hidden" data-v0-t="card">
        <div class="aspect-video relative"><img alt="Game thumbnail" loading="lazy" decoding="async" data-nimg="fill"
                class="object-cover"
                style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"
                src="{{ Storage::url($game->version->cover) }}">
        </div>
        <div class="p-4">
            <h3 class="font-bold  line-clamp-1">{{ $game->title }}</h3>
            <p class="text-sm text-muted-foreground line-clamp-2">{{ $game->description }}</p>
            <div class="mt-2 flex items-center justify-between">
                <p></p>
                <a href="{{ route('user.game.show', $game) }}"
                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium
                    ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2
                    focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none
                    disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 hover:bg-accent
                    hover:text-accent-foreground h-9 rounded-md px-3">View</a>
            </div>
        </div>
    </div>
@endforeach 

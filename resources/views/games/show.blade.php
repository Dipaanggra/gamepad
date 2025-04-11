<x-app-layout header="Games">
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="w-3/4">
                <iframe src="{{ $game->game }}" class="w-full aspect-video rounded-lg" frameborder="0"
                    allow="gamepad *;"></iframe>
                <div class="mt-4 space-y-2">
                    <div class="flex justify-between">
                        <div class="">
                            <h3 class="text-5xl font-bold">{{ $game->title }}</h3>
                            <p>{{ $game->description }}</p>
                        </div>
                        <div class="flex gap-4">
                            <a href="{{ route('game.edit', $game->id) }}" class="text-yellow-500">Edit</a>
                            <form action="{{ route('game.destroy', $game->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

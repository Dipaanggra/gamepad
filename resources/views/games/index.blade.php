<x-app-layout header="Games">
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('game.create') }}" class="bg-black text-white px-3 py-1.5 rounded-lg">Add Game</a>
            <table class="border border-b-0 mt-8 w-full">
                <tr class="border-b">
                    <th class="px-4 py-2 text-start">Title</th>
                    <th class="px-4 py-2 text-start">Desc</th>
                    <th class="px-4 py-2 text-start">Action</th>
                </tr>
                @foreach ($games as $game)
                    <tr class="border-b">
                        <td class="px-4 py-2">
                            <a href="{{ route('game.show', $game) }}">
                                {{ $game->title }}
                            </a>
                        </td>
                        <td class="px-4 py-2 truncate max-w-[300px]">{{ $game->description }}</td>
                        <td class="px-4 py-2">{{ $game->game }}</td>
                        <td class="px-4 py-2">
                            <div class="flex gap-4">
                                <a href="{{ route('game.edit', $game->id) }}" class="text-sm hover:bg-yellow-400 py-1 bg-yellow-300 px-2 rounded">Edit</a>
                                <form action="{{ route('game.destroy', $game->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-sm hover:bg-red-600 text-white bg-red-500 px-2 rounded py-1">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="mt-3">
                {{ $games->links('pagination::simple-tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>

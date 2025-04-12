<x-app-layout header="Games">
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="mt-4 space-y-2">
                <div class="flex justify-between">
                    <div class="">
                        <h3 class="text-5xl font-bold">{{ $game->title }}</h3>
                        <p>{{ $game->description }}</p>
                    </div>
                    <div class="flex gap-4">
                        <p><a href="{{ route('game.edit', $game->id) }}" class="text-sm hover:bg-yellow-500 bg-yellow-400 px-2 rounded py-1">Edit</a></p>
                        <form action="{{ route('game.destroy', $game->id) }}" method="POST">
                            @csrf @method('DELETE')
                                <button class="text-sm hover:bg-red-600 text-white bg-red-500 px-2 rounded py-1">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="py-12">
                <div class="mx-auto">
                    <a href="{{ route('version.create', $game) }}" class="bg-black text-white px-3 py-1.5 rounded-lg">Add Version</a>
                    <table class="border border-b-0 mt-8 w-full">
                        <tr class="border-b">
                            <th class="px-4 py-2 text-start">Version</th>
                            <th class="px-4 py-2 text-start">Path</th>
                            <th class="px-4 py-2 text-start">Action</th>
                        </tr>
                        @foreach ($versions as $version)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $version->version }}</td>
                                <td class="px-4 py-2">{{ $version->path }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-4">
                                        <a href="{{ route('version.edit', [$game, $version]) }}" class="text-sm hover:bg-yellow-400 py-1 bg-yellow-300 px-2 rounded">Edit</a>
                                        <form action="{{ route('version.destroy', [$game, $version]) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="text-sm hover:bg-red-600 text-white bg-red-500 px-2 rounded py-1">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="mt-3">
                        {{ $versions->links('pagination::simple-tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

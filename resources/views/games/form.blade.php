<x-app-layout header="Games">
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <form enctype="multipart/form-data"
                action="{{ isset($game) ? route('game.update', $game->id) : route('game.store') }}" method="POST"
                class="grid bg-white p-4 rounded-xl">
                @csrf
                @isset($game)
                    @method('PUT')
                @endisset

                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $game->title ?? '')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                        :value="old('description', $game->description ?? '')" required />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="game" :value="__('Game')" />
                    <x-text-input id="game" class="block mt-1 w-full" type="text" name="game"
                        :value="old('game', $game->game ?? '')" required />
                    <x-input-error :messages="$errors->get('game')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="cover" :value="__('Cover')" />
                    <x-file-input id="cover" class="block mt-1 w-full" name="cover" :value="old('cover', $game->cover ?? '')" />
                    <x-input-error :messages="$errors->get('cover')" class="mt-2" />
                </div>
                <div class="flex">
                    <x-primary-button class="mt-3">
                        {{ isset($game) ? 'Update' : 'Submit' }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout header="versions">
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <form enctype="multipart/form-data"
                action="{{ isset($version) ? route('version.update', [$game, $version]) : route('version.store', $game) }}" method="POST"
                class="grid bg-white p-4 rounded-xl">
                @csrf
                @isset($version)
                    @method('PUT')
                @endisset

                <div>
                    <x-input-label for="version" :value="__('Version')" />
                    <x-text-input id="version" class="block mt-1 w-full" type="text" name="version" :value="old('version', $version->version ?? '')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('version')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="cover" :value="__('cover')" />
                    <x-file-input id="cover" class="block mt-1 w-full" type="text" name="cover"
                        :value="old('cover', $version->cover ?? '')" required />
                    <x-input-error :messages="$errors->get('cover')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="path" :value="__('path')" />
                    <x-file-input id="path" class="block mt-1 w-full" type="text" name="path"
                        :value="old('path', $version->path ?? '')" required />
                    <x-input-error :messages="$errors->get('path')" class="mt-2" />
                </div>

                <div class="flex">
                    <x-primary-button class="mt-3">
                        {{ isset($version) ? 'Update' : 'Submit' }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

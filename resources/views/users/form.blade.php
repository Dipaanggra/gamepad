<x-app-layout header="Users">
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            @error('any')
            {{ $messages }}
            @enderror
            <form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="POST" class="grid bg-white p-4 rounded-xl">
                @csrf
                @isset($user)
                    @method('PUT')
                @endisset
                <div>
                    <x-input-label for="name" :value="__('name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name', $user->name ?? '')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email', $user->email ?? '')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password" :value="__('password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autofocus />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="roles" :value="__('role')" />
                    @foreach ($roles as $role)
                        <input type="checkbox"  {{ isset($user) ? in_array($role->name, $user->getRoleNames()->toArray()) ? 'checked' : '' : '' }}
                        name="roles[]" id="{{ $role->name }}" value="{{ $role->name }}">
                        <label for="{{ $role->name }}">{{$role->name}}</label>
                    @endforeach
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
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

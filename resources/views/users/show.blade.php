<x-app-layout header="Games">
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <iframe src="{{ $game->game }}" class="w-full aspect-video" frameborder="0" allow="gamepad *;" ></iframe>
            <h3>{{$game->title}}</h3>
            <p>{{$game->description}}</p>
        </div>
    </div>
</x-app-layout>
